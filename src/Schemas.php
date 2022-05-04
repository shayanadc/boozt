<?php


namespace App;


abstract class Schemas
{
    public Database $db;
    public function __construct()
    {
        $this->db = \App\Application::$app->db;

    }

}