<?php

namespace Wrd\Bundle\LegoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Wrd\Bundle\LegoBundle\Entity\ProductAttributes;
use Wrd\Bundle\LegoBundle\Entity\ProductMedia;

/**
 * Class CategoryAdmin
 * @package Wrd\Bundle\LegoBundle\Admin
 */
class ProductAdmin extends Admin
{
    /**
     * Fields to be shown on create/edit forms
     *
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title')
            ->add('category')
            ->add('description', 'textarea', array('required' => false))
            ->add('cost', 'number', array('precision' => 2))
            ->add('media', 'sonata_type_collection', array(
                'required' => false,
                'by_reference' => false,
            ), array(
                'edit' => 'inline',
                'inline' => 'table'
            ))
            ->add('attributes', 'sonata_type_collection', array(
                'required' => false,
                'by_reference' => false,
            ), array(
                'edit' => 'inline',
                'inline' => 'table',
                'sortable' => 'position'
            ));
    }

    /**
     * Fields to be shown on filter forms
     *
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('title')
            ->add('description')
            ->add('cost');
    }

    /**
     * Fields to be shown on lists
     *
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('title')
            ->add('description')
            ->add('cost')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                )
            ));
    }

    /**
     * @inheritdoc
     */
    public function prePersist($object)
    {
        /** @var $image ProductMedia */
        foreach ($object->getMedia() as $image) {
            $image->setProduct($object);
        }

        /** @var $attribute ProductAttributes */
        foreach ($object->getAttributes() as $attribute) {
            $attribute->setProduct($object);
        }
    }

    /**
     * @inheritdoc
     */
    public function preUpdate($object)
    {
        /** @var $image ProductMedia */
        foreach ($object->getMedia() as $image) {
            $image->setProduct($object);
        }

        /** @var $attribute ProductAttributes */
        foreach ($object->getAttributes() as $attribute) {
            $attribute->setProduct($object);
        }
    }
} 