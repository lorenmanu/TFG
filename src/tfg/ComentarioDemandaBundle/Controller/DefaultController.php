<?php

namespace tfg\ComentarioDemandaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ComentarioDemandaBundle:Default:index.html.twig');
    }
}
