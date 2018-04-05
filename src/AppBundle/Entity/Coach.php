<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Coach
 *
 * @ORM\Table(name="coach", indexes={@ORM\Index(name="id_coach_salle", columns={"id_coach_salle"})})
 * @ORM\Entity
 */
class Coach
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_coach", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCoach;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_coach", type="string", length=255, nullable=false)
     */
    private $nomCoach;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_coach", type="string", length=255, nullable=false)
     */
    private $prenomCoach;

    /**
     * @var string
     *
     * @ORM\Column(name="job_coach", type="string", length=255, nullable=false)
     */
    private $jobCoach;

    /**
     * @var string
     *
     * @ORM\Column(name="path_coach", type="string", length=255, nullable=true)
     */
    private $pathCoach;

    /**
     * @var \SalleDeSport
     *
     * @ORM\ManyToOne(targetEntity="SalleDeSport")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_coach_salle", referencedColumnName="id_salle")
     * })
     */
    private $idCoachSalle;


}

