<?php

namespace Solution\MongoAggregationBundle\Tests;

use Symfony\Bundle\SecurityBundle\Tests\Functional\WebTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Solution\MongoAggregationBundle\Tests\App\AppKernel;

class BaseCase extends WebTestCase
{
    /** @var  ContainerInterface */
    protected $container;

    public function  setUp()
    {
        self::$kernel = new AppKernel('test', true);
        static::$kernel->boot();
        $this->container = static::$kernel->getContainer();
    }
}