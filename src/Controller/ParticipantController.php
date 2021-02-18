<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\GestionProfilType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class ParticipantController extends AbstractController
{
    /**
     * @Route("/", name="connexion")
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
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
     * @Route("/profil/{noParticipant}", name= "gestion_profil"),
     * requirements={"noParticipant": "\d+"},
     * method={"GET"})
     * @param User $participant
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function mettreAJourProfil (User $participant, Request $request, EntityManagerInterface $em): Response
    {
        //création du formulaire
        $formulaireGestionProfil = $this->createForm(GestionProfilType::class, $participant);

        //récupération de la saisie utilisateur
        $formulaireGestionProfil->handleRequest($request);

        //si le formulaire est soumis
        if ($formulaireGestionProfil->isSubmitted() && $formulaireGestionProfil->isValid()) {

            $em->flush();

            $this->addFlash('success','Profil modifié avec succès !');

            // return $this->redirectToRoute ('gestion_profil');

        }

        return $this->render("participant/monProfil.html.twig", ['participant' => $participant,
            "formulaireGestionProfil" => $formulaireGestionProfil->createView()
        ]);
    }

}
