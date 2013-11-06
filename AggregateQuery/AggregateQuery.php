<?php

namespace Solution\MongoAggregationBundle\AggregateQuery;

use Doctrine\MongoDB\ArrayIterator;
use Doctrine\MongoDB\Collection;
use Solution\MongoAggregation\Configuration;
use Solution\MongoAggregation\Pipeline\Query as BaseQuery;

class AggregateQuery extends BaseQuery
{
    /** @var  Collection */
    private $collection;


    function __construct(Collection $collection, Configuration $configuration)
    {
        parent::__construct($configuration);

        $this->collection = $collection;
    }

    /**
     * @return ArrayIterator
     * @throws \Exception|\MongoException
     * @throws \RuntimeException
     */
    public function aggregate()
    {
        $database = $this->collection->getDatabase();

        $command = array();
        $command['aggregate'] = $this->collection->getName();
        $command['pipeline'] = $this->getPipeline();

        try {
            $result = $database->command($command);
        } catch (\MongoException $e) {
            throw $e;
        }

        if (!$result['ok']) {
            throw new \RuntimeException($result['errmsg']);
        }

        return new ArrayIterator(isset($result['result']) ? $result['result'] : array());
    }
}