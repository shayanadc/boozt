<?php

namespace App;

class Router
{
    public Request $request;
    protected static array $routes = [];

    public function __construct(Request $request)
    {
        $this->request = $request;

    }

    public static function get($path, $callback)
    {
        static::$routes['get'][$path] = $callback;
    }


    public function post($path, $callback)
    {
        static::$routes['post'][$path] = $callback;
    }

    public function getCallback()
    {
        $callback = static::$routes[$this->request->method()][$this->request->path()];
        if ($callback === false) {
            throw new \Exception('not found', 404);
        }
        return $callback;
    }

    public function resolve()
    {
        $callback = $this->getCallback();

        if (is_string($callback)) {
            require_once Application::$ROOT_DIR . "/views/$callback.php";
        }
        if (is_array($callback)) {
            $callback[0] = new $callback[0]();

            Application::$app->controller = new $callback[0]();
        }

        return call_user_func($callback, $this->request);
    }

}