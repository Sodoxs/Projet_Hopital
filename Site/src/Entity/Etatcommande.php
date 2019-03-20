<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etatcommande
 *
 * @ORM\Table(name="ETATCOMMANDE", uniqueConstraints={@ORM\UniqueConstraint(name="etat", columns={"etat"})})
 * @ORM\Entity
 */
class Etatcommande
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
     * @ORM\Column(name="etat", type="string", length=15, nullable=true)
     */
    private $etat;

    /**
     * @return string|null
     */
    public function getEtat(): ?string
    {
        return $this->etat;
    }

    /**
     * @param string|null $etat
     */
    public function setEtat(?string $etat): void
    {
        $this->etat = $etat;
    }


}
