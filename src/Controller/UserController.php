<?php


namespace App\Controller;


use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route ("/profil/{id}/user",name="afficher_profil", requirements ={"id" :"\d+"},methods={"GET"})
     *
     */
    public function afficherUser($id)
    {
        $userRepo = $this ->getDoctrine()->getRepository(User::class);
        $user = $userRepo->find($id);

        return $this->render('participant/profil.html.twig', [
            "user" => $user
        ]);
    }
}