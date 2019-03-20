<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Infection
 *
 * @ORM\Table(name="INFECTION", indexes={@ORM\Index(name="fkInfectionMaladie", columns={"idmaladie"}), @ORM\Index(name="fkInfectionPatient", columns={"idpatient"})})
 * @ORM\Entity
 */
class Infection
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
     * @ORM\Column(name="dateGuerison", type="date", nullable=true)
     */
    private $dateguerison;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateDiagnostic", type="date", nullable=true)
     */
    private $datediagnostic;

    /**
     * @var \Maladie
     *
     * @ORM\ManyToOne(targetEntity="Maladie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idmaladie", referencedColumnName="id")
     * })
     */
    private $idmaladie;

    /**
     * @var \Patient
     *
     * @ORM\ManyToOne(targetEntity="Patient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idpatient", referencedColumnName="id")
     * })
     */
    private $idpatient;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Employe", inversedBy="idinfection")
     * @ORM\JoinTable(name="diagnostiquer",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idinfection", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idemploye", referencedColumnName="id")
     *   }
     * )
     */
    private $idemploye;

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
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return \Patient
     */
    public function getIdpatient(): \Patient
    {
        return $this->idpatient;
    }

    /**
     * @param \Patient $idpatient
     */
    public function setIdpatient(\Patient $idpatient): void
    {
        $this->idpatient = $idpatient;
    }

    /**
     * @return \Maladie
     */
    public function getIdmaladie(): \Maladie
    {
        return $this->idmaladie;
    }

    /**
     * @param \Maladie $idmaladie
     */
    public function setIdmaladie(\Maladie $idmaladie): void
    {
        $this->idmaladie = $idmaladie;
    }

    /**
     * @return \DateTime|null
     */
    public function getDatediagnostic(): ?\DateTime
    {
        return $this->datediagnostic;
    }

    /**
     * @param \DateTime|null $datediagnostic
     */
    public function setDatediagnostic(?\DateTime $datediagnostic): void
    {
        $this->datediagnostic = $datediagnostic;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateguerison(): ?\DateTime
    {
        return $this->dateguerison;
    }

    /**
     * @param \DateTime|null $dateguerison
     */
    public function setDateguerison(?\DateTime $dateguerison): void
    {
        $this->dateguerison = $dateguerison;
    }

}
