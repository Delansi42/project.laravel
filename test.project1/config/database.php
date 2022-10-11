<?php
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection([
    'driver' => getenv('DATABASE_DRIVER'),
    'host' => getenv('DATABASE_HOST'),
    'database' => getenv('DATABASE_NAME'),
    'username' => getenv('DATABASE_USERNAME'),
    'password' => getenv('DATABASE_PASSWORD'),
    'charset' => getenv('DATABASE_CHARSET'),
    'collation' => getenv('DATABASE_COLLATION'),
    'prefix' => getenv('DATABASE_PREFIX'),
]);


use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));
$capsule->setAsGlobal();
$capsule->bootEloquent();