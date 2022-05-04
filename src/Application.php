<?php

namespace App;


use App\Controllers\Controller;

class Application
{

    public Router $router;
    public Request $request;
    public Controller $controller;
    public Database $db;
    public static Application $app;
    public static string $ROOT_DIR;

    public function __construct($rootDir)
    {
        self::$ROOT_DIR = $rootDir;
        self::$app = $this;
        $this->request = new Request();
        $this->router = new Router($this->request);
        $this->db = new Database(getenv("DB_HOST"), getenv("DB_PORT"), getenv("DB_NAME"), getenv("DB_USER"), getenv("DB_PASS"));
    }

    public function run(){
        try {
            return $this->router->resolve();
        }catch (\Exception $exception){
            return Response::json(['message' => 'not found'], 404);
        }
    }

}