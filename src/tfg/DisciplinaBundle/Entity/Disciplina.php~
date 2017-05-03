<?php

namespace tfg\DisciplinaBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use tfg\RamaBundle\Entity\Rama;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\ManyToMany;

use Doctrine\ORM\Mapping as ORM;

/**
 * Disciplina
 *
 * @ORM\Table(name="disciplina")
 * @ORM\Entity(repositoryClass="tfg\DisciplinaBundle\Repository\DisciplinaRepository")
 */
class Disciplina
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
     */
    private $nombre;

    /**
     * @var string
     */
    private $descripcion;


    /**
     * @var \Doctrine\Common\Collections\Collection|User[]
     *
     * @ManyToMany(targetEntity="tfg\RamaBundle\Entity\Rama", mappedBy="rama",fetch="EXTRA_LAZY")
     */
    private $ramas;

    public function __toString(){
      return(string)  $this->getNombre();
   }

   public function getObj(){
     return $this;
   }

   public function setRamas($ramas){
     $this->ramas = $rama;
   }

   public function getRamas(){
     return $this->rama;
   }

   public function addRama($rama){
     $this->ramas[]=$rama;
     return $this->ramas;
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

    public function getDisciplina(){
      return $this;
    }

    public function __construct()
    {
      $this->ramas = new ArrayCollection();
      /*
      $conocimiento = new Conocimiento();
      */
    }
}
