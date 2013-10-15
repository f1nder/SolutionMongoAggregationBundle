<?php

if (file_exists($file = __DIR__.'/../vendor/autoload.php') OR file_exists($file = __DIR__.'/../../../../../autoload.php')) {
    $autoload = require_once $file;
} else {
    throw new RuntimeException('Install dependencies to run test suite.');
}

use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;

AnnotationDriver::registerAnnotationClasses();

spl_autoload_register(function($class) {
    if (0 === strpos($class, 'Solution\\MongoAggregationBundle\\')) {
        $path = __DIR__.'/../'.implode('/', array_slice(explode('\\', $class), 2)).'.php';
        if (!stream_resolve_include_path($path)) {
            return false;
        }
        require_once $path;

        return true;
    }
});