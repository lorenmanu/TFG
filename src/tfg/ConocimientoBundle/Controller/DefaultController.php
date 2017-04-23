<?php

namespace tfg\ConocimientoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ConocimientoBundle:Default:index.html.twig');
    }
}
