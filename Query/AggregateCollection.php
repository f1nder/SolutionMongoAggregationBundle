<?php

namespace Solution\MongoAggregationBundle\Query;

use Doctrine\MongoDB\Collection;
use Solution\MongoAggregation\Configuration;
use \Solution\MongoAggregationBundle\Query\AggregateQuery;

class AggregateCollection
{
    /** @var  Collection */
    private $collection;

    function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @return AggregateQuery
     */
    public function createAggregateQuery()
    {
        $qbConf = new Configuration();

        return new AggregateQuery($this->collection, $qbConf);
    }
}