<?php

namespace tfg\DisciplinaBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping as ORM;

/**
 * Disciplina
 */
class Disciplina
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @ORM\ManyToOne(targetEntity="tfg\RamaBundle\Entity\Rama", inversedBy="disciplinas",cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="rama_id", referencedColumnName="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $rama;

    public function __toString(){
      return(string)  $this->getNombre();
   }

   public function getObj(){
     return $this;
   }


    /**
     * Set rama
     *
     * @param string $area
     * @return Rama
     */
    public function setRama($rama)
    {
        $this->rama = $rama;

        return $this;
    }


    /**
     * Get rama
     *
     * @return string
     */
    public function getRama()
    {
        return $this->rama;
    }

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
     * @return Disciplina
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
     * @return Disciplina
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
}
