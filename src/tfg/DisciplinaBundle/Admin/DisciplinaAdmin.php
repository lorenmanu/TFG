<?php
// src/AppBundle/Admin/ProductAdmin.php
namespace tfg\DisciplinaBundle\Admin;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tfg\DisciplinaBundle\Entity\Disciplina;
use tfg\RamaBundle\Entity\Rama;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class DisciplinaAdmin extends AbstractAdmin
{
   protected function configureFormFields(FormMapper $formMapper){

     $formMapper
         ->add('nombre','text')
         ->add('descripcion','text');

}

// Fields to be shown on filter forms
protected function configureDatagridFilters(DatagridMapper $datagridMapper)
{
      $datagridMapper
      ->add('nombre')
      ->add('descripcion')
      ->add('rama.nombre');
}
// Fields to be shown on lists
protected function configureListFields(ListMapper $listMapper)
{
      $listMapper
      ->add('nombre')
      ->add('descripcion')
      ->add('rama.nombre');
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
