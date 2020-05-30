<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

date_default_timezone_set('Asia/Dhaka');

$container=new Container;
$capsule=new Capsule;

$capsule->addConnection([
    "driver" => "mysql",
    "host"=>"localhost",
    "database"=>"chat",
    "username"=>"root",
    "password"=>"Nahid940###***",
    "charset"=>"utf8",
    "collation"=>"utf8_unicode_ci",
    "prefix"=>""
]);

$capsule->setEventDispatcher(new Dispatcher($container));
$capsule->setAsGlobal();
$capsule->bootEloquent();
