<?php
// src/AppBundle/Admin/ProductAdmin.php
namespace tfg\AreaBundle\Admin;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tfg\AreaBundle\Entity\Area;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AreaAdmin extends AbstractAdmin
{
   protected function configureFormFields(FormMapper $formMapper){

     $formMapper
         ->add('nombre','text')
         ->add('descripcion','text')
         ->add('ramas', 'entity', array(
                        // query choices from this entity
                        'class' => 'RamaBundle:Rama',

                        // use the User.username property as the visible option string
                        'choice_label' => 'nombre',

                        // used to render a select box, check boxes or radios
                        'multiple' => true,
                        // 'multiple' => true,
                        // 'expanded' => true,
                      ));

}

// Fields to be shown on filter forms
protected function configureDatagridFilters(DatagridMapper $datagridMapper)
{
      $datagridMapper
      ->add('nombre')
      ->add('descripcion')
      ->add('ramas', 'doctrine_orm_string', array('template' => 'OfertaBundle:Default:list_image.html.twig'));
}
// Fields to be shown on lists
protected function configureListFields(ListMapper $listMapper)
{
      $listMapper
      ->add('nombre')
      ->add('descripcion')
      ->add('ramas', 'doctrine_orm_string', array('template' => 'OfertaBundle:Default:list_image.html.twig'));
    }

    public function prePersist($image)
  {
  }

  public function preUpdate($image)
  {

  }

  private function manageFileUpload($image)
  {
  }
}
