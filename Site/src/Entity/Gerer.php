<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;

/**
 * Service
 *
 * @ORM\Table(name="GERER")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\GererRepository")
 */
class Gerer
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
     * @var PersistentCollection
     *
     * @ORM\OneToMany(targetEntity="Employe", mappedBy="gerer")
     */
    private $employes;

    /**
     * @var PersistentCollection
     *
     * @ORM\OneToMany(targetEntity="Traitement", mappedBy="gerer")
     */
    private $traitements;

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
     * @return PersistentCollection
     */
    public function getEmployes(): PersistentCollection
    {
        return $this->employes;
    }

    /**
     * @param PersistentCollection $employes
     */
    public function setEmployes(PersistentCollection $employes): void
    {
        $this->employes = $employes;
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
}
