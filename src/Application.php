<?php

namespace App;


use App\Controllers\Controller;

/**
 * Class Application
 * @package App
 */
class Application
{

    /**
     * @var Router
     */
    public Router $router;
    /**
     * @var Request
     */
    public Request $request;
    /**
     * @var Controller
     */
    public Controller $controller;
    /**
     * @var Database
     */
    public Database $db;
    /**
     * @var Application
     */
    public static Application $app;
    /**
     * @var string
     */
    public static string $ROOT_DIR;

    /**
     * Application constructor.
     * @param $rootDir
     */
    public function __construct($rootDir)
    {
        self::$ROOT_DIR = $rootDir;
        self::$app = $this;
        $this->loadConfig();

        $this->loadModules();
    }

    /**
     *
     */
    public function loadConfig(): void
    {
        (new \App\EnvConfig(self::$ROOT_DIR . '/.env'))->load();
    }

    /**
     *
     */
    public function bootHttpRouting() : void
    {

        $this->router = new Router($this->request);
    }

    /**
     * @return array
     */
    public function getModules(): array
    {
        return require __DIR__ . '/Modules.php';
    }

    /**
     *
     */
    public function loadModules() : void
    {

        foreach ($this->getModules() as $key => $module) {
            $this->{$key} = $module;
        }

    }

    /**
     * @return mixed
     */
    public function run(): mixed
    {
        try {
            return $this->router->resolve();
        } catch (\Exception $exception) {
            return Response::json(['message' => 'not found'], 404);
        }
    }

}