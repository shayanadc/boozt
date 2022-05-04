<?php

namespace App;

interface QueryBuilderInterface
{
    public function where($field, $clause, $value);

    public function andWhere($field, $clause, $value);

    public function from($table);

    public function leftJoin($table, $key, $fkey);

    public function select($select = '*');

    public function exec();
}