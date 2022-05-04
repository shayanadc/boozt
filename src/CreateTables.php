<?php


namespace App;


/**
 * Interface CreateTables
 * @package App
 */
interface CreateTables
{
    /**
     * @return mixed
     */
    public function up();

    /**
     * @return mixed
     */
    public function down();

}