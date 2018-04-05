<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoursSport
 *
 * @ORM\Table(name="cours_sport")
 * @ORM\Entity
 */
class CoursSport
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_cours", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCours;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_cours", type="string", length=255, nullable=false)
     */
    private $nomCours;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_cours", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixCours;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_cours", type="time", nullable=false)
     */
    private $heureCours;

    /**
     * @var string
     *
     * @ORM\Column(name="jours", type="string", length=500, nullable=false)
     */
    private $jours;

    /**
     * @var \Coach
     *
     * @ORM\ManyToOne(targetEntity="Coach")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_coach_cours", referencedColumnName="id_coach")
     * })
     */
    private $idCoachCours;

    /**
     * @var \SalleDeSport
     *
     * @ORM\ManyToOne(targetEntity="SalleDeSport")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_salle_cours", referencedColumnName="id_salle")
     * })
     */
    private $idSalleCours;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="UserBundle\Entity\User", inversedBy="idCoursUser")
     * @ORM\JoinTable(name="cours_user",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_cours_user", referencedColumnName="id_cours")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_user_cours", referencedColumnName="id")
     *   }
     * )
     */
    private $idUserCours;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idUserCours = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

