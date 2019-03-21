<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;

/**
 * Disponible
 *
 * @ORM\Table(name="DISPONIBLE")
 * @ORM\Entity
 */
class Disponible
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
     * @ORM\Column(name="disponible", type="string", length=15, nullable=true)
     */
    private $disponible;

    /**
     * @var PersistentCollection
     * @ORM\OneToMany(targetEntity="Employe", mappedBy="disponible")
     */
    private $employe;

    /**
     * @return string|null
     */
    public function getDisponible(): ?string
    {
        return $this->disponible;
    }

    /**
     * @param string|null $disponible
     */
    public function setDisponible(?string $disponible): void
    {
        $this->disponible = $disponible;
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
     * @return PersistentCollection
     */
    public function getEmploye(): PersistentCollection
    {
        return $this->employe;
    }

    /**
     * @param PersistentCollection $employe
     */
    public function setEmploye(PersistentCollection $employe): void
    {
        $this->employe = $employe;
    }


}
