<?php

namespace App\Services;

use App\Entity\Contact;
use Twig\Environment;

class ContactService {

  public function __construct(\Swift_Mailer $mailer, Environment $renderer) {
    $this->mailer = $mailer;
    $this->renderer = $renderer;
  }

    /**
     * @param Contact $contact
     *
     * @return int
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
  public function sendMessage(Contact $contact): int
  {
    $message = (new \Swift_Message('My message Title'))
      ->setFrom('noreply@server.com')
      ->setTo('loles34_4@hotmail.com')
      ->setReplyTo($contact->getMail())
      ->setBody($this->renderer->render(
        'mails/contact.html.twig', [
          'contact' => $contact
        ]
      ), 'text/html');

    return $this->mailer->send($message);
  }
}