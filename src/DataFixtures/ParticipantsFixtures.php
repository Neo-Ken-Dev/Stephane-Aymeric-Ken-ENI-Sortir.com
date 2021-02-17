<?php

namespace App\DataFixtures;

use App\Entity\Participants;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ParticipantsFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new Participants();
        $user->setNom("Lemonnier");
        $user->setPrenom("Ken");
        $user->setPseudo("ken.lemonnier");
        $user->setMail("ken.lemonnier@gmail.com");
        $password = $this->encoder->encodePassword($user, "123456");
        $user->setMotDePasse($password);
        $user->setActif("0");
        $user->setAdministrateur("0");
        $user->setCampusNoCampus("2");

        $manager->persist($user);


        $user2 = new Participants();
        $user2->setNom("Perrinel");
        $user2->setPrenom("Stephane");
        $user2->setPseudo("Perrinel.Stephane");
        $user2->setMail("Perrinel.Stephane@gmail.com");
        $password = $this->encoder->encodePassword($user2, "123456");
        $user2->setMotDePasse($password);
        $user2->setActif("1");
        $user2->setAdministrateur("1");
        $user2->setCampusNoCampus("2");

        $manager->persist($user2);


        $user3 = new Participants();
        $user3->setNom("Crowyn");
        $user3->setPrenom("Aymeric");
        $user3->setPseudo("Aymeric.Crowyn");
        $user3->setMail("Aymeric.Crowyn@gmail.com");
        $password = $this->encoder->encodePassword($user3, "123456");
        $user3->setMotDePasse($password);
        $user3->setActif("0");
        $user3->setAdministrateur("0");
        $user3->setCampusNoCampus("2");

        $manager->persist($user3);

        $manager->flush();
    }
}
