<?php


namespace App\Services;


class SummaryService
{
    public static $reportClasses = [
            'orders' => OrderReport::class,
            'customers' => CustomerReport::class,
            'revenue' => RevenueReport::class
        ];

    public static function getMany($summaries, $clause){
        $result = [];
        $toMonth = $clause['month']['to'];
        $toYear = $clause['year']['to'];
        $fromYear = $clause['year']['from'];
        $fromMonth = $clause['month']['from'];

        foreach ($summaries as $key => $item){
            $result[$key] = call_user_func_array(
                array(static::$reportClasses[$key], 'get'),
                [$fromMonth, $toMonth, $fromYear, $toYear]
            );
        }
        return $result;

    }
}