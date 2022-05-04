<?php
require_once __DIR__ . '/vendor/autoload.php';
(new \App\EnvConfig(__DIR__ . '/.env'))->load();
$app = new \App\Application(__DIR__);
\App\Seeders::run();