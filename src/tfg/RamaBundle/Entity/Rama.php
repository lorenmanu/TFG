<?php

namespace tfg\RamaBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\Response;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rama
 */
class Rama
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
     * @ORM\ManyToOne(targetEntity="tfg\AreaBundle\Entity\Area", inversedBy="ramas")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $area;

    /**
      * One Product has Many Features.
      * @ORM\OneToMany(targetEntity="tfg\DisciplinaBundle\Entity\Disciplina", mappedBy="rama", cascade={"all"}, orphanRemoval=true)
    */

    private $disciplinas;



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
     * @return Rama
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
     * @return Rama
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
     * Set area
     *
     * @param string $area
     * @return Rama
     */
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }

    public function __construct()
    {
      $this->disciplinas = new ArrayCollection();
      /*
      $conocimiento = new Conocimiento();
      */
    }

    /**
     * Get area
     *
     * @return string
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Add disciplinas
     *
     * @param \tfg\DisciplinaBundle\Entity\Disciplina $disciplinas
     * @return Rama
     */
    public function addDisciplina($disciplinas)
    {

        foreach ($disciplinas->toArray() as $disciplina) {
            $disciplina->setRama($this);
            //var_dump($disciplina);exit;
        }

        $this->disciplinas[]= $disciplinas;

        return $this;
    }

    /**
     * Remove Disciplinas
     *
     * @param \tfg\RamaOfertaBundle\Entity\Rama $ramas
     */
    public function removeDisciplina(\tfg\DisciplinaBundle\Entity\Disciplina $disciplinas)
    {
        $this->diciplinas->removeElement($disciplinas);
    }

    public function getDisciplinas(){
      return $this->disciplinas;
    }

    /**
     * Get area
     *
     * @return string
     */

    public function __toString(){
      return(string)  $this->getNombre();
   }

   public function getNumeroDisciplinas(){

     return count($this->getDisciplinas());
   }

   public function setDisciplinas(ArrayCollection $disciplinas){
     $this->disciplinas=$disciplinas;
   }
}
