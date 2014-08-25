<?php

namespace Wrd\Bundle\LegoBundle\Repository;


use Doctrine\ORM\EntityRepository;

/**
 * Class ProductsRepository
 * @package Wrd\Bundle\LegoBundle\Repository
 */
class ProductRepository extends EntityRepository
{
    /**
     * @return \Doctrine\ORM\Query
     */
    public function getAllProductsQuery()
    {
        $qb = $this->createQueryBuilder('p')
            ->orderBy('p.id', 'DESC');

        return $qb->getQuery();
    }

    /**
     * @param int $id
     * @return \Doctrine\ORM\Query
     */
    public function getProductsByCategoryQuery($id)
    {
        $qb = $this->createQueryBuilder('p')
            ->andWhere('p.category = ?1')
            ->orderBy('p.id', 'DESC')
            ->setParameter(1, $id);

        return $qb->getQuery();
    }
} 