<?php


namespace App\Services;


/**
 * Interface Report
 * @package App\Services
 */
interface Report
{
    /**
     * @param $fromMonth
     * @param $toMonth
     * @param $fromYear
     * @param $toYear
     * @return mixed
     */
    public static function get($fromMonth, $toMonth, $fromYear, $toYear);

}