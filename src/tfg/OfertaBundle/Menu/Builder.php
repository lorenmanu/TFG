<?php

namespace tfg\OfertaBundle\Menu;
use Doctrine\ORM\Mapping as ORM;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use tfg\OfertaBundle\Controller;
use  tfg\ConocimientoBundle\Entity;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $repository = $this->container->get('Doctrine')->getRepository('ConocimientoBundle:Conocimiento');
        $conocimientos = $repository->findAll();
        $menu = $factory->createItem('root');

        foreach($conocimientos as $conocimiento){
          $menu->setChildrenAttribute('id', 'menu');
          $menu->addChild($conocimiento->getPrimerCampo(),array('uri' => '/app_dev.php//mostrarOfertas/?primerCampo='.$conocimiento->getPrimerCampo()));
          $menu[$conocimiento->getPrimerCampo()]->addChild($conocimiento->getSegundoCampo(), array('uri' => '/app_dev.php/mostrarOfertas/?primerCampo='.$conocimiento->getPrimerCampo().'&segundoCampo='.$conocimiento->getSegundoCampo()))->setAttribute('divider_append', true);
          $menu[$conocimiento->getPrimerCampo()][$conocimiento->getSegundoCampo()]->addChild($conocimiento->getTercerCampo(), array('uri' => '/app_dev.php/mostrarOfertas/?primerCampo='.$conocimiento->getPrimerCampo().'&segundoCampo='.$conocimiento->getSegundoCampo().'&tercerCampo='.$conocimiento->getTercerCampo()))->setAttribute('divider_append', true);
        }

        return $menu;
    }
}
