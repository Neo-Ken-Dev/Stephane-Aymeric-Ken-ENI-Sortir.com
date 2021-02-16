<?php

namespace App\Controller;

use App\Entity\Participants;
use App\Form\GestionProfilType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/profil", name= "gestion_profil")
     */
    public function mettreAJourProfil (Request $request, EntityManagerInterface $em): Response
    {
        $formulaireGestionProfil = $this->createForm(GestionProfilType::class);


        if ($formulaireGestionProfil->isSubmitted()) {
        //modification du profil en bdd
    }

        return $this->render("user/monProfil.html.twig", [
            "formulaireGestionProfil" => $formulaireGestionProfil->createView()
        ]);
    }

}
