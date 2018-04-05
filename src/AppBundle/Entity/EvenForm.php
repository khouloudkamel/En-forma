<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EvenForm
 *
 * @ORM\Table(name="even_form")
 * @ORM\Entity
 */
class EvenForm
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_event", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_event", type="string", length=255, nullable=false)
     */
    private $nomEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="genre_event", type="string", length=255, nullable=false)
     */
    private $genreEvent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_deb_event", type="date", nullable=false)
     */
    private $dateDebEvent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin_event", type="date", nullable=false)
     */
    private $dateFinEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_event", type="string", length=255, nullable=false)
     */
    private $lieuEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="path_event", type="string", length=255, nullable=true)
     */
    private $pathEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="etat_event", type="string", length=255, nullable=false)
     */
    private $etatEvent;



    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="UserBundle\Entity\User", inversedBy="idEventUser")
     * @ORM\JoinTable(name="event_user",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_event_user", referencedColumnName="id_event")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_user_event", referencedColumnName="id")
     *   }
     * )
     */
    private $idUserEvent;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idUserEvent = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

