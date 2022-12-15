<?php

namespace App\Controller;

use App\Form\LoginFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityLoginController extends AbstractController
{

    #[Route('/login', name: 'security_login')]
    public function index(): Response
    {

       
        
        $form = $this->createForm(LoginFormType::class);

        // $user = $this->security->getUser();
        // dd($user);

        return $this->render('security/login.html.twig', [
            'formView' => $form->createView(),
        ]);

    }


    #[Route('/logout', name: 'security_logout')]
    public function logout() {

    }
}
