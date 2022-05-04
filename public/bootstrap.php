<?php
require_once __DIR__ . '/../vendor/autoload.php';
(new \App\EnvConfig(__DIR__ . '/../.env'))->load();
$app = new \App\Application(dirname(__DIR__));
require_once __DIR__ . '/../src/Http/routes.php';

return $app;
