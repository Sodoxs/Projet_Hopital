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
     * @return string|null
     */
    public function getNommedicament(): ?string
    {
        return $this->nommedicament;
    }

    /**
     * @param string|null $nommedicament
     */
    public function setNommedicament(?string $nommedicament): void
    {
        $this->nommedicament = $nommedicament;
    }

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
     * @return string
     */
    public function getPrincipeactif(): string
    {
        return $this->principeactif;
    }

    /**
     * @param string $principeactif
     */
    public function setPrincipeactif(string $principeactif): void
    {
        $this->principeactif = $principeactif;
    }

    /**
     * @return int
     */
    public function getStock(): int
    {
        return $this->stock;
    }

    /**
     * @param int $stock
     */
    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdtraitement(): \Doctrine\Common\Collections\Collection
    {
        return $this->idtraitement;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $idtraitement
     */
    public function setIdtraitement(\Doctrine\Common\Collections\Collection $idtraitement): void
    {
        $this->idtraitement = $idtraitement;
    }


}
