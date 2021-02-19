<?php


namespace App\Controller;


use App\Entity\Campus;
use App\Form\CampusType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CampusController extends AbstractController
{

    /**
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response
     * @Route("/campus/add", name="campus_add")
     */
    public function add(Request $request, EntityManagerInterface $em)
    {
        $campus = new Campus();
        $form = $this->createForm(CampusType::class, $campus);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em->persist($campus);
            $em->flush();

            return new Response('campus ajouté');
        }

        return $this->render('campus/campusAdd.html.twig', [
            'controller_name' => 'CampusController',
            'campusForm' => $form->createView()
        ]);
    }
}