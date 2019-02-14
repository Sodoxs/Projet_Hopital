<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Employe
 *
 * @ORM\Table(name="EMPLOYE", uniqueConstraints={@ORM\UniqueConstraint(name="username", columns={"username"})}, indexes={@ORM\Index(name="fkEmployeDisponible", columns={"iddisponible"})})
 * @ORM\Entity
 */
class Employe implements UserInterface
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

    /**
     * Returns the roles granted to the user.
     *
     *     public function getRoles()
     *     {
     *         return ['ROLE_USER'];
     *     }
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return [$this->roles];
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        return null;
    }
}
