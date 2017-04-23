<?php

namespace tfg\OfertaBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Doctrine\Common\Collections\ArrayCollection;
use tfg\ComentarioOfertaBundle\Entity;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use \tfg\ConocimientoBundle\Entity\Conocimiento;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Doctrine\ORM\Mapping as ORM;

/**
 * Oferta
 *
 * @ORM\Table(name="oferta")
 * @ORM\Entity(repositoryClass="tfg\OfertaBundle\Repository\OfertaRepository")
 */

 const SERVER_PATH_TO_IMAGE_FOLDER = '/web/uploads/brochures/oferta';

class Oferta
{
    private $temp;
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
     * @Assert\NotBlank(message = "Introduzca el nombre.")
     * @ORM\Column(name="nombre", type="string", length=255, unique=true)
     */
    private $nombre;

    /**
     * @var string
     * @Assert\Length(
     * min = 2,
     * max = 50,
     * minMessage = "Your first name must be at least {{ limit }} characters long",
     * maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="condiciones", type="text")
     */
    private $condiciones;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="datetime")
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fin", type="datetime")
     */
    private $fechaFin;

    /**
     * @var string
     *
     * @Assert\Email(message = " '{{ value }}'no es un correo.")
     * @ORM\Column(name="contacto", type="string", length=255)
     */
    private $contacto;


    /**
     * @var string
     *
     * @ORM\Column(name="palabras_clave", type="string", length=255)
     */
    private $palabrasClave;

    /**
    * @ORM\ManyToOne(targetEntity="tfg\VisitasOfertaBundle\Entity\VisitasOferta")
    */
    private $visitasOferta;

    /**
    * @ORM\ManyToOne(targetEntity="tfg\SubConocimientoBundle\Entity\SubConocimiento")
    */
    private $subConocimiento;

    /**
     * Get id
     *
     * @return integer
     */

     /**
      * Unmapped property to handle file uploads
      */
     private $brochure;

      /**
        * One Product has Many Features.
        * @ORM\OneToMany(targetEntity="tfg\ComentarioOfertaBundle\Entity\ComentarioOferta", mappedBy="oferta")
      */

      private $comentarios;

      /**
       * @ORM\ManyToOne(targetEntity="tfg\ConocimientoBundle\Entity\Conocimiento", inversedBy="ofertas")
       * @ORM\JoinColumn(name="conocimiento_id", referencedColumnName="id")
       * @ORM\JoinColumn(nullable=false)
       */
      private $conocimiento;

      /**
      * Constructor
      */

      public function __construct()
      {
        $this->comentarios = new ArrayCollection();
        $conocimiento = new Conocimiento();
      }

      public function getComentarios(){
        return $this->comentarios;
      }

      /**
       * Sets brochure.
       *
       * @param UploadedFile $brochure
       */
      public function setBrochure(UploadedFile $brochure=null)
      {
          $this->brochure = $brochure;

          return "uploads/brochures/oferta";
      }

      /**
      * Get file.
      *
      * @return UploadedFile
      */

      public function getBrochure()
      {
          return $this->brochure;
      }

    public function getId()
    {
        return $this->id;
    }



    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Oferta
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
     * Set slug
     *
     * @param string $slug
     * @return Oferta
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Oferta
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
     * Set condiciones
     *
     * @param string $condiciones
     * @return Oferta
     */
    public function setCondiciones($condiciones)
    {
        $this->condiciones = $condiciones;

        return $this;
    }

    /**
     * Get condiciones
     *
     * @return string
     */
    public function getCondiciones()
    {
        return $this->condiciones;
    }

    /**
     * Get primerCampo
     *
     * @return string
     */
    public function getPrimerCampo()
    {
        if( $this->conocimiento && $this->conocimiento->getPrimerCampo()){
          return  $this->conocimiento->getPrimerCampo();
        }
        else{
          return "indefinido";
        }
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     */
    public function setPrimerCampo($primerCampo)
    {
        $this->conocimiento->setPrimerCampo($primerCampo);

    }

    /**
     * Get primerCampo
     *
     * @return string
     */
    public function getSegundoCampo()
    {
        if( $this->conocimiento && $this->conocimiento->getSegundoCampo()){
          return  $this->conocimiento->getSegundoCampo();
        }
        else{
          return "indefinido";
        }
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     */
    public function setSegundoCampo($segundoCampo)
    {
        $this->conocimiento->setSegundoCampo($segundoCampo);

    }

    /**
     * Get primerCampo
     *
     * @return string
     */
    public function getTerceroCampo()
    {
        if( $this->conocimiento && $this->conocimiento->getTerceroCampo()){
          return  $this->conocimiento->getTerceroCampo();
        }
        else{
          return "indefinido";
        }
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     */
    public function setTerceroCampo($TerceroCampo)
    {
        $this->conocimiento->setTerceroCampo($TerceroCampo);

    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     * @return Oferta
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     * @return Oferta
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set contacto
     *
     * @param string $contacto
     * @return Oferta
     */
    public function setContacto($contacto)
    {
        $this->contacto = $contacto;

        return $this;
    }

    /**
     * Get contacto
     *
     * @return string
     */
    public function getContacto()
    {
        return $this->contacto;
    }

    /**
     * Set palabrasClave
     *
     * @param string $palabrasClave
     * @return Oferta
     */
    public function setPalabrasClave($palabrasClave)
    {
        $this->palabrasClave = $palabrasClave;

        return $this;
    }

    /**
     * Get palabrasClave
     *
     * @return string
     */
    public function getPalabrasClave()
    {
        return $this->palabrasClave;
    }

    /**
     * Set visitasOferta
     *
     * @param integer $visitasOferta
     * @return Oferta
     */
    public function setVisitasOferta($visitasOferta)
    {
        $this->visitasOferta = $visitasOferta;

        return $this;
    }

    /**
     * Get visitasOferta
     *
     * @return integer
     */
    public function getVisitasOferta()
    {
        return $this->visitasOferta;
    }

    /**
     * Set subConocimiento
     *
     * @param \tfg\SubConocimientoBundle\Entity\SubConocimiento $subConocimiento
     * @return Oferta
     */
    public function setSubConocimiento(\tfg\SubConocimientoBundle\Entity\SubConocimiento $subConocimiento = null)
    {
        $this->subConocimiento = $subConocimiento;

        return $this;
    }

    /**
     * Get subConocimiento
     *
     * @return \tfg\SubConocimientoBundle\Entity\SubConocimiento
     */
    public function getSubConocimiento()
    {
        return $this->subConocimiento;
    }


    protected function getUploadRootDir()
    {
        // el directorio absoluto donde se guardan los documentos
        return __DIR__.'/home/lorenmanu/Escritorio/TFG/web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // Eliminamos el __DIR__ para evitar errores al mostrar en view
        return 'uploads/documents';
    }



/**
 * @ORM\PreRemove()
 */
public function storeFilenameForRemove()
{
    $this->temp = $this->getAbsolutePath();
}

/**
 * @ORM\PostRemove()
 */
public function removeUpload()
{
    if (isset($this->temp)) {
        unlink($this->temp);
    }
}



    /**
     * Add comentarios
     *
     * @param \tfg\ComentarioOfertaBundle\Entity\ComentarioOferta $comentarios
     * @return Oferta
     */
    public function addComentario(\tfg\ComentarioOfertaBundle\Entity\ComentarioOferta $comentarios)
    {
        $this->comentarios[] = $comentarios;

        return $this;
    }

    /**
     * Remove comentarios
     *
     * @param \tfg\ComentarioOfertaBundle\Entity\ComentarioOferta $comentarios
     */
    public function removeComentario(\tfg\ComentarioOfertaBundle\Entity\ComentarioOferta $comentarios)
    {
        $this->comentarios->removeElement($comentarios);
    }

    /**
     * Manages the copying of the Brochure to the relevant place on the server
     */
    public function upload()
    {
        // the Brochure property can be empty if the field is not required
        if (null === $this->getBrochure()) {
            return;
        }

        // we use the original Brochure name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and target Brochurename as params
        $this->getBrochure()->move(
            self::SERVER_PATH_TO_IMAGE_FOLDER,
            $this->getBrochure()->getClientOriginalName()
        );

        // set the path property to the Brochurename where you've saved the Brochure
        $this->filename = $this->getBrochure()->getClientOriginalName();

        // clean up the Brochure property as you won't need it anymore
        $this->setBrochure(null);
    }

    /**
     * Lifecycle callback to upload the Brochure to the server
     */
    public function lifecycleFileUpload()
    {
        $this->upload();
    }

    /**
     * Updates the hash value to force the preUpdate and postUpdate events to fire
     */
    public function refreshUpdated()
    {
        //$this->setUpdated(new \DateTime());
    }

    // ... the rest of your class lives under here, including the generated fields
    //     such as filename and updated

    /**
     * Set conocimiento
     *
     * @param \tfg\ConocimientoBundle\Entity\Conocimiento $conocimiento
     * @return Oferta
     */
    public function setConocimiento(\tfg\ConocimientoBundle\Entity\Conocimiento $conocimiento = null)
    {
        $this->conocimiento = $conocimiento;

        return $this;
    }

    /**
     * Get conocimiento
     *
     * @return \tfg\ConocimientoBundle\Entity\Conocimiento
     */
    public function getConocimiento()
    {
        return $this->conocimiento;
    }


}
