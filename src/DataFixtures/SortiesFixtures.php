<?php


namespace App\DataFixtures;


use App\Entity\Sortie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class SortiesFixtures extends Fixture
{


    public function load(ObjectManager $manager)
    {
        $user = new Sortie();
        $user->setNom("Lorem1");
        $user-> setDateHeureDebut(new \DateTime());
        $user->setDateLimiteInscription(new \DateTime());
        $user->setDescriptioninfos("Sit vitae voluptas sint non voluptates");
        $user->setNbInscriptionMax("20");
        $user->setUrlphoto("http://picsum.photos/id/100");
        //$user->setCampus(1);

        $manager->persist($user);

        $user2 = new Sortie();
        $user2->setNom("Lorem2");
        $user2-> setDateHeureDebut(new \DateTime());
        $user2->setDateLimiteInscription(new \DateTime());
        $user2->setDescriptioninfos("Sit vitae voluptas sint non voluptates2");
        $user2->setNbInscriptionMax("20");
        $user2->setUrlphoto("http://picsum.photos/id/110");
        //$user2->setCampus(2);

        $manager->persist($user2);

        $user3 = new Sortie();
        $user3->setNom("Lorem3");
        $user3-> setDateHeureDebut(new \DateTime());
        $user3->setDateLimiteInscription(new \DateTime());
        $user3->setDescriptioninfos("Sit vitae voluptas sint non voluptates");
        $user3->setNbInscriptionMax("20");
        $user3->setUrlphoto("http://picsum.photos/id/120");
        //$user3->setCampus(1);

        $manager->persist($user3);

        $user4 = new Sortie();
        $user4->setNom("Lorem4");
        $user4-> setDateHeureDebut(new \DateTime());
        $user4->setDateLimiteInscription(new \DateTime());
        $user4->setDescriptioninfos("Sit vitae voluptas sint non voluptates4");
        $user4->setNbInscriptionMax("20");
        $user4->setUrlphoto("http://picsum.photos/id/105");
        //$user4->setCampus(2);

        $manager->persist($user4);

        $user5 = new Sortie();
        $user5->setNom("Lorem5");
        $user5-> setDateHeureDebut(new \DateTime());
        $user5->setDateLimiteInscription(new \DateTime());
        $user5->setDescriptioninfos("Sit vitae voluptas sint non voluptates5");
        $user5->setNbInscriptionMax("20");
        $user5->setUrlphoto("http://picsum.photos/id/130");
        //$user5->setCampus(1);

        $manager->persist($user5);

        $user6 = new Sortie();
        $user6->setNom("Lorem");
        $user6-> setDateHeureDebut(new \DateTime());
        $user6->setDateLimiteInscription(new \DateTime());
        $user6->setDescriptioninfos("Sit vitae voluptas sint non voluptates6");
        $user6->setNbInscriptionMax("20");
        $user6->setUrlphoto("http://picsum.photos/id/115");
        //$user6->setCampus(2);

        $manager->persist($user6);

        $user7 = new Sortie();
        $user7->setNom("Lorem");
        $user7-> setDateHeureDebut(new \DateTime());
        $user7->setDateLimiteInscription(new \DateTime());
        $user7->setDescriptioninfos("Sit vitae voluptas sint non voluptates7");
        $user7->setNbInscriptionMax("20");
        $user7->setUrlphoto("http://picsum.photos/id/120");
        //$user7->setCampus(1);

        $manager->persist($user7);

        $user8 = new Sortie();
        $user8->setNom("Lorem");
        $user8-> setDateHeureDebut(new \DateTime());
        $user8->setDateLimiteInscription(new \DateTime());
        $user8->setDescriptioninfos("Sit vitae voluptas sint non voluptates7");
        $user8->setNbInscriptionMax("20");
        $user8->setUrlphoto("http://picsum.photos/id/125");
        //$user8->setCampus(1);

        $manager->persist($user8);

        $manager->flush();
    }



}