<?php
namespace App\Controllers;

abstract class Controller
{
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