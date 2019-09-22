<?php

namespace App\Controller\Home;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class SecurityController extends AbstractController
{
    /**
     * Login Action
     *
     * @Route("/register", name="register")
     * @param EntityManagerInterface $em
     * @param Request $request
     * @param TranslatorInterface $translator
     * @return Response
     */
    public function register(
        EntityManagerInterface $em,
        Request $request,
        TranslatorInterface $translator
    ) {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $exist = $em->getRepository(User::class)->findOneBy(['username' => $user->getUsername()]);
            if (!$exist) {
                $user->setRoles(['ROLE_USER']);
                $em->persist($user);
                $em->flush();
                $this->addFlash('success', $translator->trans('registration_success'));
                return $this->redirectToRoute('login', []);
            } else {
                $form['username']->addError(new FormError($translator->trans('login_exist')));
            }

        }

        return $this->render(
            'home/register.html.twig',
            [
                'active_page' => 'register',
                'form' => $form->createView()
            ]
        );
    }

    /**
     * Login Action
     *
     * @Route("/login", name="login")
     * @param AuthenticationUtils $authUtils get last error/username
     * @param AuthorizationCheckerInterface $authChecker
     * @return Response
     */
    public function login(AuthenticationUtils $authUtils, AuthorizationCheckerInterface $authChecker): Response
    {
        if (true === $authChecker->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('admin_index');
        }
        if (true === $authChecker->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('member_index');
        }
        $lastUsername = $authUtils->getLastUsername();
        $error = $authUtils->getLastAuthenticationError();

        return $this->render(
            "home/login.html.twig", [
                'active_page' => 'register',
                'last_username' => $lastUsername,
                'error' => $error
            ]
        );
    }
}
