<?php

namespace App\Controller;

use App\Entity\Sorties;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SortiesController extends AbstractController
{
    /**
     * @Route("/sorties", name="sorties_list")
     */
    public function list()
    {
        $serieRepo=$this->getDoctrine()->getRepository(Sorties::class);
        $sorties= $serieRepo->findAll();


       return $this->render('sorties/list.html.twig',[
           "sorties" => $sorties
       ]);
    }
}
