<?php
namespace App\Controller;


use App\Entity\Participants;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/accueil", name="home")
     */
    public function home(): Response
    {
        $profil = New Participants();

        return $this->render("default/home.html.twig", [
           'profil'=>$profil
        ]);
    }

}
