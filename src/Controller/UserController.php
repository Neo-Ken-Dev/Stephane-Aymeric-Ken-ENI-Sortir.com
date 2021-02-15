<?php

namespace App\Controller;

use App\Entity\Participants;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/", name="connexion")
     */
    public function connexion(): \Symfony\Component\HttpFoundation\Response
    {

        return $this->render("default/connexion.html.twig");
    }

}
