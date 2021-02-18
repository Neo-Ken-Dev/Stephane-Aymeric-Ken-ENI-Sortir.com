<?php

namespace App\Entity;

use App\Repository\CampusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CampusRepository::class)
 */
class Campus
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $nom;

    /**
     * @ORM\OneToMany (targetEntity="App\Entity\Sortie", mappedBy="campus")
     * @ORM\JoinColumn(nullable=true)
     */
    private $sorties;

    /**
     * @ORM\OneToMany (targetEntity="App\Entity\User", mappedBy="campus")
     * @ORM\JoinColumn(nullable=true)
     */
    private $users;

    public function __construct()
    {
        $this->sorties = new ArrayCollection();
        $this->users = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }
}
