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
        $this->loadConfig();

        $this->loadModules();
    }

    public function loadConfig(): void
    {
        (new \App\EnvConfig(self::$ROOT_DIR . '/.env'))->load();
    }

    public function bootHttpRouting() : void
    {

        $this->router = new Router($this->request);
    }

    public function getModules(): array
    {
        return require __DIR__ . '/Modules.php';
    }

    public function loadModules() : void
    {

        foreach ($this->getModules() as $key => $module) {
            $this->{$key} = $module;
        }

    }

    public function run(): mixed
    {
        try {
            return $this->router->resolve();
        } catch (\Exception $exception) {
            return Response::json(['message' => 'not found'], 404);
        }
    }

}