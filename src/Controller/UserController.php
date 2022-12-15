<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    public function __construct(
        private RequestStack $requestStack,
    )
    {}

    #[Route('/profile', name: 'app_user')]
    public function profile(): Response
    {

        $userNow = $this->getUser();

        return $this->render('user/profile.html.twig', [
            'user' => $userNow,
        ]);
    }

    #[Route('/admin', name: 'app_admin')]
    public function index(UserRepository $user): Response
    {

        $all = $user->findAll();

        return $this->render('admin/admin.html.twig', [
            'all' => $all,
        ]);
    }
}
