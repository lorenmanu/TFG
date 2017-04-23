<?php

namespace tfg\OfertaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tfg\OfertaBundle\Entity\Oferta;
use tfg\VisitasOfertaBundle\Entity\VisitasOferta;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Tools\Pagination\Paginator;
use tfg\ComentarioOfertaBundle\Entity\ComentarioOferta;
use tfg\ConocimientoBundle\Entity\Conocimiento;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;


class DefaultController extends Controller
{

  public function deleteCommentAction(){
    $id=$_GET['idComment'];

    $ofertaComentario = $this->getDoctrine()
          ->getRepository('ComentarioOfertaBundle:ComentarioOferta')
          ->find($id);

      if (!$ofertaComentario) {
          throw $this->createNotFoundException(
              'No oferta found for id '.$id
          );
      }

      $em = $this->getDoctrine()->getManager();
      $em->remove($ofertaComentario);
      $em->flush();

      $idOferta=$_GET['id'];

      $oferta = $this->getDoctrine()
            ->getRepository('OfertaBundle:Oferta')
            ->find($idOferta);

      if (!$oferta) {
            throw $this->createNotFoundException(
                'No oferta found for id '.$idOferta
            );
        }

    return $this->render('OfertaBundle:Default:oferta.html.twig', array('oferta' => $oferta));
}


  public function showOfertaAction(Request $request){
    $idOferta=$_GET['id'];

    $oferta = $this->getDoctrine()
          ->getRepository('OfertaBundle:Oferta')
          ->find($idOferta);

    if (!$oferta) {
          throw $this->createNotFoundException(
              'No oferta found for id '.$idOferta
          );
      }

    $comentarioOferta = new ComentarioOferta();

    $url = $this->generateUrl('showOferta',array('id' => $oferta->getId()));

    $formOferta = $this->createFormBuilder($comentarioOferta)
                                    ->add('descripcion', 'textarea', array('label' => 'Descripcion', 'attr' => array('class' => 'descripcion')))
                                    ->add('saveAndAdd','submit')
                                    ->setAction($url)
                                    ->getForm();
    $formOferta->handleRequest($request);

    if($formOferta->isValid()){

      $comentarioOferta->setOferta($oferta);
      $comentarioOferta->setFecha($oferta->getFechaInicio());
      $comentarioOferta->setOferta($oferta);

      $em = $this->getDoctrine()->getManager();
      $em->persist($comentarioOferta);
      $em->flush();


      return $this->redirectToRoute('showOferta', array('id' => $oferta->getId()));
    }

    return $this->render('OfertaBundle:Default:oferta.html.twig', array('oferta' => $oferta,'form' => $form->createView()));
  }

  public function mostrarOfertasAction($primerCampo=null,$segundoCampo=null,$tercerCampo=null,$page=0,$cursorScroll=0){

    $repository = $this->getDoctrine()->getRepository('OfertaBundle:Oferta');
    $ofertas = $repository->findAll(); // Limit;

    $limit = 5;
    $start = $limit * ($page - 1);
    $length = $limit * ($page - 1)+5;
    $maxPages = ceil(count($ofertas) / $limit);


    if($primerCampo && $segundoCampo && $tercerCampo){
      return $primerCamo."./".$segundoCampo."./".$tercerCampo;
    }

    if($maxPages%5==0){
      $maxScroll= $maxPages/5;
      $topeScroll=$cursorScroll+5;
     }
    else{
      $maxScroll= $maxPages/5+1;
      if($maxPages<(($cursorScroll)+6)){
        $topeScroll=$cursorScroll+$maxPages%5+1;
      }
      else{
        $topeScroll=$cursorScroll+5;
      }
    }


     // Pass through the 3 above variables to calculate pages in twig
    return $this->render('OfertaBundle:Default:index.html.twig', compact('ofertas',
                                              'maxPages', 'thisPage','start','length',
                                              'page','maxPages','cursorScroll','topeScroll','maxScroll'));


  }

  public function portadaAction()
  {
    $em = $this->getDoctrine()->getManager();
    $vO = new VisitasOferta();
    $vO->setUsuario("prueba");
    $vO->setFecha(new \DateTime('yesterday'));
    $em->persist($vO);
    $em->flush();

    $entidad = new Oferta();

    $entidad->setNombre("pruebdxqqsszaqsq2qd1sd");
    $entidad->setSlug("prues2sdbx1qqszdqdqa");
    $entidad->setNombre("pssruse1xqqbsazqdqs2dba");
    $entidad->setSlug("prsuedbas21xqqdzsbqsqda");
    $entidad->setDescripcion("psruexbqdszqq1qa2dsdru2desba");
    $entidad->setCondiciones("qprsd2xsq1szdquqdebsa");
    $entidad->setRutaFoto("pddrs1qsuex2qdszbqqa");
    $entidad->setFechaInicio(new \DateTime('today'));
    $entidad->setFechaFin(new \DateTime('today'));
    $entidad->setContacto("pruebsddssqxsqs1zdqq2a");
    $entidad->setConocimiento("prdudssqx1dsqzqqesb2a");
    $entidad->setPalabrasClave("pdrsusqsx1qsqzdqdeb2a");
    $em->persist($entidad);
    //$em->flush();


    /*
    $oferta = $em->getRepository('OfertaBundle:Oferta')->findOneBy(array(
                                  'nombre' => 'prueba2dd',
                                ));
    */
    if (!$entidad) {
        throw $this->createNotFoundException('No se ha encontrado la oferta del día');
    }

    return $this->render('OfertaBundle:Default:portada.html.twig.php', array('oferta' => $entidad));
  }

