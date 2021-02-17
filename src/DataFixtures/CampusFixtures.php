<?php


namespace App\DataFixtures;


use App\Entity\Campus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CampusFixtures extends Fixture
{
    public function load(ObjectManager $manager){

        $campus = new Campus();
        $campus->setNomCampus("Rennes");

        $manager->persist($campus);

        $campus2= new Campus();
        $campus2->setNomCampus("Nantes");

        $manager->persist($campus2);

        $manager->flush();
    }
}