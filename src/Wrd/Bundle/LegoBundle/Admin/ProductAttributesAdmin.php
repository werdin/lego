<?php

namespace Wrd\Bundle\LegoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Class CategoryAdmin
 * @package Wrd\Bundle\LegoBundle\Admin
 */
class ProductAttributesAdmin extends Admin
{
    /**
     * @param \Sonata\AdminBundle\Form\FormMapper $form
     */
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('attributes', 'sonata_type_model_list', array())
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $list)
    {
        $list
            ->add('product')
            ->add('attributes')
        ;
    }
} 