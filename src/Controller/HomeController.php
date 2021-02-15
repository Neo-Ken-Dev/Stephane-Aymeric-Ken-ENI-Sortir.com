<?php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/accueil", name="home")
     */
    public function home(): \Symfony\Component\HttpFoundation\Response
    {

        return $this->render("default/home.html.twig");
    }

}
