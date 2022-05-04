<?php
require_once __DIR__ . '/vendor/autoload.php';
$app = new \App\Application(__DIR__);
$app->db->applyMigrations();
