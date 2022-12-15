<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {

        if ($this->isGranted("ROLE_ADMIN")) {
            return $this->redirectToRoute('app_admin');
        }

        if ($this->isGranted("ROLE_USER")) {
            return $this->redirectToRoute('app_user');
        }

        return $this->render('home/home.html.twig', [
            'controller_name' => 'HomeController',
        ]);

    }
}
