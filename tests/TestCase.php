<?php

namespace Tests;

class TestCase extends \PHPUnit\Framework\TestCase
{
    public $app;
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->app = require __DIR__. '/../public/bootstrap.php';

    }
    public function setURI($path) {
        $_SERVER['REQUEST_URI'] = $path;
    }
    public function setMethod($method) {
        $_SERVER['REQUEST_METHOD'] = $method;
    }

    public function get($path) {

        $this->setURI($path);
        $this->setMethod('GET');
        return $this->app->run();
    }

    public function getJson($path){
        return json_decode($this->get($path), true);
    }

    public function purgeDB(){
        $this->app->db->rollBackMigrations();
    }

    public function runMigration(){
        $this->app->db->applyMigrations();
    }


}