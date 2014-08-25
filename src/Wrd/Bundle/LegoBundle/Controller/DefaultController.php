<?php

namespace Wrd\Bundle\LegoBundle\Controller;

use Knp\Component\Pager\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Wrd\Bundle\LegoBundle\Repository\ProductRepository;

class DefaultController extends Controller
{
    public function indexAction()
    {
        /** @var $productRepository ProductRepository */
        $productRepository = $this->getDoctrine()->getRepository('WrdLegoBundle:Product');
        $query = $productRepository->getAllProductsQuery();

        /** @var $paginator Paginator */
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1),
            4
        );

        $categories = $this->getDoctrine()->getRepository('WrdLegoBundle:Category')->findAll();

        return $this->render('WrdLegoBundle:Default:index.html.twig',
            array(
                'categories' => $categories,
                'pagination' => $pagination
            )
        );
    }

    public function productDetailsAction($id)
    {
        $product = $this->getDoctrine()->getRepository('WrdLegoBundle:Product')->find($id);
        if (!$product) {
            throw $this->createNotFoundException('Product not found');
        }
        $categories = $this->getDoctrine()->getRepository('WrdLegoBundle:Category')->findAll();
        return $this->render('WrdLegoBundle:Default:product-details.html.twig',
            array(
                'categories' => $categories,
                'product' => $product
            )
        );
    }

    public function categoryAction($id)
    {
        /** @var $productRepository ProductRepository */
        $productRepository = $this->getDoctrine()->getRepository('WrdLegoBundle:Product');
        $query = $productRepository->getProductsByCategoryQuery($id);

        /** @var $paginator Paginator */
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1),
            4
        );

        $categories = $this->getDoctrine()->getRepository('WrdLegoBundle:Category')->findAll();

        return $this->render('WrdLegoBundle:Default:index.html.twig',
            array(
                'categories' => $categories,
                'pagination' => $pagination
            )
        );
    }
}
