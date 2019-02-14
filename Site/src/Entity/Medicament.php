<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medicament
 *
 * @ORM\Table(name="MEDICAMENT", uniqueConstraints={@ORM\UniqueConstraint(name="nommedicament", columns={"nommedicament"})})
 * @ORM\Entity
 */
class Medicament
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
     * @var string|null
     *
     * @ORM\Column(name="nommedicament", type="string", length=64, nullable=true)
     */
    private $nommedicament;

    /**
     * @var string
     *
     * @ORM\Column(name="principeactif", type="string", length=64, nullable=false)
     */
    private $principeactif;

    /**
     * @var int
     *
     * @ORM\Column(name="stock", type="integer", nullable=false)
     */
    private $stock;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Traitement", mappedBy="idmedicament")
     */
    private $idtraitement;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idtraitement = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
