<?php

namespace App\Controller;


use App\Data\SearchData;
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
        $this->denyAccessUnlessGranted("IS_AUTHENTICATED_REMEMBERED");

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
     * @Route("/sortie/creation", name="sortie_creation")
     * @Route("/sortie/{id}/modifier", name="sortie_modifier")
     * @param Sortie|null $sortie
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param EtatRepository $etatRepo
     * @return Response
     */
    public function createOrUpdateSortie(Sortie $sortie = null, Request $request, EntityManagerInterface $em, EtatRepository $etatRepo): Response
    {
       $this->denyAccessUnlessGranted("IS_AUTHENTICATED_REMEMBERED");

        if (!$sortie){
            $sortie = new Sortie();
            $sortie->setOrganisateur($this->getUser()->getUsername());
        }

        $sortieForm = $this->createForm(CreationSortieType::class, $sortie);
        $sortieForm->handleRequest($request);

        if ($sortieForm->isSubmitted() && $sortieForm->isValid()){

            if($sortieForm->get('add')->isClicked()){
                $etat = $etatRepo->findOneBy(['libelle' => 'En cours']);
                $sortie->setEtatSortie($etat);
            }
            if ($sortieForm->get('publish')->isClicked()){
                $etat = $etatRepo->findOneBy(['libelle' => 'Ouvert']);
                $sortie->setEtatSortie($etat);
            }
            if ($sortieForm->get('annuler')->isClicked()){
                return new RedirectResponse($this->generateUrl('sorties_list'));
            }
            if ($sortieForm->get('delete')->isClicked()){
                $em->remove($sortie);
                $em->flush();
                return new RedirectResponse($this->generateUrl('sorties_list'));
            }
            $em->persist($sortie);
            $em->flush();
            return new RedirectResponse($this->generateUrl('sorties_list'));
        }

        return $this->render('sortie/createSortieForm.html.twig', [
            'controller_name' => 'SortieController',
            'sortieForm' => $sortieForm->createView(),
            'editMode' => $sortie->getId() !== null,
            'sortie' => $sortie
        ]);
    }

    /**
     * @Route("/sortie/{id}/afficher", name="sortie_detail")
     */
    public function afficher(SortieRepository $sorties, Request $request)
    {

        
        return $this->render('sortie/afficherSortie.html.twig',[

        ]);
    }


}
