<?php

namespace Solution\MongoAggregationBundle\Query;

use Doctrine\ODM\MongoDB\DocumentManager;

class AggregationQueryBuilder
{
    /**
     * @var \Doctrine\ODM\MongoDB\DocumentManager
     */
    protected $dm;

    function __construct(DocumentManager $dm)
    {
        $this->dm = $dm;
    }

    /**
     * @param $name
     * @return AggregateCollection
     */
    public function getCollection($name)
    {
        $collection = new AggregateCollection($this->dm->getDocumentCollection($name));

        return $collection;
    }
}