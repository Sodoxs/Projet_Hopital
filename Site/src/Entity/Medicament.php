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
     * @var Composer
     * @ORM\ManyToOne(targetEntity="Composer", inversedBy="medicaments")
     */
    private $composer;

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
}
