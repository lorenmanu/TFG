<?php

namespace tfg\ConocimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conocimiento
 *
 * @ORM\Table(name="conocimiento")
 * @ORM\Entity(repositoryClass="tfg\ConocimientoBundle\Repository\ConocimientoRepository")
 */
class Conocimiento
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="primerCampo", type="string", length=255)
     */
    private $primerCampo;

    /**
     * @var string
     *
     * @ORM\Column(name="segundoCampo", type="string", length=255)
     */
    private $segundoCampo;

    /**
     * @var string
     *
     * @ORM\Column(name="tercerCampo", type="string", length=255)
     */
    private $tercerCampo;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
      * One Product has Many Features.
      * @ORM\OneToMany(targetEntity="tfg\OfertaBundle\Entity\Oferta", mappedBy="conocimiento")
    */

    private $ofertas;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Conocimiento
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set primerCampo
     *
     * @param string $primerCampo
     * @return Conocimiento
     */
    public function setPrimerCampo($primerCampo)
    {
        $this->primerCampo = $primerCampo;

        return $this;
    }

    /**
     * Get primerCampo
     *
     * @return string
     */
    public function getPrimerCampo()
    {
        return $this->primerCampo;
    }

    /**
     * Set segundoCampo
     *
     * @param string $segundoCampo
     * @return Conocimiento
     */
    public function setSegundoCampo($segundoCampo)
    {
        $this->segundoCampo = $segundoCampo;

        return $this;
    }

    /**
     * Get segundoCampo
     *
     * @return string
     */
    public function getSegundoCampo()
    {
        return $this->segundoCampo;
    }

    /**
     * Set tercerCampo
     *
     * @param string $tercerCampo
     * @return Conocimiento
     */
    public function setTercerCampo($tercerCampo)
    {
        $this->tercerCampo = $tercerCampo;

        return $this;
    }

    /**
     * Get tercerCampo
     *
     * @return string
     */
    public function getTercerCampo()
    {
        return $this->tercerCampo;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->primerCampo = "Primer Nivel";
        $this->segundoCampo = "Segundo Nivel";
        $this->tercerCampo = "Tercer Nivel";
        $this->ofertas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add ofertas
     *
     * @param \tfg\OfertaBundle\Entity\Oferta $ofertas
     * @return Conocimiento
     */
    public function addOferta(\tfg\OfertaBundle\Entity\Oferta $ofertas)
    {
        $this->ofertas[] = $ofertas;

        return $this;
    }

    /**
     * Remove ofertas
     *
     * @param \tfg\OfertaBundle\Entity\Oferta $ofertas
     */
    public function removeOferta(\tfg\OfertaBundle\Entity\Oferta $ofertas)
    {
        $this->ofertas->removeElement($ofertas);
    }

    /**
     * Get ofertas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOfertas()
    {
        return $this->ofertas;
    }

    public function __toString() {
      return $this->primerCampo;
    }

}
