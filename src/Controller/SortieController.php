<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Entity\Inscription;
use App\Entity\Sortie;
use App\Form\CreationSortieType;
use App\Form\SearchForm;
use App\Repository\EtatRepository;
use App\Repository\InscriptionRepository;
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
     * @Route("/detail/{id}", name="detail_sortie")
     * requirements= {"id":"/d+"},
     * methods={"GET"})
     */

    public function detail($id, Request $request, InscriptionRepository $inscriptionRepo)
    {

        $sortiesRepo = $this->getDoctrine()->getRepository(Sortie::class);
        $sortie = $sortiesRepo->find($id);

        // SI USER DEJA INSCRIT A CET EVENEMENT --> AJOUT BOUTON DESINSCRIPTION

        $user = $this->getUser();

        if (!$inscriptionRepo->rechercheInscription($user->getId(), $id)) {

            $btnDesinscrire = false;
        } else {
            $btnDesinscrire = true;
        }

        return $this->render('sortie/detailsSortie.html.twig', ['sortie' => $sortie,
            'btnDesinscrire' => $btnDesinscrire
        ]);
    }

    /**
     * @Route("/inscire/{id}", name="inscrire", requirements={"id":"\d+"})
     */
    public function inscrireSortie($id, EntityManagerInterface $em, InscriptionRepository $inscriptionRepo, SortieRepository $sortieRepo, EtatRepository $etatRepo)
    {
        // ON RECUPERE LE USER ET LA SORTIE EN COURS.
        $user = $this->getUser();
        $sortie = $sortieRepo->find($id);

        //----------CONTRÔLES-----------

        // SI INSCRIPTION OUVERTE

        $libelle = "Ouvert";
        $etatSortie = $sortieRepo->findOneByETAT($libelle);

        if($etatSortie == "Ouvert"){

        // SI IL RESTE DE LA PLACE
        if ($inscriptionRepo->nbInscriptions($id) < $sortie->getNbInscriptionMax()) {

        // SI USER PAS DEJA INSCRIT
        if (!$inscriptionRepo->rechercheInscription($user->getId(), $id)) {

            // SI INSCRIPTIONS MAX ATTEINTES, ETAT SORTIE --> FERME
            if ($inscriptionRepo->nbInscriptions($id) == (($sortie->getNbInscriptionMax()) - 1)) {

                $etat = $etatRepo->findOneBy(['libelle' => 'Fermé']);
                $sortie->setEtatSortie($etat);
                $em->persist($sortie);
                $em->flush();
            }

            // CREATION DE L'INSCRIPTION + ENREGISTREMENT EN BDD

            $inscription = new Inscription();
            $inscription->setUser($user);
            $inscription->setSortie($sortie);
            $date = new \DateTime();
            $inscription->setDateInscription($date);
            $em->persist($inscription);
            $em->flush();

            // MESSAGE DE CONFIRMATION

            $this->addFlash('success', 'Votre inscription est validé !');

        } else {
                 $this->addFlash('error', 'Vous êtes déjà inscrit à cette sortie !');
        }
        } else {
                 $this->addFlash('error', 'Toutes les places disponibles pour cette sortie sont prises pour le moment !' );
            }
        } else {
                 $this->addFlash('error', 'Les inscriptions sont terminées !');
        }

        return $this->redirectToRoute('sorties_list');
    }


}
