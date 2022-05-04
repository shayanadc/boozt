<?php


namespace App;


/**
 * Class Schemas
 * @package App
 */
abstract class Schemas
{
    /**
     * @var Database
     */
    public Database $db;

    /**
     * Schemas constructor.
     */
    public function __construct()
    {
        $this->db = \App\Application::$app->db;

    }

}