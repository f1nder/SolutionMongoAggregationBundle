<?php

namespace Solution\MongoAggregationBundle\AggregateQuery;

use Doctrine\MongoDB\Collection;
use Solution\MongoAggregation\Configuration;
use Solution\MongoAggregation\Pipeline\Stage;

class AggregateCollection
{
    const DEFAULT_STAGE = 'first.stage';

    /** @var  Collection */
    private $collection;

    function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @param null $stage
     * @return Stage
     */
    public function createAggregateQuery($stage = null)
    {
        $qbConf = new Configuration();
        $query = new AggregateQuery($this->collection, $qbConf);
        $stage = is_string($stage) ? $stage : self::DEFAULT_STAGE;

        return $query->addStage($stage);
    }
}