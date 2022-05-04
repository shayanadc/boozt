<?php


namespace App\Services;


use App\QueryBuilder;

class CustomerReport implements Report
{
    public static function get($fromMonth, $toMonth, $fromYear, $toYear)
    {
        $builder = new QueryBuilder();

        return $builder->select('count(id)')->from('users')
            ->where('MONTH(created_at)', '>=', $fromMonth)
            ->andWhere('MONTH(created_at)', '<=', $toMonth)
            ->andWhere('YEAR(created_at)', '>=', $fromYear)
            ->andWhere('YEAR(created_at)', '<=', $toYear)
            ->exec();
    }

}