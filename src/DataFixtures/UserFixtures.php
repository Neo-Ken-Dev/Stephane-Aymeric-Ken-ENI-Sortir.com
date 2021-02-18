<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
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
        $user = new User();
        $user->setNom("Lemonnier");
        $user->setPrenom("Ken");
        $user->setUsername("ken.lemonnier");
        $user->setEmail("ken.lemonnier@gmail.com");
        $password = $this->encoder->encodePassword($user, "123456");
        $user->setPassword($password);
        $user->setActif("0");
        $user->setAdministrateur("0");

        $manager->persist($user);


        $user2 = new User();
        $user2->setNom("Perrinel");
        $user2->setPrenom("Stephane");
        $user2->setUsername("Perrinel.Stephane");
        $user2->setEmail("Perrinel.Stephane@gmail.com");
        $password = $this->encoder->encodePassword($user2, "123456");
        $user2->setPassword($password);
        $user2->setActif("1");
        $user2->setAdministrateur("1");

        $manager->persist($user2);


        $user3 = new User();
        $user3->setNom("Crowyn");
        $user3->setPrenom("Aymeric");
        $user3->setUsername("Aymeric.Crowyn");
        $user3->setEmail("Aymeric.Crowyn@gmail.com");
        $password = $this->encoder->encodePassword($user3, "123456");
        $user3->setPassword($password);
        $user3->setActif("0");
        $user3->setAdministrateur("0");

        $manager->persist($user3);

        $manager->flush();
    }
}
