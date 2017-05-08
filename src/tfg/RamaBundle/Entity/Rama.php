<?php

namespace tfg\RamaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rama
 *
 * @ORM\Table(name="Rama")
 * @ORM\Entity
 */
class Rama
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Tfg\DisciplinaBundle\Entity\Disciplina", inversedBy="ramas")
     * @ORM\JoinTable(name="rama_disciplina",
     *   joinColumns={
     *     @ORM\JoinColumn(name="rama_id", referencedColumnName="id", onDelete="CASCADE")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="disciplina_id", referencedColumnName="id", onDelete="CASCADE")
     *   }
     * )
     */
    private $disciplinas;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->disciplinas = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add disciplina
     *
     * @param \Tfg\DisciplinaBundle\Entity\Disciplina $disciplina
     *
     * @return Rama
     */
    public function addDisciplina(\Tfg\DisciplinaBundle\Entity\Disciplina $disciplina)
    {
        $this->disciplinas[] = $disciplina;

        return $this;
    }

    /**
     * Remove disciplina
     *
     * @param \Tfg\DisciplinaBundle\Entity\Disciplina $disciplina
     */
    public function removeDisciplina(\Tfg\DisciplinaBundle\Entity\Disciplina $disciplina)
    {
        $this->disciplinas->removeElement($disciplina);
    }

    /**
     * Get disciplinas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDisciplinas()
    {
        return $this->disciplinas;
    }
}
