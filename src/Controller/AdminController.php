<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/campus", name="admin_campus"
     */
    public function gestionCampus()
    {


        return $this->render('admin/campusAdd.html.twig');
    }



}