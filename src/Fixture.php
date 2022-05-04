<?php


namespace App;


/**
 * Class Fixture
 * @package App
 */
class Fixture
{

    /**
     * @param $class
     * @param $array
     * @return mixed
     */
    public static function create($class, $array){
        $user = new $class;
        foreach ($array as $key => $item){
            $user->{$key} = $item;
        }
        return $user->save();
    }

}