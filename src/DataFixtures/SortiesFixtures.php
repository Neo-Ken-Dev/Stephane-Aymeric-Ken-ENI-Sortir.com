<?php


namespace App\DataFixtures;

use App\Entity\Sorties;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class SortiesFixtures extends Fixture
{


    public function load(ObjectManager $manager)
    {
        $user = new Sorties();
        $user->setNom("Lorem1");
        $user-> setDatedebut(new \DateTime());
        $user->setDatecloture(new \DateTime());
        $user->setDescriptioninfos("Sit vitae voluptas sint non voluptates");
        $user->setNbinscriptionsmax("20");
        $user->setUrlphoto("http://picsum.photos/id/100");
        $user->setCampus(1);

        $manager->persist($user);

        $user2 = new Sorties();
        $user2->setNom("Lorem2");
        $user2-> setDatedebut(new \DateTime());
        $user2->setDatecloture(new \DateTime());
        $user2->setDescriptioninfos("Sit vitae voluptas sint non voluptates2");
        $user2->setNbinscriptionsmax("20");
        $user2->setUrlphoto("http://picsum.photos/id/110");
        $user2->setCampus(2);

        $manager->persist($user2);

        $user3 = new Sorties();
        $user3->setNom("Lorem3");
        $user3-> setDatedebut(new \DateTime());
        $user3->setDatecloture(new \DateTime());
        $user3->setDescriptioninfos("Sit vitae voluptas sint non voluptates");
        $user3->setNbinscriptionsmax("20");
        $user3->setUrlphoto("http://picsum.photos/id/120");
        $user3->setCampus(1);

        $manager->persist($user3);

        $user4 = new Sorties();
        $user4->setNom("Lorem4");
        $user4-> setDatedebut(new \DateTime());
        $user4->setDatecloture(new \DateTime());
        $user4->setDescriptioninfos("Sit vitae voluptas sint non voluptates4");
        $user4->setNbinscriptionsmax("20");
        $user4->setUrlphoto("http://picsum.photos/id/105");
        $user4->setCampus(2);

        $manager->persist($user4);

        $user5 = new Sorties();
        $user5->setNom("Lorem5");
        $user5-> setDatedebut(new \DateTime());
        $user5->setDatecloture(new \DateTime());
        $user5->setDescriptioninfos("Sit vitae voluptas sint non voluptates5");
        $user5->setNbinscriptionsmax("20");
        $user5->setUrlphoto("http://picsum.photos/id/130");
        $user5->setCampus(1);

        $manager->persist($user5);

        $user6 = new Sorties();
        $user6->setNom("Lorem");
        $user6-> setDatedebut(new \DateTime());
        $user6->setDatecloture(new \DateTime());
        $user6->setDescriptioninfos("Sit vitae voluptas sint non voluptates6");
        $user6->setNbinscriptionsmax("20");
        $user6->setUrlphoto("http://picsum.photos/id/115");
        $user6->setCampus(2);

        $manager->persist($user6);

        $user7 = new Sorties();
        $user7->setNom("Lorem");
        $user7-> setDatedebut(new \DateTime());
        $user7->setDatecloture(new \DateTime());
        $user7->setDescriptioninfos("Sit vitae voluptas sint non voluptates7");
        $user7->setNbinscriptionsmax("20");
        $user7->setUrlphoto("http://picsum.photos/id/120");
        $user7->setCampus(1);

        $manager->persist($user7);

        $user8 = new Sorties();
        $user8->setNom("Lorem");
        $user8-> setDatedebut(new \DateTime());
        $user8->setDatecloture(new \DateTime());
        $user8->setDescriptioninfos("Sit vitae voluptas sint non voluptates7");
        $user8->setNbinscriptionsmax("20");
        $user8->setUrlphoto("http://picsum.photos/id/125");
        $user8->setCampus(1);

        $manager->persist($user8);

        $manager->flush();
    }



}