<?php

namespace App\Controller;


use App\Data\SearchData;
use App\Entity\Sortie;
use App\Form\CreationSortieType;
use App\Form\SearchForm;
use App\Repository\SortieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SortieController extends AbstractController
{
    /**
     * @Route("/sorties", name="sorties_list")
     */
    public function list(SortieRepository $sorties, Request $request)
    {
        $data = new SearchData();
        $form=$this->createForm(SearchForm::class,$data);
        $form->handleRequest($request);
        if($form ->isSubmitted() && $form ->isValid())
        {

            $sortiesRepo= $sorties->findSearch($data);
        }
        else $sortiesRepo= $sorties->findAll();

        return $this->render('sortie/list.html.twig',[
            'sorties' => $sortiesRepo,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/sortie", name="sortie_creation")
     */
    public function createSortie(): Response
    {
        $sortie = new Sortie();
        $sortieForm = $this->createForm(CreationSortieType::class, $sortie);
        return $this->render('sortie/createSortieForm.html.twig', [
            'controller_name' => 'SortieController',
            'sortieForm' => $sortieForm->createView()
        ]);
    }



}
