<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * Lit
 * @ORM\Entity(repositoryClass="App\Repository\LitRepository")
 * @ORM\Table(name="LIT")
 */
class Lit
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
     * @ORM\Column(name="numbloc", type="integer", nullable=true)
     */
    private $numbloc;

    /**
     * @var int
     *
     * @ORM\Column(name="numchambre", type="integer", nullable=false)
     */
    private $numchambre;

    /**
     * @var int
     *
     * @ORM\Column(name="numetage", type="integer", nullable=false)
     */
    private $numetage;

    /**
     * @var string
     *
     * @ORM\Column(name="nomaile", type="string", length=10, nullable=false)
     */
    private $nomaile;

    /**
     * @var Patient
     * @ORM\OneToOne(targetEntity="Patient", inversedBy="lit")
     * @JoinColumn(name="patient_id", referencedColumnName="id", nullable=true)
     */
    private $patient;


    /**
     * @return int
     */
    public function getNumchambre(): int
    {
        return $this->numchambre;
    }

    /**
     * @return int
     */
    public function getNumetage(): int
    {
        return $this->numetage;
    }

    /**
     * @return string
     */
    public function getNomaile(): string
    {
        return $this->nomaile;
    }

    /**
     * @return int|null
     */
    public function getNumbloc(): ?int
    {
        return $this->numbloc;
    }

    /**
     * @param int|null $numbloc
     */
    public function setNumbloc(?int $numbloc): void
    {
        $this->numbloc = $numbloc;
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
     * @return Patient
     */
    public function getPatient(): Patient
    {
        return $this->patient;
    }

    /**
     * @param Patient $patient
     */
    public function setPatient(Patient $patient): void
    {
        $this->patient = $patient;
    }

}
