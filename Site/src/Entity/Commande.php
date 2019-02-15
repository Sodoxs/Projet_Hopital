<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="COMMANDE", indexes={@ORM\Index(name="fkCommandeEtatCommande", columns={"idetat"}), @ORM\Index(name="fkMedicamentCommande", columns={"idmedicament"})})
 * @ORM\Entity
 */
class Commande
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
     * @var \DateTime
     *
     * @ORM\Column(name="datecommande", type="date", nullable=false)
     */
    private $datecommande;

    /**
     * @var int
     *
     * @ORM\Column(name="quantitecommande", type="integer", nullable=false)
     */
    private $quantitecommande;

    /**
     * @var \Etatcommande
     *
     * @ORM\ManyToOne(targetEntity="Etatcommande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idetat", referencedColumnName="id")
     * })
     */
    private $idetat;

    /**
     * @var \Medicament
     *
     * @ORM\ManyToOne(targetEntity="Medicament")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idmedicament", referencedColumnName="id")
     * })
     */
    private $idmedicament;

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
     * @return \DateTime
     */
    public function getDatecommande(): \DateTime
    {
        return $this->datecommande;
    }

    /**
     * @param \DateTime $datecommande
     */
    public function setDatecommande(\DateTime $datecommande): void
    {
        $this->datecommande = $datecommande;
    }

    /**
     * @return int
     */
    public function getQuantitecommande(): int
    {
        return $this->quantitecommande;
    }

    /**
     * @param int $quantitecommande
     */
    public function setQuantitecommande(int $quantitecommande): void
    {
        $this->quantitecommande = $quantitecommande;
    }

    /**
     * @return \Etatcommande
     */
    public function getIdetat(): \Etatcommande
    {
        return $this->idetat;
    }

    /**
     * @param \Etatcommande $idetat
     */
    public function setIdetat(\Etatcommande $idetat): void
    {
        $this->idetat = $idetat;
    }

    /**
     * @return \Medicament
     */
    public function getIdmedicament(): \Medicament
    {
        return $this->idmedicament;
    }

    /**
     * @param \Medicament $idmedicament
     */
    public function setIdmedicament(\Medicament $idmedicament): void
    {
        $this->idmedicament = $idmedicament;
    }


}
