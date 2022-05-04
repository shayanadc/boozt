<?php


namespace App\Services;


use App\QueryBuilder;

/**
 * Class OrderReport
 * @package App\Services
 */
class OrderReport implements Report
{
    /**
     * @param $fromMonth
     * @param $toMonth
     * @param $fromYear
     * @param $toYear
     * @return int|mixed
     */
    public static function get($fromMonth, $toMonth, $fromYear, $toYear)
    {
        $builder = new QueryBuilder();
        return $builder->select('count(id)')->from('orders')
            ->where('MONTH(purchase_date)', '>=', $fromMonth)
            ->andWhere('MONTH(purchase_date)', '<=', $toMonth)
            ->andWhere('YEAR(purchase_date)', '>=', $fromYear)
            ->andWhere('YEAR(purchase_date)', '<=', $toYear)
            ->exec();
    }

}