<?php


namespace Solution\MongoAggregationBundle\Tests;


use Solution\MongoAggregationBundle\Tests\App\AppKernel;
use Symfony\Bundle\FrameworkBundle\Tests\Functional\WebTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ContainerTest extends BaseCase
{
    const QUERY_BUILDER_CLASS = '\Solution\MongoAggregationBundle\Query\AggregationQueryBuilder';


    public function testGenerateQueryBuilder()
    {
        $this->assertInstanceOf(self::QUERY_BUILDER_CLASS, $this->container->get('doctrine_mongodb.odm.default_aggregation_query'));
        $this->assertInstanceOf(self::QUERY_BUILDER_CLASS, $this->container->get('doctrine_mongodb.odm.dummy_aggregation_query'));
    }
}
