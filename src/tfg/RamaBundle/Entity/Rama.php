<?php

namespace tfg\RamaBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\Response;
use tfg\DisciplinaBundle\Entity\Disciplina;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinColumn;


use Doctrine\ORM\Mapping as ORM;

/**
 * Rama
 *
 * @ORM\Table(name="rama")
 * @ORM\Entity(repositoryClass="tfg\RamaaBundle\Repository\RamaRepository")
 */
class Rama
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
     * @ManyToMany(targetEntity="tfg\AreaBundle\Entity\Area", inversedBy="disciplina")
     * @JoinColumn(name="id_rama", referencedColumnName="id")
     */
    private $area;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection|Disciplinas[]
     *
     * @ManyToMany(targetEntity="tfg\DisciplinaBundle\Entity\Disciplina", inversedBy="ramas", fetch="EXTRA_LAZY")
     * @JoinTable(
     *  name="disciplina_ramas",
     *  joinColumns={
     *      @ORM\JoinColumn(name="rama_id", referencedColumnName="id")
     *  },
     *  inverseJoinColumns={
     *      @ORM\JoinColumn(name="rama_id", referencedColumnName="id")
     *  }
     * )
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

    public function setId($id){
      $this->id=$id;
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
     * Add disciplina
     *
     * @param \tfg\DisciplinasBundle\Entity\Disciplina $disciplina
     * @return $rama
     */
    public function addDisciplina($disciplina)
    {   //dump(($this));
        $this->disciplinas[] = $disciplina;
        //dump(($rama));
        //die();
        return $this;
    }

    public function setDisciplinas(ArrayCollection $disciplinas)
    {
        $this->disciplinas = $disciplinas;
        //dump(($rama));
        //die();
        return $this;
    }

    /**
     * Remove disciplina
     *
     * @param \tfg\DisciplinaBundle\Entity\Disciplina $disciplina
     */
    public function removeComentario(\tfg\DisciplinaBundle\Entity\Disciplina $disciplina)
    {
      $this->disciplinas->removeElement($disciplina);
    }

    public function getDisciplinas(){
      return $this->disciplinas;
    }

}
