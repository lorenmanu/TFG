<?php
// src/AppBundle/Admin/ProductAdmin.php
namespace tfg\ConocimientoBundle\Admin;
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

class ConocimientoAdmin extends AbstractAdmin
{
   protected function configureFormFields(FormMapper $formMapper){

     $formMapper
         ->add('primerCampo','text')
         ->add('segundoCampo','text')
         ->add('tercerCampo','text')
         ->add('descripcion','text');

}

// Fields to be shown on filter forms
protected function configureDatagridFilters(DatagridMapper $datagridMapper)
{
      $datagridMapper
      ->add('primerCampo')
      ->add('segundoCampo')
      ->add('tercerCampo')
      ->add('descripcion');
}
// Fields to be shown on lists
protected function configureListFields(ListMapper $listMapper)
{
      $listMapper
      ->add('primerCampo')
      ->add('segundoCampo')
      ->add('tercerCampo')
      ->add('descripcion');
    }

}
