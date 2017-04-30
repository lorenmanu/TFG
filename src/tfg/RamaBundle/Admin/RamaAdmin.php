<?php
// src/AppBundle/Admin/ProductAdmin.php
namespace tfg\RamaBundle\Admin;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tfg\RamaBundle\Entity\Rama;
use tfg\RamaBundle\Entity\Area;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class RamaAdmin extends AbstractAdmin
{
   protected function configureFormFields(FormMapper $formMapper){

     $formMapper
         ->add('nombre','text')
         ->add('descripcion','text')
         ->add('disciplinas', 'sonata_type_model', array('class' => 'DisciplinaBundle:Disciplina','multiple' => true,
                                                    'by_reference' => true));

}

// Fields to be shown on filter forms
protected function configureDatagridFilters(DatagridMapper $datagridMapper)
{
      $datagridMapper
      ->add('nombre')
      ->add('descripcion')
      ->add('disciplinas', 'doctrine_orm_string', array('template' => 'DisciplinaBundle:Default:index.html.twig'));
}
// Fields to be shown on lists
protected function configureListFields(ListMapper $listMapper)
{
      $listMapper
      ->add('nombre')
      ->add('descripcion')
      ->add('disciplinas', 'doctrine_orm_string', array('template' => 'DisciplinaBundle:Default:index.html.twig'));
    }

    public function prePersist($image){
      /*
      $uniqid = $this->getRequest()->query->get('uniqid');
      $formData = $this->getRequest()->request->get($uniqid);
      var_dump(count($image->getNumeroDisciplinas()));exit;
      */
      $image->addDisciplina($image->getDisciplinas());
      //$em = $this->getDoctrine()->getManager();
      //$em->persist($image);
      //$em->flush();

      /*
      $em = $this->arrProfiles = $this->getConfigurationPool()->getContainer()->get('doctrine')->getManager();
      $em->persist($image);
      foreach ($image->getDisciplinas() as $disciplina) {
          $disciplina->setRama($image);
          $em->persist($disciplina);
          //var_dump($disciplina->getRama()->getNombre());exit;
      }
      $em->flush();
      //var_dump($image);exit;
      */
      //$this->preUpdate($image);
  }

  public function preUpdate($image)
  {
    $uniqid = $this->getRequest()->query->get('uniqid');
     $formData = $this->getRequest()->request->get($uniqid);
     $this->prePersist($image);
     //$image->addDisciplina($formData->getRamas());

     //return $this->render('OfertaBundle:Default:oferta.html.twig', array('oferta' => $oferta));
  }


  private function manageFileUpload($image)
  {
  }
}
