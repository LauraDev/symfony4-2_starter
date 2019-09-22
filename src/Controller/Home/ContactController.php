<?php

namespace App\Controller\Home;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Services\ContactService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class ContactController extends AbstractController
{
    /**
     * Action displaying the contact form
     *
     * @Route("/contact", name="contact")
     * @param ContactService $contactService
     * @param Request $request
     * @param TranslatorInterface $translator
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function detail(
        ContactService $contactService,
        Request $request,
        TranslatorInterface $translator
    ) {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($contactService->sendMessage($contact)) {
                $this->addFlash('success', $translator->trans('contact_message_sent'));
                return $this->redirectToRoute('home', []);
            } else {
                $this->addFlash('error', $translator->trans('contact_message_not_sent'));
            }
        }

        return $this->render(
            'home/contact.html.twig',
            [
                'active_page' => 'contact',
                'form' => $form->createView()
            ]
        );
    }
}
