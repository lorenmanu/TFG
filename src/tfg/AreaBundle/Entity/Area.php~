<?php
namespace tfg\AreaBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping as ORM;

/**
 * Area
 */
class Area
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
      * One Product has Many Features.
      * @ORM\OneToMany(targetEntity="tfg\RamaBundle\Entity\Rama", mappedBy="area",cascade={"persist"})
    */

    private $ramas;


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
     * @return Area
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
     * @return Area
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

    public function __construct()
    {
      $this->ramas = new ArrayCollection();
      /*
      $conocimiento = new Conocimiento();
      */
    }

    public function getRamas(){
      return $this->ramas;
    }

    /**
     * Add ramass
     *
     * @param \tfg\RamaBundle\Entity\Rama $ramas
     * @return Area
     */
    public function addRamas(\tfg\RamaBundle\Entity\Rama $ramas)
    {
        $this->ramas[] = $ramas;

        return $this;
    }
    /**
     * Add ramass
     *
     * @param \tfg\RamaBundle\Entity\Rama $ramas
     * @return Area
     */
    public function addRama(\tfg\RamaBundle\Entity\Rama $ramas)
    {
        $this->ramas->add($ramas);
        $ramas->setArea($this);

        return $this;
    }

    public function getNumeroRamas(){

      return count($this->getRamas());
    }

    /**
     * Remove Ramas
     *
     * @param \tfg\RamaOfertaBundle\Entity\Rama $ramas
     */
    public function removeRama(\tfg\RamaOfertaBundle\Entity\Rama $ramas)
    {
        $this->ramass->removeElement($comentarios);
    }
    public function __toString(){
      return (string) "hola4";
    }

    public function getEnlazadas(){
      return "ramaxx";
    }
}
