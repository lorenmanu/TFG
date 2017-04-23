<?php

namespace tfg\ComentarioOfertaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ComentarioOfertaBundle:Default:index.html.twig');
    }
}
