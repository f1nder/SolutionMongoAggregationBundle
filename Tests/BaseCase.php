<?php

namespace Solution\MongoAggregationBundle\Tests;

use Doctrine\MongoDB\ArrayIterator;
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

    protected function getMockConnection()
    {
        return $this->getMockBuilder('Doctrine\MongoDB\Connection')
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function getMockEventManager()
    {
        return $this->getMockBuilder('Doctrine\Common\EventManager')
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function getMockMongo()
    {
        return $this->getMockBuilder('Mongo')
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function getMockDatabase()
    {
        $db = $this->getMock('Doctrine\MongoDB\Database', array(), array(), '', false, false);
        $db->expects($this->any())
            ->method('command')
            ->with($this->anything())
            ->will($this->returnValue(['ok' => true, 'result' => []]));

        return $db;
    }

    /**
     * @return Doctrine\Common\Collections\Collection
     */
    private function getMockCollection()
    {
        $collection = $this->getMock('Doctrine\MongoDB\Collection', array(), array(), '', false, false);
        $collection->expects($this->any())
            ->method('getDatabase')
            ->will($this->returnValue($this->getMockDatabase()));

        return $collection;
    }

    /**
     * @return Doctrine\ODM\MongoDB\DocumentManager
     */
    protected function getMockDocumentManager()
    {
        $dm = $this->getMock('Doctrine\ODM\MongoDB\DocumentManager', array(), array(), '', false, false);
        $dm->expects($this->any())
            ->method('getDocumentCollection')
            ->with($this->anything())
            ->will($this->returnValue($this->getMockCollection()));

        return $dm;
    }
}