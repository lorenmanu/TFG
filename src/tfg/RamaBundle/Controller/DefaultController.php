<?php

namespace tfg\RamaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tfg\RamaBundle\Form\Type\RamaType;
use tfg\RamaBundle\Entity\Rama;
use tfg\DisciplinaBundle\Entity\Disciplina;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Common\Collections\ArrayCollection;


class DefaultController extends Controller {

  public function subirRamaAction(Request $request){


    $formRama= $this->createForm(new RamaType(),$Rama = new Rama());
    $formRama->handleRequest($request);


    if($formRama->isValid()){
      $em = $this->getDoctrine()->getManager();
      $em->persist($Rama);
      $em->flush();
      $ramAux = $em->getRepository('RamaBundle:Rama')->findOneById($Rama->getId());

        $disciplinas = new ArrayCollection();
        //dump($Rama->getDisciplinas());exit;
        foreach ($Rama->getDisciplinas()->toArray() as $a => $disciplina) {
          if ($disciplina instanceof Disciplina){
          echo $a . " : " . $disciplina->getId() . "<br />";
          $disAux = $em->getRepository('DisciplinaBundle:Disciplina')->findOneById($disciplina->getId());
          $disAux->addRama($Rama);
          $ramAux->addDisciplina($disAux);
          //$Rama->addDisciplina($disciplina);
            //$em->persist($disciplina);
            //$em->persist($Rama);
            $em->flush();
            dump($disAux);
            dump($ramAux);
            //dump($disciplina);
                //die();

            //$em->persist($Rama);
          }
        }
        dump($ramAux->getDisciplinas());
        //exit;
        //dump($Rama->getDisciplinas());exit;
        //dump($Rama);exit;

        //return $this->redirectToRoute('mostrarRamas');

        //$rama = new Rama();
        //$rama->setNombre('Computer Peripherals');
        //$rama->setDescripcion('Computer Peripherals');

        //$disciplina = new Disciplina();
        //$disciplina->setNombre('Keyboard');
        //$disciplina->setDescripcion('Computer Peripherals');

        // relate this product to the category
        /*
        $em = $this->getDoctrine()->getManager();
        $rama->addDisciplina($disciplina);

        $disciplina->setRama($rama);
        //dump(($rama));
        //die();
        $em->persist($rama);
        $em->persist($disciplina);
        $em->flush();
        */

        //dump($Rama->getDisciplinas());exit;

      return $this->redirectToRoute('mostrarRamas');
    }
    return $this->render('RamaBundle:Default:addRama.html.twig', array(
          'formRama' => $formRama->createView()
          //'Ramas' => $Ramas
        ));
  }




  public function mostrarRamasAction(){
    $ramas = $this->getDoctrine()
        ->getRepository('RamaBundle:Rama')
        ->findById('1');

    //$disciplinas = $rama->getDisciplinas();
      foreach ($ramas as $a => $rama) {
        dump($rama);
        exit;
        foreach ($rama->getDisciplinas()->toArray() as $a => $disciplina) {
          dump($disciplina);
          exit;
        }
      }

    die();

    return $this->render('RamaBundle:Default:index.html.twig', array(
          'ramas' => $rama
          //'Ramas' => $Ramas
        ));
  }
}
