<?php

namespace Wrd\Bundle\LegoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WrdLegoBundle:Default:index.html.twig');
    }
}
