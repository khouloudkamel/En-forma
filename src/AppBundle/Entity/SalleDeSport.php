<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SalleDeSport
 *
 * @ORM\Table(name="salle_de_sport")
 *
 * @ORM\Entity
 */
class SalleDeSport
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_salle", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSalle;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_salle", type="string", length=255, nullable=false)
     */
    private $nomSalle;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_tel_salle", type="integer", nullable=false)
     */
    private $numTelSalle;

    /**
     * @var string
     *
     * @ORM\Column(name="email_salle", type="string", length=255, nullable=false)
     */
    private $emailSalle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horaire_ouverture_salle", type="time", nullable=false)
     */
    private $horaireOuvertureSalle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horaire_fermeture_salle", type="time", nullable=false)
     */
    private $horaireFermetureSalle;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=1000, nullable=true)
     */
    private $path;



  /**
     * @var string
     *
     * @ORM\Column(name="adr_salle", type="string", length=255, nullable=false)
     */
    private $adresseSalle;
    function getIdSalle() {
        return $this->idSalle;
    }

    function getNomSalle() {
        return $this->nomSalle;
    }

    function getNumTelSalle() {
        return $this->numTelSalle;
    }

    function getEmailSalle() {
        return $this->emailSalle;
    }

    function getHoraireOuvertureSalle() {
        return $this->horaireOuvertureSalle;
    }

    function getHoraireFermetureSalle() {
        return $this->horaireFermetureSalle;
    }

    function getPath() {
        return $this->path;
    }

    function getAdresseSalle() {
        return $this->adresseSalle;
    }

    function setIdSalle($idSalle) {
        $this->idSalle = $idSalle;
    }

    function setNomSalle($nomSalle) {
        $this->nomSalle = $nomSalle;
    }

    function setNumTelSalle($numTelSalle) {
        $this->numTelSalle = $numTelSalle;
    }

    function setEmailSalle($emailSalle) {
        $this->emailSalle = $emailSalle;
    }

    function setHoraireOuvertureSalle(\DateTime $horaireOuvertureSalle) {
        $this->horaireOuvertureSalle = $horaireOuvertureSalle;
    }

    function setHoraireFermetureSalle(\DateTime $horaireFermetureSalle) {
        $this->horaireFermetureSalle = $horaireFermetureSalle;
    }

    function setPath($path) {
        $this->path = $path;
    }

    function setAdresseSalle($adresseSalle) {
        $this->adresseSalle = $adresseSalle;
    }



}

