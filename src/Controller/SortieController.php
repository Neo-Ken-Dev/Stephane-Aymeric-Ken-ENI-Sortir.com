<?php

namespace App\Controller;


use App\Data\SearchData;
use App\Entity\Sortie;
use App\Form\CreationSortieType;
use App\Form\SearchForm;
use App\Repository\SortieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
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

        $sortiesRepo= $sorties->findSearch($data);

        return $this->render('sortie/list.html.twig',[
            'sorties' => $sortiesRepo,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/sortie/creation", name="sortie_creation")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function createSortie(Request $request, EntityManagerInterface $em): Response
    {

        $sortie = new Sortie();

        $sortieForm = $this->createForm(CreationSortieType::class, $sortie);
        $sortieForm->handleRequest($request);

        if ($sortieForm->isSubmitted() && $sortieForm->isValid()){
            $em->persist($sortie);
            $em->flush();

            return new RedirectResponse($this->generateUrl('sorties_list'));
        }

        return $this->render('sortie/createSortieForm.html.twig', [
            'controller_name' => 'SortieController',
            'sortieForm' => $sortieForm->createView()
        ]);
    }



}
