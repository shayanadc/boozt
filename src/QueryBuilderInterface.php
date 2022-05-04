<?php

namespace App;

/**
 * Interface QueryBuilderInterface
 * @package App
 */
interface QueryBuilderInterface
{
    /**
     * @param $field
     * @param $clause
     * @param $value
     * @return mixed
     */
    public function where($field, $clause, $value);

    /**
     * @param $field
     * @param $clause
     * @param $value
     * @return mixed
     */
    public function andWhere($field, $clause, $value);

    /**
     * @param $table
     * @return mixed
     */
    public function from($table);

    /**
     * @param $table
     * @param $key
     * @param $fkey
     * @return mixed
     */
    public function leftJoin($table, $key, $fkey);

    /**
     * @param string $select
     * @return mixed
     */
    public function select($select = '*');

    /**
     * @return mixed
     */
    public function exec();
}