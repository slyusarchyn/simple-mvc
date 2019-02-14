<?php
require __DIR__.'/../vendor/autoload.php';

define('ROOTPATH', dirname(__DIR__, 1));

App::init();
App::$kernel->launch();
