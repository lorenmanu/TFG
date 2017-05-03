<?php

namespace tfg\DisciplinaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tfg\DisciplinaBundle\Form\Type\DisciplinaType;
use tfg\DisciplinaBundle\Entity\Disciplina;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller {

  public function subirDisciplinaAction(Request $request){

    $formDisciplina= $this->createForm(new DisciplinaType(),$disciplina = new Disciplina());
    $formDisciplina->handleRequest($request);


    if($formDisciplina->isValid()){

        $em = $this->getDoctrine()->getManager();
        $em->persist($disciplina);
        $em->flush();

        return $this->redirectToRoute('mostrarDisciplinas');
    }

    return $this->render('DisciplinaBundle:Default:addDisciplina.html.twig', array(
          'formDisciplina' => $formDisciplina->createView()
          //'disciplinas' => $disciplinas
        ));
   }

  public function mostrarDisciplinasAction(){
    $repository = $this->getDoctrine()->getRepository('DisciplinaBundle:Disciplina');
    $disciplinas = $repository->findAll(); // Limit;



    // Pass through the 3 above variables to calculate pages in twig
    return $this->render('DisciplinaBundle:Default:index.html.twig', compact('disciplinas'));
  }
}
