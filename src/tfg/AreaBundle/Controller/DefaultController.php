<?php

namespace tfg\AreaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AreaBundle:Default:index.html.twig');
    }
}
