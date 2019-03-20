<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Disponible
 *
 * @ORM\Table(name="DISPONIBLE", uniqueConstraints={@ORM\UniqueConstraint(name="disponible", columns={"disponible"})})
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


}