  public function getPrimerCampo(){
    $primerNivel = array("Primer Nivel");
    $repository = $this->getDoctrine()->getRepository('ConocimientoBundle:Conocimiento');
    $conocimientos = $repository->findAll(); // Limi

    foreach ($conocimientos as $conocimiento) {
      array_push($primerNivel, $conocimiento->getPrimerCampo());
    }

    return $primerNivel;
  }

  public function getSegundoCampo($primerCampo){
    $segundoNivel = array("Segundo Nivel");
    $repository = $this->getDoctrine()->getRepository('ConocimientoBundle:Conocimiento');
    $conocimientos = $repository->findByPrimerCampo($primerCampo);

    foreach ($conocimientos as $conocimiento) {
      array_push($primerNivel, $conocimiento->getPrimerCampo());
    }

    return $segundoNivel;
  }

  public function getTercerCampo($segundoCampo){
    $tercerNivel = array("Tercer Nivel");
    $repository = $this->getDoctrine()->getRepository('ConocimientoBundle:Conocimiento');
    $conocimientos = $repository->findByPrimerCampo($segundoCampo);

    foreach ($conocimientos as $conocimiento) {
      array_push($tercerNivel, $conocimiento->getTercerCampo());
    }

    return $tercerNivel;

  }
  public function subirOfertaAction(Request $request){

    $oferta = new Oferta();
    $conocimiento = new Conocimiento();

    $repository = $this->getDoctrine()->getRepository('ConocimientoBundle:Conocimiento');
    $conocimientos = $repository->findAll(); // Limi

    foreach($conocimientos as $conocimiento){
            $test[] = array($conocimiento->getPrimerCampo()=>array($conocimiento->getSegundoCampo()=>$conocimiento->getTercerCampo()));
    }


    $formConocimiento = $this->createFormBuilder($conocimiento)
                                                ->setAction($this->generateUrl('addOferta'))
                                                ->add('primerCampo', ChoiceType::class, array(
                                                    'choices' => $test,
                                                    'choices_as_values' => true,
                                                ))
                                                ->getForm();

    $formOferta = $this->createFormBuilder($oferta)
                                    ->add('nombre','text')
                                    ->add('slug','text')
                                    ->add('descripcion', 'textarea', array('label' => 'Descripcion', 'attr' => array('class' => 'descripcion')))
                                    ->add('condiciones','textarea')
                                    ->add('fechaInicio','datetime',array('widget' => 'single_text','format' => 'dd-MM-yyyy','attr' => array('class' => 'datepicker')))
                                    ->add('fechaFin','datetime',array('widget' => 'single_text','format' => 'dd-MM-yyyy','attr' => array('class' => 'date')))
                                    ->add('contacto','email')
                                    ->add('conocimiento','text')
                                    ->add('palabrasClave','text')
                                    ->add('saveAndAdd','submit')
                                    ->add('conocimiento', CollectionType::class , array('class' => 'tfg\ConocimientoBundle\Entity\Conocimiento'))
                                    ->add('brochure', FileType::class, array('label' => 'Brochure (IMAGE file)'))
                                    ->setAction($this->generateUrl('addOferta'))
                                    ->getForm();

    $formOferta->handleRequest($request);
    $formConocimiento->handleRequest($request);


    if($formOferta->isValid() && $formConocimiento){
      $nextAction = $formOferta->get('saveAndAdd')->isClicked()
          ? 'mostrarOfertas'
          : 'addOferta';

        // $file stores the uploaded PDF file
        /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
        $file = $oferta->getBrochure();

        // Generate a unique name for the file before saving it
        $fileName = md5(uniqid()).'.'.$file->guessExtension();

        // Move the file to the directory where brochures are stored
        $file->move(
            $this->getParameter('brochures_directory'),
            $fileName
        );

        // Update the 'brochure' property to store the PDF file name
        // instead of its contents
        $oferta->setBrochure($file);


        $em = $this->getDoctrine()->getManager();
        $em->persist($oferta);
        $em->flush();

        $page=1;
        $cursorScroll=1;
        $router=$this->get('router');
        $comentario= new ComentarioOferta();
        $comentario->setOferta($oferta);
        $comentario->setDescripcion("holaaaa");
        $comentario->setFecha($oferta->getFechaInicio());
        $comentario->setOferta($oferta);

        $em = $this->getDoctrine()->getManager();
        $em->persist($oferta);
        $em->persist($comentario);
        $em->flush();

        return $this->redirectToRoute('mostrarOfertas', array('page' => 0,'cursorScroll' => 0));
    }


    //return $this->redirect($this->generateUrl($nextAction));
    return $this->render('OfertaBundle:Default:addOferta.html.twig', array(
          'formOferta' => $formOferta->createView(),
          'formConocimiento' => $formConocimiento->createView()
        ));

  }
}
