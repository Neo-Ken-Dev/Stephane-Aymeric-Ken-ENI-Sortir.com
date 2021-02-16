<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Entity\Sorties;
use App\Form\SearchForm;
use App\Repository\SortiesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SortiesController extends AbstractController
{
    /**
     * @Route("/sorties", name="sorties_list")
     */
    public function list(SortiesRepository $sorties)
    {
        $data = new SearchData();
        $form=$this->createForm(SearchForm::class,$data);
        $sortiesRepo= $sorties ->findSearch();

       return $this->render('sorties/list.html.twig',[
           'sorties' => $sortiesRepo,
           'form' => $form->createView()
       ]);
    }
}
