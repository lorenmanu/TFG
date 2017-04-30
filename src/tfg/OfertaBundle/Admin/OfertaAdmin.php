<?php
// src/AppBundle/Admin/ProductAdmin.php
namespace tfg\OfertaBundle\Admin;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tfg\OfertaBundle\Entity\Oferta;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Tools\Pagination\Paginator;

class OfertaAdmin extends AbstractAdmin
{
   protected function configureFormFields(FormMapper $formMapper){

     if($this->hasParentFieldDescription()) { // this Admin is embedded
         // $getter will be something like 'getlogoImage'
         $getter = 'get' . $this->getParentFieldDescription()->getFieldName();

         // get hold of the parent object
         $parent = $this->getParentFieldDescription()->getAdmin()->getSubject();
         if ($parent) {
             $image = $parent->$getter();
         } else {
             $image = null;
         }
     } else {
         $image = $this->getSubject();
     }

     // use $fileFieldOptions so we can add other options to the field
     $fileFieldOptions = array('required' => false);
     if ($image && ($webPath = $image->getBrochure())) {
         // add a 'help' option containing the preview's img tag
         $fileFieldOptions['help'] = '<img src="'.$webPath.'" class="admin-preview" />';
     }

     $formMapper
         ->add('nombre','text')
         ->add('slug')
         ->add('descripcion','text')
         ->add('condiciones','text')
         ->add('fechaInicio','datetime')
	       ->add('fechaFin','datetime')
	       ->add('palabrasClave','text')
         ->add('brochure', 'file')
	       ->add('contacto');

}

// Fields to be shown on filter forms
protected function configureDatagridFilters(DatagridMapper $datagridMapper)
{
      $datagridMapper
      ->add('id')
      ->add('nombre')
      ->add('slug')
      ->add('descripcion')
      ->add('condiciones')
      ->add('fechaInicio')
      ->add('fechaFin')
      ->add('palabrasClave')
      //->add('comentarios')
      ->add('brochure', 'doctrine_orm_string', array('template' => 'OfertaBundle:Default:list_image.html.twig'))
      ->add('contacto');
}
// Fields to be shown on lists
protected function configureListFields(ListMapper $listMapper)
{
      $listMapper
      ->add('id')
      ->add('nombre')
      ->add('slug')
      ->add('descripcion')
      ->add('condiciones')
      ->add('fechaInicio')
      ->add('fechaFin')
      ->add('palabrasClave')
      ->add('comentarios')
      ->add('brochure', 'doctrine_orm_string', array('template' => 'OfertaBundle:Default:list_image.html.twig'))
      ->add('contacto');
    }

    public function prePersist($image)
  {        // $file stores the uploaded PDF file
          /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
          $file = $image->getBrochure();

          // Generate a unique name for the file before saving it
          $fileName = md5(uniqid()).'.'.$file->guessExtension();

          // Move the file to the directory where brochures are stored
          $file->move(
              "uploads/brochures/oferta",
              $fileName
          );


          // Update the 'brochure' property to store the PDF file name
          // instead of its contents
      $this->manageFileUpload($image->getBrochure());
  }

  public function preUpdate($image)
  {
      $this->manageFileUpload($image->getBrochure());
  }

  private function manageFileUpload($image)
  {
  }
}
