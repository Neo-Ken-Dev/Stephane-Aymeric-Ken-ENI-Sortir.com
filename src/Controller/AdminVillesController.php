<?php


namespace App\Controller;


use App\Entity\Ville;
use App\Form\VilleType;
use App\Repository\VilleRepository;
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

class AdminVillesController extends AbstractController
{
    /**
     * @Route("/villes", name="admin.villes.gestion")
     * @param Request $request
     * @param VilleRepository $villeRepo
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function gestionVilles(Request $request, VilleRepository $villeRepo, EntityManagerInterface $em): Response
    {
        $formSearchVille = $this->createFormBuilder()
            ->add('searchVilles', TextType::class)
            ->getForm();
        $formSearchVille->handleRequest($request);
        $searchData = $request->request->get('form')['searchVilles'];

        if($formSearchVille ->isSubmitted() && $formSearchVille ->isValid())
        {
            $villesResultSearch = $villeRepo->findByNom($searchData);
        }else $villesResultSearch= $villeRepo->findAll();

        $NewVille = new Ville();
        $formAddVille = $this->createForm(VilleType::class, $NewVille);
        $formAddVille->handleRequest($request);
        if($formAddVille ->isSubmitted() && $formAddVille ->isValid())
        {
            $em->persist($NewVille);
            $em->flush();
            $villesResultSearch= $villeRepo->findAll();
        }

        return $this->render('admin/gestionVilles.html.twig', [
            'controller_name' => 'AdminVillesController',
            'villesResultSearch' => $villesResultSearch,
            'formSearchVille' => $formSearchVille->createView(),
            'formAddVille' => $formAddVille->createView()
        ]);
    }

    /**
     * @Route("/ville/{id}/edit", name="admin.ville.edit")
     * @param Ville $ville
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function editVille(Ville $ville, Request $request, EntityManagerInterface $em): Response
    {
        $formEditVille = $this->createForm(VilleType::class, $ville)
            ->add('update', SubmitType::class, [
                'label' => 'Modifier',
                'attr' => ['class' => 'btn btn-primary']
            ])
            ->add('delete', SubmitType::class, [
                'label' => 'Supprimer',
                'attr' => ['class' => 'btn btn-primary']
            ]);
        $formEditVille->handleRequest($request);

        if($formEditVille ->isSubmitted() && $formEditVille ->isValid())
        {
            if($formEditVille->get('update')->isClicked()){
                $em->flush();
            }
            if($formEditVille->get('delete')->isClicked()){
                $em->remove($ville);
                $em->flush();
            }
            return $this->redirectToRoute('admin.villes.gestion');
        }


        return $this->render('admin/editVille.html.twig', [
            'ville' => $ville,
            'formEditVille' => $formEditVille->createView(),
        ]);
    }
}