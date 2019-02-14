<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lit
 *
 * @ORM\Table(name="LIT")
 * @ORM\Entity
 */
class Lit
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
     * @var int|null
     *
     * @ORM\Column(name="numbloc", type="integer", nullable=true)
     */
    private $numbloc;

    /**
     * @var int
     *
     * @ORM\Column(name="numchambre", type="integer", nullable=false)
     */
    private $numchambre;

    /**
     * @var int
     *
     * @ORM\Column(name="numetage", type="integer", nullable=false)
     */
    private $numetage;

    /**
     * @var string
     *
     * @ORM\Column(name="nomaile", type="string", length=10, nullable=false)
     */
    private $nomaile;


}
