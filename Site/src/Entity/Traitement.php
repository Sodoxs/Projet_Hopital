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
     * @var \Patient
     *
     * @ORM\ManyToOne(targetEntity="Patient", inversedBy="id")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idpatient", referencedColumnName="id")
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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Medicament", inversedBy="idtraitement")
     * @ORM\JoinTable(name="composer",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idtraitement", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idmedicament", referencedColumnName="id")
     *   }
     * )
     */
    private $idmedicament;

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
        $this->idmedicament = new \Doctrine\Common\Collections\ArrayCollection();
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

<<<<<<< HEAD
=======
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


>>>>>>> 490772fbcb7551a8f55940d148ba3096f7876617
}
