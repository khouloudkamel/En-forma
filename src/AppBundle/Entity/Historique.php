<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Historique
 *
 * @ORM\Table(name="historique", indexes={@ORM\Index(name="id_user_histo", columns={"id_user_histo"})})
 * @ORM\Entity
 */
class Historique
{
    /**
     * @var string
     *
     * @ORM\Column(name="type_event", type="string", length=255, nullable=false)
     */
    private $typeEvent;

    /**
     * @var \UserBundle\Entity\User
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user_histo", referencedColumnName="id")
     * })
     */
    private $idUserHisto;


}

