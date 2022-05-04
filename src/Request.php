<?php


namespace App;


class Request
{
    public function path() :string
    {

        $path = $_SERVER['REQUEST_URI'] ?? '/';

        $position = strpos($path, '?');

        if($position === false){
            return $path;
        }

        return substr($path, 0, $position);

    }
    public function method(): string
    {

        return strtolower($_SERVER['REQUEST_METHOD']);
    }


    public function getQuery(): array {
        $path = $_SERVER['REQUEST_URI'] ?? '/';

        $position = strpos($path, '?');

        if($position === false){
            return [];
        }
        $parsed = parse_url($path, PHP_URL_QUERY);

        parse_str($parsed, $queryStrArr);

        return $queryStrArr;
    }
}