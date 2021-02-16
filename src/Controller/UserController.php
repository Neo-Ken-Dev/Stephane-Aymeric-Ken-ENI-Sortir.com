<?php

namespace App\Controller;

use App\Entity\Participants;
use App\Form\GestionProfilType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends AbstractController
{
    /**
     * @Route("/", name="connexion")
     */
    public function connexion(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render("security/connexion.html.twig", ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout(): Response
    {}

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
