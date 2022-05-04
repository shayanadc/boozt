<?php


namespace App\Services;


use App\QueryBuilder;

class RevenueReport implements Report
{
    public static function get($fromMonth, $toMonth, $fromYear, $toYear)
    {
        $builder = new QueryBuilder();

        return $builder->select('sum(items.price)')->from('items')
            ->leftJoin('orders', 'items.order_id', 'orders.id')
            ->where('MONTH(purchase_date)', '>=', $fromMonth)
            ->andWhere('MONTH(purchase_date)', '<=', $toMonth)
            ->andWhere('YEAR(purchase_date)', '>=', $fromYear)
            ->andWhere('YEAR(purchase_date)', '<=', $toYear)
            ->exec();
    }

}