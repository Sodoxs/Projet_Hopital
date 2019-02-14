<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;

/**
 * Employe
 *
 * @ORM\Table(name="EMPLOYE", uniqueConstraints={@ORM\UniqueConstraint(name="username", columns={"username"})}, indexes={@ORM\Index(name="fkEmployeDisponible", columns={"iddisponible"})})
 * @ORM\Entity
 */
class Employe
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
     * @ORM\Column(name="username", type="string", length=30, nullable=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="nomemploye", type="string", length=30, nullable=false)
     */
    private $nomemploye;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomemploye", type="string", length=30, nullable=false)
     */
    private $prenomemploye;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=64, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="roles", type="string", length=64)
     */
    private $roles;

    /**
     * @var \Disponible
     *
     * @ORM\ManyToOne(targetEntity="Disponible")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iddisponible", referencedColumnName="id")
     * })
     */
    private $iddisponible;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Infection", mappedBy="idemploye")
     */
    private $idinfection;

    /**
     * @var Gerer
     * @ORM\ManyToOne(targetEntity="Gerer", inversedBy="employes")
     */
    private $gerer;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idinfection = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idtraitement = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
