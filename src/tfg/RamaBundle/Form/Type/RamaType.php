<?php
# src/AppBundle/Form/Type/UserType.php

namespace tfg\RamaBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use tfg\OfertaBundle\Form\Listener\AddStateFieldSubscriber;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tfg\OfertaBundle\Entity\Oferta;
use tfg\VisitasOfertaBundle\Entity\VisitasOferta;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Tools\Pagination\Paginator;
use tfg\ComentarioOfertaBundle\Entity\ComentarioOferta;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use tfg\RamaBundle\Form\Type\RamaType;
use tfg\DisciplinaBundle\Form\Type\DisciplinaType;

class RamaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nombre','text')
        ->add('descripcion', 'textarea', array('label' => 'Descripcion', 'attr' => array('class' => 'descripcion')))
        ->add('disciplinas',  EntityType::class, array(
            // query choices from this entity
            'class' => 'DisciplinaBundle:Disciplina',

            // use the User.username property as the visible option string
            'choice_label' => 'disciplina',

            // used to render a select box, check boxes or radios
            'multiple' => true,
            'expanded' => true,
            'by_reference' => 'false'
        ))
        ->add('saveAndAdd','submit');
;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'tfg\RamaBundle\Entity\Rama',
        ));
    }

    public function getName()
    {
        return 'user';
    }

}
