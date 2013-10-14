<?php

namespace Solution\MongoAggregationBundle\Tests\MongoAggregationQuery;

use Solution\MongoAggregationBundle\Query\AggregateQuery;
use Solution\MongoAggregationBundle\Tests\BaseCase;

class AggregationQueryBuilderTest extends BaseCase
{
    public function testGetCollection()
    {
        $qB = $this->container->get('doctrine_mongodb.odm.dummy_aggregation_query')->getCollection('Document:Dummy');
        $this->assertInstanceOf('\Solution\MongoAggregationBundle\Query\AggregateCollection', $qB);
    }

    public function testCreateQueryInstance()
    {
        $qB = $this->container->get('doctrine_mongodb.odm.dummy_aggregation_query')->getCollection('Document:Dummy')->createAggregateQuery();
        $this->assertInstanceOf('\Solution\MongoAggregationBundle\Query\AggregateQuery', $qB);
    }


    public function testAggregateQuery()
    {
        /** @var AggregateQuery $qB */
        $qB = $this->container->get('doctrine_mongodb.odm.dummy_aggregation_query')->getCollection('Document:Dummy')->createAggregateQuery();

        $result = $qB->addStage('first')
            ->match(['testProperty' => 1])
            ->getQuery()->aggregate();

        $this->assertInstanceOf('\Doctrine\MongoDB\ArrayIterator', $result);
    }
}
