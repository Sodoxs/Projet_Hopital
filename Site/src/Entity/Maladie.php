<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Maladie
 *
 * @ORM\Table(name="MALADIE", uniqueConstraints={@ORM\UniqueConstraint(name="nommaladie", columns={"nommaladie"})})
 * @ORM\Entity
 */
class Maladie
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
     * @ORM\Column(name="nommaladie", type="string", length=64, nullable=true)
     */
    private $nommaladie;


}
