<?php

namespace RamaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RamaBundle:Default:index.html.twig');
    }
}
