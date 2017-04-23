<?php

namespace tfg\VisitasDemandaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('VisitasDemandaBundle:Default:index.html.twig');
    }
}
