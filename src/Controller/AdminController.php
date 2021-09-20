<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;


class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="AdminDashboard", methods={"GET"})
     */
    public function AdminDashboard()
    {
        $user = $this->getUser();


        if($user->getRoles()['role'] == "USER"){
            return new RedirectResponse("/home");
        }


        return $this->render("Admin/dashboard.html.twig");
    }
}
