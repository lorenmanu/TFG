<?php

namespace tfg\SubConocimientoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SubConocimientoBundle:Default:index.html.twig');
    }
}
