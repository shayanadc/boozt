<?php


namespace App;


class Fixture
{

    public static function create($class, $array){
        $user = new $class;
        foreach ($array as $key => $item){
            $user->{$key} = $item;
        }
        return $user->save();
    }

}