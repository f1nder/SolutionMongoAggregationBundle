<?php
/**
 * Short description file...
 *
 * Long description file (if need)...
 *
 * @package ${VENDOR}\\${BUNDLE}\\$PACKAGE
 * @author  a.moroz
 * @date    11.10.13 14:57
 */

namespace Solution\MongoAggregationBundle\DependencyInjection;


use Doctrine\ODM\MongoDB\DocumentManager;
use Solution\MongoAggregationBundle\Query\AggregationQuery;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

class AggregationQueryCompilerPass implements CompilerPassInterface
{

    public function process(ContainerBuilder $container)
    {
        $managers = $container->findTaggedServiceIds('doctrine_mongodb.odm.document_manager');

        foreach ($managers as $id => $attributes) {
            $this->compileAggreagationQueryBuilder($container,  $id);
        }
    }

    private function compileAggreagationQueryBuilder(ContainerBuilder $container, $managerId)
    {
        $queryBuilder = new Definition('%solution.mongo_aggregation_query.class%');
        $queryBuilder->addArgument(new Reference($managerId));

        $container->setDefinition($this->generateQueryBuiderId($managerId), $queryBuilder);
    }

    private function generateQueryBuiderId($id)
    {
        return str_replace('document_manager', 'aggregation_query', $id);
    }
}