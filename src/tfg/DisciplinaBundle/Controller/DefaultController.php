<?php

namespace tfg\DisciplinaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DisciplinaBundle:Default:index.html.twig');
    }
}
