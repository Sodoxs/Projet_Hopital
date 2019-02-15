<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Patient
 *
 * @ORM\Table(name="PATIENT", uniqueConstraints={@ORM\UniqueConstraint(name="numsecu", columns={"numsecu"})}, indexes={@ORM\Index(name="fkPatientService", columns={"idservice"}), @ORM\Index(name="fkPatientLit", columns={"idlit"})})
 * @ORM\Entity
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
     * @var \Lit
     *
     * @ORM\ManyToOne(targetEntity="Lit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idlit", referencedColumnName="id")
     * })
     */
    private $idlit;

    /**
     * @var \Service
     *
     * @ORM\ManyToOne(targetEntity="Service")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idservice", referencedColumnName="id")
     * })
     */
    private $idservice;






    /**
     * @return string
     */
    public function getNompatient(): string
    {
        return $this->nompatient;
    }

    /**
     * @return string
     */
    public function getPrenompatient(): string
    {
        return $this->prenompatient;
    }

}
