<?php

namespace ConocimientosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ConocimientosBundle:Default:index.html.twig');
    }
}
