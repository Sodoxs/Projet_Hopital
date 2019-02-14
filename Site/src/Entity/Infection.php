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

}
