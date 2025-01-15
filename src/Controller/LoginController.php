<?php

namespace App\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class LoginController extends AbstractController{
    #[Route('/login', name: 'app_login')]
    public function index(): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_article');
        }

        return $this->render('login/index.html.twig');

    }
}