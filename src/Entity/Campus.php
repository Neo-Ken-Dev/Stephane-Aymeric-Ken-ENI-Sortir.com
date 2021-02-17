<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Campus
 * @ORM\Table(name="campus")
 * @ORM\Entity
 */
class Campus
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(name="no_campus", type="integer", nullable=false)
     */
    private $noCampus;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_campus", type="string", length=30, nullable=false)
     */
    private $nomCampus;


}
