MongoAggregationBundle
=======================

Integration Mongo Pipeline Builder into you doctrine2 mongo-odm [Framework](http://docs.mongodb.org/manual/aggregation/)

Library not yet ready.

###Install

Add to composer and install/update vendors
```
  "solution/mongo-odm-aggregation-bundle": "dev-master"
```

Add to your AppKernel and install/update vendors
``` php
  new Solution\MongoAggregationBundle\SolutionMongoAggregationBundle()
```

###Usage
After install, bundle create mongo aggregation query manager for every DocumentManager
Example:
If you have default document manager
```
doctrine_mongodb.odm.default_document_manager
```
bundle created
```
doctrine_mongodb.odm.default_aggregation_query
```
etc

####Example create aggregation query
``` php
  $expr = new \Solution\MongoAggregation\Pipeline\Operators\Expr;
  $aq = $this->get('doctrine_mongodb.odm.default_aggregation_query')
              ->getCollection('AdmPlayerBundle:Comments')->createAggregateQuery()
              ->group(['_id' => ['year' => $expr->year('$dateRegistration'), 'month' => $expr->month('$dateRegistration')], 'count' => $expr->sum(1)])
              ->sort(['count' => -1])
              ->limit(50);
```


