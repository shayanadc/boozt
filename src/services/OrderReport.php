<?php


namespace App\Services;


use App\QueryBuilder;

class OrderReport implements Report
{
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