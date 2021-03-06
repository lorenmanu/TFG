<?php

namespace tfg\ComentarioOfertaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ComentarioOferta
 *
 * @ORM\Table(name="comentario_oferta")
 * @ORM\Entity(repositoryClass="tfg\ComentarioOfertaBundle\Repository\ComentarioOfertaRepository")
 */
class ComentarioOferta
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @ORM\ManyToOne(targetEntity="tfg\OfertaBundle\Entity\Oferta", inversedBy="comentarios")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $oferta;

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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return ComentarioOferta
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return ComentarioOferta
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
     * Set oferta
     *
     * @param string $oferta
     * @return ComentarioOferta
     */
    public function setOferta($oferta)
    {
        $this->oferta = $oferta;

        return $this;
    }

    public function __construct()
    {
    }

    /**
     * Get oferta
     *
     * @return string
     */
    public function getOferta()
    {
        return $this->oferta;
    }
}
