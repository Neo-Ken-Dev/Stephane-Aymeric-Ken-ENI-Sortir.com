<?php

namespace App\Controller;


use App\Data\SearchData;
use App\Entity\Etat;
use App\Entity\Sortie;
use App\Form\CreationSortieType;
use App\Form\SearchForm;
use App\Repository\EtatRepository;
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
     * @param EtatRepository $etatRepo
     * @return Response
     */
    public function createSortie(Request $request, EntityManagerInterface $em, EtatRepository $etatRepo): Response
    {

        $sortie = new Sortie();
        $sortie->setOrganisateur($this->getUser()->getUsername());

        $sortieForm = $this->createForm(CreationSortieType::class, $sortie);
        $sortieForm->handleRequest($request);

        if ($sortieForm->isSubmitted() && $sortieForm->isValid()){

            if($sortieForm->get('add')->isClicked()){
                $etat = $etatRepo->findOneBy(['libelle' => 'En cours']);
                $sortie->setEtatSortie($etat);
                dump($sortie);
                dump($etat);
            }
            if ($sortieForm->get('publish')->isClicked()){
                $etat = $etatRepo->findOneBy(['libelle' => 'Ouvert']);
                $sortie->setEtatSortie($etat);
                dump($sortie);
                dump($etat);
            }

            $em->persist($sortie);
            $em->flush();

            //return new RedirectResponse($this->generateUrl('sorties_list'));
        }

        return $this->render('sortie/createSortieForm.html.twig', [
            'controller_name' => 'SortieController',
            'sortieForm' => $sortieForm->createView()
        ]);
    }



}
