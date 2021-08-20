<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginClientController extends AbstractController
{
    /**
     * @Route("/login/client", name="login_client")
     */
    public function index(): Response
    {
        return $this->render('login_client/index.html.twig', [
            'controller_name' => 'LoginClientController',
        ]);
    }
}
