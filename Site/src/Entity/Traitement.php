<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Traitement
 *
 * @ORM\Table(name="TRAITEMENT", indexes={@ORM\Index(name="fkTraitementStatut", columns={"idstatut"}), @ORM\Index(name="fkTraitementPatient", columns={"idpatient"})})
 * @ORM\Entity
 */
class Traitement
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
     * @var \DateTime|null
     *
     * @ORM\Column(name="datetraitement", type="date", nullable=true)
     */
    private $datetraitement;


    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datefintraitement", type="date", nullable=true)
     */
    private $datefintraitement;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Patient", inversedBy="id")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $idpatient;

    /**
     * @var \Statut
     *
     * @ORM\ManyToOne(targetEntity="Statut")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idstatut", referencedColumnName="id")
     * })
     */
    private $idstatut;

    /**
     * @var Composer
     * @ORM\ManyToOne(targetEntity="Composer", inversedBy="traitements")
     */
    private $composer;

    /**
     * @var Gerer
     * @ORM\ManyToOne(targetEntity="Gerer", inversedBy="traitements")
     */
    private $gerer;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idemploye = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    /**
     * @return \DateTime|null
     */
    public function getDatetraitement(): ?\DateTime
    {
        return $this->datetraitement;
    }

    /**
     * @return \Patient
     */
    public function getIdpatient(): \Patient
    {
        return $this->idpatient;
    }

    /**
     * @return \DateTime|null
     */
    public function getDatefintraitement(): ?\DateTime
    {
        return $this->datefintraitement;
    }

    /**
     * @param \DateTime|null $datefintraitement
     */
    public function setDatefintraitement(?\DateTime $datefintraitement): void
    {
        $this->datefintraitement = $datefintraitement;
    }

    /**
     * @return \Statut
     */
    public function getIdstatut(): \Statut
    {
        return $this->idstatut;
    }

    /**
     * @param \Statut $idstatut
     */
    public function setIdstatut(\Statut $idstatut): void
    {
        $this->idstatut = $idstatut;
    }

    /**
     * @return Composer
     */
    public function getComposer(): Composer
    {
        return $this->composer;
    }

    /**
     * @param Composer $composer
     */
    public function setComposer(Composer $composer): void
    {
        $this->composer = $composer;
    }

    /**
     * @return Gerer
     */
    public function getGerer(): Gerer
    {
        return $this->gerer;
    }

    /**
     * @param Gerer $gerer
     */
    public function setGerer(Gerer $gerer): void
    {
        $this->gerer = $gerer;
    }

}
