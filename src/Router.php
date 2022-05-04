<?php

namespace App;

/**
 * Class Router
 * @package App
 */
class Router
{
    /**
     * @var Request
     */
    public Request $request;
    /**
     * @var array
     */
    protected static array $routes = [];

    /**
     * Router constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;

    }

    /**
     * @param $path
     * @param $callback
     */
    public static function get($path, $callback)
    {
        static::$routes['get'][$path] = $callback;
    }


    /**
     * @param $path
     * @param $callback
     */
    public function post($path, $callback)
    {
        static::$routes['post'][$path] = $callback;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getCallback()
    {
        $callback = static::$routes[$this->request->method()][$this->request->path()];
        if ($callback === false) {
            throw new \Exception('not found', 404);
        }
        return $callback;
    }

    /**
     * @return false|mixed|string
     * @throws \Exception
     */
    public function resolve()
    {
        $callback = $this->getCallback();

        if (is_string($callback)) {
            return $this->renderView($callback);
        }
        if (is_array($callback)) {
            $callback[0] = new $callback[0]();

            Application::$app->controller = new $callback[0]();
        }

        return call_user_func($callback, $this->request);
    }

    /**
     * @param $view
     * @param array $params
     * @return false|string
     */
    public function renderView($view, $params = []){
        foreach ($params as $key => $value){
            $$key = $value;
        }
        ob_start();
        require_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }

}