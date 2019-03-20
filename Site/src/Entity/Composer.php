<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ComposerRepository")
 */
class Composer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantitymedic;

    /**
     * @var PersistentCollection
     * @ORM\OneToMany(targetEntity="Medicament", mappedBy="composer",
     *     cascade={"persist", "remove"})
     */
    private $medicaments;

    /**
     * @return PersistentCollection
     */
    public function getMedicaments(): PersistentCollection
    {
        return $this->medicaments;
    }

    /**
     * @param PersistentCollection $medicaments
     */
    public function setMedicaments(PersistentCollection $medicaments): void
    {
        $this->medicaments = $medicaments;
    }

    /**
     * @var PersistentCollection
     * @ORM\OneToMany(targetEntity="Traitement", mappedBy="composer",
     *     cascade={"persist", "remove"})
     */
    private $traitements;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantitymedic(): ?int
    {
        return $this->quantitymedic;
    }

    public function setQuantitymedic(?int $quantitymedic): self
    {
        $this->quantitymedic = $quantitymedic;

        return $this;
    }
}
