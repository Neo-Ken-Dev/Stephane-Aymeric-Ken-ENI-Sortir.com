<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Campus
 *
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





    /**
     * @return int
     */
    public function getNoCampus(): int
    {
        return $this->noCampus;
    }



    /**
     * @return string
     */
    public function getNomCampus(): string
    {
        return $this->nomCampus;
    }

    /**
     * @param string $nomCampus
     */
    public function setNomCampus(string $nomCampus): void
    {
        $this->nomCampus = $nomCampus;
    }

    public function __toString()
    {
        return $this->nomCampus;
    }


    public function __construct()
    {
        $this->noCampus= new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getSortie()
    {
        return $this->sortie;
    }

    /**
     * @param mixed $sortie
     */
    public function setSortie($sortie): void
    {
        $this->sortie = $sortie;
    }


}
