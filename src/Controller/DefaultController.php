<?php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="connexion")
     */
    public function connexion(): \Symfony\Component\HttpFoundation\Response
    {

        return $this->render("default/connexion.html.twig");
    }

}
