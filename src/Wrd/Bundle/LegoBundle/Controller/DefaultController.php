<?php

namespace Wrd\Bundle\LegoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Wrd\Bundle\LegoBundle\Admin\CategoryAdmin;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $c = new CategoryAdmin('','','');
        return $this->render('WrdLegoBundle:Default:index.html.twig');
    }
}
