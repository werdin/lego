<?php

namespace Wrd\Bundle\LegoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Class CategoryAdmin
 * @package Wrd\Bundle\LegoBundle\Admin
 */
class ProductMediaAdmin extends Admin
{
    /**
     * @param \Sonata\AdminBundle\Form\FormMapper $form
     */
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('media', 'sonata_type_model_list', array(), array(
                'link_parameters' => array('context' => 'default')
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $list)
    {
        $list
            ->add('product')
            ->add('media')
        ;
    }
} 