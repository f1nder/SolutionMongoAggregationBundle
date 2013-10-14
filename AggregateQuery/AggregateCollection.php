<?php

namespace Solution\MongoAggregationBundle\AggregateQuery;

use Doctrine\MongoDB\Collection;
use Solution\MongoAggregation\Configuration;

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