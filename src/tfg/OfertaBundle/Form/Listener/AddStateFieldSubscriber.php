<?php

namespace tfg\OfertaBundle\Form\Listener;

use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityRepository;

class AddStateFieldSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SUBMIT => 'preSubmit',
        );
    }

    /**
     * Cuando el usuario llene los datos del formulario y haga el envío del mismo,
     * este método será ejecutado.
     */
    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        //data es un arreglo con los valores establecidos por el usuario en el form.

        //como $data contiene el pais seleccionado por el usuario al enviar el formulario,
        // usamos el valor de la posicion $data['country'] para filtrar el sql de los estados
        $this->addField($event->getForm(), $data['conocimiento']);
    }

    protected function addField(Form $form, $conocimiento_ax)
    {
        $primerCampo = $conocimiento_aux.getPrimerCampo();
        // actualizamos el campo state, pasandole el country a la opción
        // query_builder, para que el dql tome en cuenta el pais
        // y filtre la consulta por su valor.
        $form->add('conocimiento', 'entity', array(
            'class' => 'AppBundle\Entity\State',
            'query_builder' => function(EntityRepository $er) use ($primerCampo){
                return $er->createQueryBuilder('conocimiento')
                    ->where('conocimiento.primerCampo = :primerCampo')
                    ->setParameter('country', $primerCampo);
            }
        ));
    }
}
