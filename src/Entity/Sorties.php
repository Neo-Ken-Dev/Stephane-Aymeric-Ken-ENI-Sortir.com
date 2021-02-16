<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sorties
 *
 * @ORM\Table(name="sorties", indexes={@ORM\Index(name="sorties_etats_fk", columns={"etats_no_etat"}), @ORM\Index(name="sorties_lieux_fk", columns={"lieux_no_lieu"}), @ORM\Index(name="sorties_participants_fk", columns={"organisateur"})})
 * @ORM\Entity
 */
class Sorties
{
    /**
     * @var int
     *
     * @ORM\Column(name="no_sortie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $noSortie;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=250, nullable=false)
     */
    private $nom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedebut", type="datetime", nullable=false)
     */
    private $datedebut;

    /**
     * @var int|null
     *
     * @ORM\Column(name="duree", type="integer", nullable=true)
     */
    private $duree;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datecloture", type="datetime", nullable=false)
     */
    private $datecloture;

    /**
     * @var int
     *
     * @ORM\Column(name="nbinscriptionsmax", type="integer", nullable=false)
     */
    private $nbinscriptionsmax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descriptioninfos", type="string", length=500, nullable=true)
     */
    private $descriptioninfos;

    /**
     * @var int|null
     *
     * @ORM\Column(name="etatsortie", type="integer", nullable=true)
     */
    private $etatsortie;

    /**
     * @var string|null
     *
     * @ORM\Column(name="urlPhoto", type="string", length=250, nullable=true)
     */
    private $urlphoto;

    /**
     * @var \Etats
     *
     * @ORM\ManyToOne(targetEntity="Etats")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="etats_no_etat", referencedColumnName="no_etat")
     * })
     */
    private $etatsNoEtat;

    /**
     * @var \Lieux
     *
     * @ORM\ManyToOne(targetEntity="Lieux")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lieux_no_lieu", referencedColumnName="no_lieu")
     * })
     */
    private $lieuxNoLieu;

    /**
     * @var \Participants
     *
     * @ORM\ManyToOne(targetEntity="Participants")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="organisateur", referencedColumnName="no_participant")
     * })
     */
    private $organisateur;

    /**
     * @return int
     */
    public function getNoSortie(): int
    {
        return $this->noSortie;
    }

    /**
     * @param int $noSortie
     */
    public function setNoSortie(int $noSortie): void
    {
        $this->noSortie = $noSortie;
    }

    /**
     * @return string
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return \DateTime
     */
    public function getDatedebut(): \DateTime
    {
        return $this->datedebut;
    }

    /**
     * @param \DateTime $datedebut
     */
    public function setDatedebut(\DateTime $datedebut): void
    {
        $this->datedebut = $datedebut;
    }

    /**
     * @return int|null
     */
    public function getDuree(): ?int
    {
        return $this->duree;
    }

    /**
     * @param int|null $duree
     */
    public function setDuree(?int $duree): void
    {
        $this->duree = $duree;
    }

    /**
     * @return \DateTime
     */
    public function getDatecloture(): \DateTime
    {
        return $this->datecloture;
    }

    /**
     * @param \DateTime $datecloture
     */
    public function setDatecloture(\DateTime $datecloture): void
    {
        $this->datecloture = $datecloture;
    }

    /**
     * @return int
     */
    public function getNbinscriptionsmax(): int
    {
        return $this->nbinscriptionsmax;
    }

    /**
     * @param int $nbinscriptionsmax
     */
    public function setNbinscriptionsmax(int $nbinscriptionsmax): void
    {
        $this->nbinscriptionsmax = $nbinscriptionsmax;
    }

    /**
     * @return string|null
     */
    public function getDescriptioninfos(): ?string
    {
        return $this->descriptioninfos;
    }

    /**
     * @param string|null $descriptioninfos
     */
    public function setDescriptioninfos(?string $descriptioninfos): void
    {
        $this->descriptioninfos = $descriptioninfos;
    }

    /**
     * @return int|null
     */
    public function getEtatsortie(): ?int
    {
        return $this->etatsortie;
    }

    /**
     * @param int|null $etatsortie
     */
    public function setEtatsortie(?int $etatsortie): void
    {
        $this->etatsortie = $etatsortie;
    }

    /**
     * @return string|null
     */
    public function getUrlphoto(): ?string
    {
        return $this->urlphoto;
    }

    /**
     * @param string|null $urlphoto
     */
    public function setUrlphoto(?string $urlphoto): void
    {
        $this->urlphoto = $urlphoto;
    }

    /**
     * @return \Etats
     */
    public function getEtatsNoEtat(): \Etats
    {
        return $this->etatsNoEtat;
    }

    /**
     * @param \Etats $etatsNoEtat
     */
    public function setEtatsNoEtat(\Etats $etatsNoEtat): void
    {
        $this->etatsNoEtat = $etatsNoEtat;
    }

    /**
     * @return \Lieux
     */
    public function getLieuxNoLieu(): \Lieux
    {
        return $this->lieuxNoLieu;
    }

    /**
     * @param \Lieux $lieuxNoLieu
     */
    public function setLieuxNoLieu(\Lieux $lieuxNoLieu): void
    {
        $this->lieuxNoLieu = $lieuxNoLieu;
    }

    /**
     * @return \Participants
     */
    public function getOrganisateur(): \Participants
    {
        return $this->organisateur;
    }

    /**
     * @param \Participants $organisateur
     */
    public function setOrganisateur(\Participants $organisateur): void
    {
        $this->organisateur = $organisateur;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParticipantsNoParticipant()
    {
        return $this->participantsNoParticipant;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $participantsNoParticipant
     */
    public function setParticipantsNoParticipant($participantsNoParticipant): void
    {
        $this->participantsNoParticipant = $participantsNoParticipant;
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Participants", inversedBy="sortiesNoSortie")
     * @ORM\JoinTable(name="inscriptions",
     *   joinColumns={
     *     @ORM\JoinColumn(name="sorties_no_sortie", referencedColumnName="no_sortie")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="participants_no_participant", referencedColumnName="no_participant")
     *   }
     * )
     */





    private $participantsNoParticipant;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->participantsNoParticipant = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
