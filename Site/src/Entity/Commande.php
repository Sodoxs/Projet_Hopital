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


}
