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
     * @ORM\OneToMany(targetEntity="Gerer", mappedBy="gerer")
     */
    private $employes;

    /**
     * @var PersistentCollection
     *
     * @ORM\OneToMany(targetEntity="Traitement", mappedBy="gerer")
     */
    private $traitements;
}
