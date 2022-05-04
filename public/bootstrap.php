<?php
require_once __DIR__ . '/../vendor/autoload.php';
$app = new \App\Application(dirname(__DIR__));
$app->bootHttpRouting();
require_once __DIR__ . '/../src/Http/routes.php';

return $app;
