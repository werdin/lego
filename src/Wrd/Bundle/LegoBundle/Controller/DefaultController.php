<?php

namespace Wrd\Bundle\LegoBundle\Controller;

use Knp\Component\Pager\Paginator;
use Lexik\Bundle\CurrencyBundle\Converter\Converter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Wrd\Bundle\LegoBundle\Repository\ProductRepository;

/**
 * Class DefaultController
 * @package Wrd\Bundle\LegoBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        /** @var $productRepository ProductRepository */
        $productRepository = $this->getDoctrine()->getRepository('WrdLegoBundle:Product');
        $query = $productRepository->getAllProductsQuery();

        return $this->getFormattedResponse($query);
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function categoryAction($id)
    {
        /** @var $productRepository ProductRepository */
        $productRepository = $this->getDoctrine()->getRepository('WrdLegoBundle:Product');
        $query = $productRepository->getProductsByCategoryQuery($id);

        return $this->getFormattedResponse($query);
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function productDetailsAction($id)
    {
        $product = $this->getDoctrine()->getRepository('WrdLegoBundle:Product')->find($id);
        if (!$product) {
            throw $this->createNotFoundException('Product not found');
        }
        /** @var $converter Converter */
        $converter = $this->get('lexik_currency.converter');
        $currency = $this->get('request')->query->get('currency', $converter->getDefaultCurrency());
        $categories = $this->getDoctrine()->getRepository('WrdLegoBundle:Category')->findAll();
        return $this->render('WrdLegoBundle:Default:product-details.html.twig',
            array(
                'categories' => $categories,
                'product' => $product,
                'currency' => $currency
            )
        );
    }

    /**
     * @param \Doctrine\ORM\Query $query
     * @return \Symfony\Component\HttpFoundation\Response
     */
    private function getFormattedResponse($query)
    {
        /** @var $converter Converter */
        $converter = $this->get('lexik_currency.converter');

        /** @var $paginator Paginator */
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1),
            4
        );

        $categories = $this->getDoctrine()->getRepository('WrdLegoBundle:Category')->findAll();
        $availableCurrencies = $this->container->getParameter('lexik_currency.currencies.managed');
        $currency = $this->get('request')->query->get('currency', $converter->getDefaultCurrency());
        if (!in_array($currency, $availableCurrencies)) {
            $currency = $converter->getDefaultCurrency();
        }

        return $this->render('WrdLegoBundle:Default:index.html.twig',
            array(
                'categories' => $categories,
                'pagination' => $pagination,
                'currency' => $currency,
                'available_currencies' => $availableCurrencies,
            )
        );
    }
}
