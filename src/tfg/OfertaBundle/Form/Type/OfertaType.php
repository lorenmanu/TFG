<?php
# src/AppBundle/Form/Type/UserType.php

namespace tfg\OfertaBundle\Form\Type;

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
//use tfg\ConocimientoBundle\Entity\Conocimiento;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use tfg\OfertaBundle\Form\Type\OfertaType;
//use tfg\ConocimientoBundle\Form\Type\ConocimientoType;

class OfertaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nombre','text')
        ->add('slug','text')
        ->add('descripcion', 'textarea', array('label' => 'Descripcion', 'attr' => array('class' => 'descripcion')))
        ->add('condiciones','textarea')
        ->add('fechaInicio','datetime',array('widget' => 'single_text','format' => 'dd-MM-yyyy','attr' => array('class' => 'datepicker')))
        ->add('fechaFin','datetime',array('widget' => 'single_text','format' => 'dd-MM-yyyy','attr' => array('class' => 'date')))
        ->add('contacto','email')
        ->add('palabrasClave','text')
        ->add('saveAndAdd','submit')
        //->add('conocimiento', ConocimientoType::class)
        ->add('brochure', FileType::class, array('label' => 'Brochure (IMAGE file)'));

        // Añadimos un EventListener que actualizará el campo state
        // para que sus opciones correspondan
        // con el pais seleccionado por el usuario
        $builder->addEventSubscriber(new AddStateFieldSubscriber());
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'tfg\OfertaBundle\Entity\Oferta',
        ));
    }

    public function getName()
    {
        return 'user';
    }

}
