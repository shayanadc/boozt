<?php
namespace App\Controllers;

use App\Application;
use App\Response;

abstract class Controller
{

    public function renderView($views, $params = []){
        return Application::$app->router->renderView($views);
    }
    /**
     * Handle calls to missing methods on the controller.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     *
     * @throws \Exception
     */
    public function __call($method, $parameters)
    {
        throw new \Exception(sprintf(
            'Method %s::%s does not exist.', static::class, $method
        ));
    }
}