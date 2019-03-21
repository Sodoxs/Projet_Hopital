<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;

/**
 * Statut
 *
 * @ORM\Table(name="STATUT", uniqueConstraints={@ORM\UniqueConstraint(name="statut", columns={"statut"})})
 * @ORM\Entity
 */
class Statut
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
     * @ORM\Column(name="statut", type="string", length=15, nullable=true)
     */
    private $statut;

    /**
     * @var PersistentCollection
     * @ORM\OneToMany(targetEntity="Traitement", mappedBy="statut")
     */
    private $traitements;

    /**
     * @return string|null
     */
    public function getStatut(): ?string
    {
        return $this->statut;
    }

    /**
     * @param string|null $statut
     */
    public function setStatut(?string $statut): void
    {
        $this->statut = $statut;
    }

    /**
     * @return PersistentCollection
     */
    public function getTraitements(): PersistentCollection
    {
        return $this->traitements;
    }

    /**
     * @param PersistentCollection $traitements
     */
    public function setTraitements(PersistentCollection $traitements): void
    {
        $this->traitements = $traitements;
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


}
