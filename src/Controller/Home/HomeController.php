<?php

namespace App\Controller\Home;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * Action returning the site Index
     *
     * @Route("/", name="home")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render(
            "home/home.html.twig"
        );
    }
}
