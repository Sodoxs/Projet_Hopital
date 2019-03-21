<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;

/**
 * Patient
 *
 * @ORM\Entity(repositoryClass="App\Repository\PatientRepository")
 * @ORM\Table(name="PATIENT", uniqueConstraints={@ORM\UniqueConstraint(name="numsecu", columns={"numsecu"})}, indexes={@ORM\Index(name="fkPatientService", columns={"idservice"})})
 */
class Patient
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numsecu", type="integer", nullable=true)
     */
    private $numsecu;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nummutuelle", type="integer", nullable=true)
     */
    private $nummutuelle;

    /**
     * @var string
     *
     * @ORM\Column(name="civilite", type="string", length=1, nullable=false, options={"fixed"=true})
     */
    private $civilite;

    /**
     * @var string
     *
     * @ORM\Column(name="nompatient", type="string", length=30, nullable=false)
     */
    private $nompatient;



    /**
     * @var string
     *
     * @ORM\Column(name="prenompatient", type="string", length=30, nullable=false)
     */
    private $prenompatient;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datenaissance", type="date", nullable=false)
     */
    private $datenaissance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adresse", type="string", length=70, nullable=true)
     */
    private $adresse;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateentree", type="date", nullable=false)
     */
    private $dateentree;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datesortie", type="date", nullable=true)
     */
    private $datesortie;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telephone", type="string", length=15, nullable=true)
     */
    private $telephone;

    /**
     * @var int
     *
     * @ORM\Column(name="nivurgence", type="integer", nullable=false)
     */
    private $nivurgence;

    /**
     * @var string
     *
     * @ORM\Column(name="etaturgence", type="string", length=1, nullable=false, options={"fixed"=true})
     */
    private $etaturgence;

    /**
     * @var Lit
     * @ORM\OneToOne(targetEntity="Lit", mappedBy="patient")
     */
    private $lit;

    /**
     * @var Service
     *
     * @ORM\ManyToOne(targetEntity="Service")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idservice", referencedColumnName="id")
     * })
     */
    private $idservice;

    /**
     * @var PersistentCollection
     * @ORM\OneToMany(targetEntity="Traitement", mappedBy="patient", cascade={"persist", "remove"})
     */
    private $traitements;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNompatient(): ?string
    {
        return $this->nompatient;
    }

    /**
     * @param string $nompatient
     */
    public function setNompatient(string $nompatient): void
    {
        $this->nompatient = $nompatient;
    }

    /**
     * @return string
     */
    public function getPrenompatient(): ?string
    {
        return $this->prenompatient;
    }

    /**
     * @param string $prenompatient
     */
    public function setPrenompatient(string $prenompatient): void
    {
        $this->prenompatient = $prenompatient;
    }

    /**
     * @return int|null
     */
    public function getNumsecu(): ?int
    {
        return $this->numsecu;
    }

    /**
     * @param int|null $numsecu
     */
    public function setNumsecu(?int $numsecu): void
    {
        $this->numsecu = $numsecu;
    }

    /**
     * @return int|null
     */
    public function getNummutuelle(): ?int
    {
        return $this->nummutuelle;
    }

    /**
     * @param int|null $nummutuelle
     */
    public function setNummutuelle(?int $nummutuelle): void
    {
        $this->nummutuelle = $nummutuelle;
    }

    /**
     * @return string
     */
    public function getCivilite(): ?string
    {
        return $this->civilite;
    }

    /**
     * @param string $civilite
     */
    public function setCivilite(string $civilite): void
    {
        $this->civilite = $civilite;
    }

    /**
     * @return \DateTime
     */
    public function getDatenaissance(): ?\DateTime
    {
        return $this->datenaissance;
    }

    /**
     * @param \DateTime $datenaissance
     */
    public function setDatenaissance(\DateTime $datenaissance): void
    {
        $this->datenaissance = $datenaissance;
    }

    /**
     * @return null|string
     */
    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    /**
     * @param null|string $adresse
     */
    public function setAdresse(?string $adresse): void
    {
        $this->adresse = $adresse;
    }

    /**
     * @return \DateTime
     */
    public function getDateentree(): ?\DateTime
    {
        return $this->dateentree;
    }

    /**
     * @param \DateTime $dateentree
     */
    public function setDateentree(\DateTime $dateentree): void
    {
        $this->dateentree = $dateentree;
    }

    /**
     * @return \DateTime|null
     */
    public function getDatesortie(): ?\DateTime
    {
        return $this->datesortie;
    }

    /**
     * @param \DateTime|null $datesortie
     */
    public function setDatesortie(?\DateTime $datesortie): void
    {
        $this->datesortie = $datesortie;
    }

    /**
     * @return null|string
     */
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    /**
     * @param null|string $telephone
     */
    public function setTelephone(?string $telephone): void
    {
        $this->telephone = $telephone;
    }

    /**
     * @return int
     */
    public function getNivurgence(): ?int
    {
        return $this->nivurgence;
    }

    /**
     * @param int $nivurgence
     */
    public function setNivurgence(int $nivurgence): void
    {
        $this->nivurgence = $nivurgence;
    }

    /**
     * @return string
     */
    public function getEtaturgence(): ?string
    {
        return $this->etaturgence;
    }

    /**
     * @param string $etaturgence
     */
    public function setEtaturgence(string $etaturgence): void
    {
        $this->etaturgence = $etaturgence;
    }

    /**
     * @return Service
     */
    public function getIdservice(): ?Service
    {
        return $this->idservice;
    }

    /**
     * @param Service $idservice
     */
    public function setIdservice(Service $idservice): void
    {
        $this->idservice = $idservice;
    }

    /**
     * @return PersistentCollection
     */
    public function getTraitements(): PersistentCollection
    {
        return $this->traitements;
    }

    /**
     * @param PersistentCollection $traitements
     */
    public function setTraitements(PersistentCollection $traitements): void
    {
        $this->traitements = $traitements;
    }

    /**
     * @return Lit
     */
    public function getLit(): Lit
    {
        return $this->lit;
    }

    /**
     * @param Lit $lit
     */
    public function setLit(Lit $lit): void
    {
        $this->lit = $lit;
    }

}
