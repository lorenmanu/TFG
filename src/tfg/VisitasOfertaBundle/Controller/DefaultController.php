<?php

namespace tfg\VisitasOfertaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('VisitasOfertaBundle:Default:index.html.twig');
    }
}
