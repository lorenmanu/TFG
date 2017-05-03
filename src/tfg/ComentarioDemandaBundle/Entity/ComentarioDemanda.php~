<?php

namespace tfg\ComentarioDemandaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ComentarioDemanda
 *
 * @ORM\Table(name="comentario_demanda")
 * @ORM\Entity(repositoryClass="tfg\ComentarioDemandaBundle\Repository\ComentarioDemandaRepository")
 */
class ComentarioDemanda
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
    * @ORM\ManyToOne(targetEntity="tfg\DemandaBundle\Entity\Demanda")
    */
    private $demanda;

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
     * @return ComentarioDemanda
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
     * @return ComentarioDemanda
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
     * Set demanda
     *
     * @param string $demanda
     * @return ComentarioDemanda
     */
    public function setDemanda($demanda)
    {
        $this->demanda = $demanda;

        return $this;
    }

    /**
     * Get demanda
     *
     * @return string
     */
    public function getDemanda()
    {
        return $this->demanda;
    }
}
