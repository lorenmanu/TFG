<?php

namespace tfg\SubConocimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SubConocimiento
 *
 * @ORM\Table(name="sub_conocimiento")
 * @ORM\Entity(repositoryClass="tfg\SubConocimientoBundle\Repository\SubConocimientoRepository")
 */
class SubConocimiento
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
     * @ORM\Column(name="nombre", type="string", length=255, unique=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", length=255, unique=false)
     */
    private $descripcion;

    /**
    * @ORM\ManyToOne(targetEntity="tfg\ConocimientoBundle\Entity\Conocimiento")
    */
    private $Conocimiento;

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
     * Set nombre
     *
     * @param string $nombre
     * @return SubConocimiento
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return SubConocimiento
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
     * Set Conocimiento
     *
     * @param \tfg\ConocimientoBundle\Entity\Conocimiento $conocimiento
     * @return SubConocimiento
     */
    public function setConocimiento(\tfg\ConocimientoBundle\Entity\Conocimiento $conocimiento = null)
    {
        $this->Conocimiento = $conocimiento;

        return $this;
    }

    /**
     * Get Conocimiento
     *
     * @return \tfg\ConocimientoBundle\Entity\Conocimiento 
     */
    public function getConocimiento()
    {
        return $this->Conocimiento;
    }
}
