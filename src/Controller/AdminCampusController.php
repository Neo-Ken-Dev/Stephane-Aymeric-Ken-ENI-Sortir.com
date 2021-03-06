<?php

namespace App\Controller;

use App\Entity\Campus;
use App\Form\CampusType;
use App\Repository\CampusRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class AdminCampusController extends AbstractController
{
    /**
     * @Route("/campus", name="admin.campus.gestion")
     * @param Request $request
     * @param CampusRepository $campusRepo
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function gestionCampus(Request $request, CampusRepository $campusRepo, EntityManagerInterface $em): Response
    {
        $formSearchCampus = $this->createFormBuilder()
            ->add('searchCampus', TextType::class)
            ->getForm();

        $formSearchCampus->handleRequest($request);
        $searchData = $request->request->get('form')['searchCampus'];

        if($formSearchCampus ->isSubmitted() && $formSearchCampus ->isValid()) {
            $campusResultSearch = $campusRepo->findByNom($searchData);
        }else {
            $campusResultSearch= $campusRepo->findAll();
        }

        $NewCampus = new Campus();
        $formCampus = $this->createForm(CampusType::class, $NewCampus);
        $formCampus->handleRequest($request);

        if($formCampus ->isSubmitted() && $formCampus ->isValid())
        {
            $em->persist($NewCampus);
            $em->flush();
            $campusResultSearch= $campusRepo->findAll();
        }

        return $this->render('admin/gestionCampus.html.twig', [
            'controller_name' => 'AdminCampusController',
            'campusSearch' => $campusResultSearch,
            'form' => $formSearchCampus->createView(),
            'formCampus' => $formCampus->createView()
        ]);
    }

    /**
     * @Route("/campus/{id}/edit", name="admin.campus.edit")
     * @param Campus $campus
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function editCampus(Campus $campus, Request $request, EntityManagerInterface $em): Response
    {
        $formCampus = $this->createForm(CampusType::class, $campus)
            ->add('update', SubmitType::class, [
                'label' => 'Modifier',
                'attr' => ['class' => 'btn btn-primary']
            ])
            ->add('delete', SubmitType::class, [
                'label' => 'Supprimer',
                'attr' => ['class' => 'btn btn-primary']
            ]);

        $formCampus->handleRequest($request);

        if($formCampus ->isSubmitted() && $formCampus ->isValid())
        {
            if($formCampus->get('update')->isClicked()){
                $em->flush();
            }
            if($formCampus->get('delete')->isClicked()){
                $em->remove($campus);
                $em->flush();
            }
            return $this->redirectToRoute('admin.campus.gestion');
        }

        return $this->render('admin/editCampus.html.twig', [
            'campus' => $campus,
            'formCampus' => $formCampus->createView(),
        ]);
    }
}
