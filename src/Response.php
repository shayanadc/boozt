<?php


namespace App;


class Response
{
    public static function json($array, $status = 200){
        if(getenv('APP') !== 'test'){
            header('Content-Type: application/json; charset=utf-8');
            header("Access-Control-Allow-Origin: *");
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Max-Age: 86400');
        }


        http_response_code($status);

        return json_encode($array);
    }
}