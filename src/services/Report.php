<?php


namespace App\Services;


interface Report
{
    public static function get($fromMonth, $toMonth, $fromYear, $toYear);

}