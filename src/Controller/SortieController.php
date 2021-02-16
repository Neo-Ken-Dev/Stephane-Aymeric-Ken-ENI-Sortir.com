<?php

namespace App\Controller;

use App\Entity\Sorties;
use App\Form\CreationSortieType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SortieController extends AbstractController
{
    /**
     * @Route("/sortie", name="sortie_creation")
     */
    public function createSortie(): Response
    {
        $sortie = new Sorties();
        $sortieForm = $this->createForm(CreationSortieType::class, $sortie);
        return $this->render('sortie/createSortieForm.html.twig', [
            'controller_name' => 'SortieController',
            'sortieForm' => $sortieForm->createView()
        ]);
    }
}
