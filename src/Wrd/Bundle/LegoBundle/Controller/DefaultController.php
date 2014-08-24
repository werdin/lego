<?php

namespace Wrd\Bundle\LegoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Wrd\Bundle\LegoBundle\Admin\CategoryAdmin;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $categories = $this->getDoctrine()
            ->getRepository('WrdLegoBundle:Category')
            ->findAll();

        return $this->render('WrdLegoBundle:Default:index.html.twig', array('categories' => $categories));
    }
}
