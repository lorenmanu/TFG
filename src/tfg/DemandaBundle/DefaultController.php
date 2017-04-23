<?php

namespace tfg\OfertaBundle\Controller;
use tfg\OfertaBundle\Entity\Oferta;
use tfg\VisitasOfertaBundle\Entity\VisitasOferta;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction(){
       $em = $this->getDoctrine()->getManager();
       $visitasOferta = new VisitasOferta();
       $visitasOferta->setFecha(new \DateTime('today'));
       $visitasOferta->setUsuario("hola");
       $em->persist($visitasOferta);
       $em->flush();



       $oferta = new Oferta();

       $oferta->setNombre("prue2b22a343+232232");
       $oferta->setSlug("prueba232+224332323");
       $oferta->setCondiciones("p232ru32243eba+3323");
       $oferta->setDescripcion("p2r2233u423e2ba23e423b2a+2433");
       $oferta->setCondiciones("p2r2233u423e2ba23e423b2a2233u43e2ba+235");
       $oferta->setRutaFoto("pr2ue2ba2+342336223");
       $oferta->setFechaFin(new \DateTime('today'));
       $oferta->setFechaInicio(new \DateTime('today'));
       $oferta->setContacto("prue2ba+2s623243363");
       $oferta->setConocimiento("p2rue2323ss2343ba+763");
       $oferta->setPalabrasClave("3pru22e32s243ba+863");
       $oferta->setVisitasOferta($visitasOferta);
       $em->persist($oferta);
       $em->flush();
       $em = $this->getDoctrine()->getManager();

       $oferta = $em->getRepository('OfertaBundle:Oferta')->findOneBy(array(
          'nombre'    => "prue2b22a343+232232",
          'fechaInicio'  => new \DateTime('today')
        ));

        return $this->render('OfertaBundle:Default:portada.html.twig',
                          array('oferta'=>$oferta));
    }
}
