<?php

namespace tfg\OfertaBundle\Menu;
use Doctrine\ORM\Mapping as ORM;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use tfg\OfertaBundle\Controller;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $repositoryArea = $this->container->get('Doctrine')->getRepository('AreaBundle:Area');
        $areas = $repositoryArea->findAll();
        $menu = $factory->createItem('root');

        foreach($areas as $area){
          $menu->setChildrenAttribute('id', 'menu');
          $menu->addChild($area->getNombre(),array('uri' => '/app_dev.php//mostrarOfertas/?area='.$area->getNombre()));
          $ramas = $area->getRamas();

          foreach((array) $ramas as $rama){
            $menu[$rama->getNombre()]->addChild($rama->getNombre(), array('uri' => '/app_dev.php/mostrarOfertas/?area='.$area->getNombre().'&rama='.$rama->getNombre()))->setAttribute('divider_append', true);
            $disciplinas = $rama->getDisciplinas();

            foreach($disciplinas as $disciplina){
              //$menu[$disciplina->getNombre()]->addChild($rama->getNombre(), array('uri' => '/app_dev.php/mostrarOfertas/?area='.$area->getNombre().'&rama='.$rama->getNombre().'&disciplina'=$disciplina->getNombre()))->setAttribute('divider_append', true);
            }

          }
        }

        return $menu;
    }
}
