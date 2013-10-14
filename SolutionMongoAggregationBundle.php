<?php

namespace Solution\MongoAggregationBundle;

use Solution\MongoAggregationBundle\DependencyInjection\AggregationQueryCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class SolutionMongoAggregationBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new AggregationQueryCompilerPass());
    }
}
