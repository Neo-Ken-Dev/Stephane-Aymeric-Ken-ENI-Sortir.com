<?php


namespace App\DataFixtures;


use App\Entity\Etat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EtatFixture extends Fixture
{
    public function load(ObjectManager $manager){

        $etat = new Etat();
        $etat->setLibelle("En création");
        $manager->persist($etat);

        $etat2= new Etat();
        $etat2->setLibelle("Ouvert");
        $manager->persist($etat2);


        $etat3= new Etat();
        $etat3->setLibelle("En cours");
        $manager->persist($etat3);

        $etat4= new Etat();
        $etat4->setLibelle("Fermé");
        $manager->persist($etat4);

        $manager->flush();
    }
}