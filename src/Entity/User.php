<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 *
 * @UniqueEntity(
 * fields={"username"},
 * message=" Ce pseudo est déjà utilisé, veuillez recommencer")
 *
 * @UniqueEntity(
 * fields={"email"},
 * message=" Cette adresse mail est déjà utilisée, veuillez recommencer")
 */

class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(message="Votre nom est non valide")
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @Assert\NotBlank(message="Votre prenom est non valide")
     * @ORM\Column(type="string", length=50)
     */
    private $prenom;

    /**
     * @Assert\NotBlank(message="Votre pseudo est non valide")
     * @Assert\Length(min=3, minMessage="Le pseudo doit faire au moins 3 caractères")
     * @ORM\Column(type="string", length=50)
     */
    private $username;

    /**
     * @Assert\NotBlank(message="Votre téléphone est non valide")
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $telephone;

    /**
     * @Assert\Email(message="Votre email est non valide")
     * @ORM\Column(type="string", length=100)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="boolean")
     */
    private $administrateur;

    /**
     * @ORM\Column(type="boolean")
     */
    private $actif;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sortie", mappedBy="user")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sorties;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Sortie", mappedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $participants;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Campus", inversedBy="users")
     * @ORM\JoinColumn(nullable=true)
     */
    private $campus;

    public function __construct()
    {
        $this->sorties = new ArrayCollection();
        $this->participants = new ArrayCollection();
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Inscription", mappedBy="user", orphanRemoval=true)
     */
    private $inscriptions;

    /**
     * @return Campus
     */
    public function getCampus():? Campus
    {
        return $this->campus;
    }

    /**
     * @param mixed $campus
     */
    public function setCampus($campus): void
    {
        $this->campus = $campus;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getAdministrateur(): ?bool
    {
        return $this->administrateur;
    }

    public function setAdministrateur(bool $administrateur): self
    {
        $this->administrateur = $administrateur;

        return $this;
    }

    public function getActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    public function getRoles()
    {
        if ($this->getAdministrateur()){
            return ['ROLE_ADMIN'];
        }else {
            return ['ROLE_USER'];
        }
    }

    /**
     * @return ArrayCollection
     */
    public function getSorties(): ArrayCollection
    {
        return $this->sorties;
    }

    /**
     * @param ArrayCollection $sorties
     */
    public function setSorties(ArrayCollection $sorties): void
    {
        $this->sorties = $sorties;
    }

    /**
     * @return ArrayCollection
     */
    public function getParticipants(): ArrayCollection
    {
        return $this->participants;
    }

    /**
     * @param ArrayCollection $participants
     */
    public function setParticipants(ArrayCollection $participants): void
    {
        $this->participants = $participants;
    }

    /**
     * @return mixed
     */
    public function getInscriptions()
    {
        return $this->inscriptions;
    }

    /**
     * @param mixed $inscriptions
     */
    public function setInscriptions($inscriptions): void
    {
        $this->inscriptions = $inscriptions;
    }



    public function getSalt(){}

    public function eraseCredentials(){}

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function __toString() :string
    {
        return $this -> id;
    }

}
