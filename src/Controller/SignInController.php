<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SignInController extends AbstractController
{
    /**
     * @Route("/sign/in", name="app_sign_in")
     */
    public function index(): Response
    {
        return $this->render('sign_in/index.html.twig', [
            'controller_name' => 'SignInController',
        ]);
    }
}
