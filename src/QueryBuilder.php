<?php


namespace App;


/**
 * Class QueryBuilder
 * @package App
 */
class QueryBuilder implements QueryBuilderInterface
{

    /**
     * @var Database
     */
    private Database $db;
    /**
     * @var array
     */
    private $binds = [];
    /**
     * @var null
     */
    private $sql = null;

    /**
     * QueryBuilder constructor.
     */
    public function __construct(){

        $this->db = Application::$app->db;
        $this->sql = null;

    }

    /**
     * @param $field
     * @param $clause
     * @param $value
     * @return $this
     */
    public function where($field, $clause, $value){
        $bind = $field.$clause;
        array_push($this->binds, $value);
        $this->sql .= ' WHERE ' .$field . ' ' . $clause.  ' ?';
        return $this;
    }

    /**
     * @param $field
     * @param $clause
     * @param $value
     * @return $this
     */
    public function andWhere($field, $clause, $value){
        $bind = $field.$clause;
        array_push($this->binds, $value);

        $this->sql .= ' AND ' .$field. ' ' .$clause. '?';
        return $this;
    }

    /**
     * @param $table
     * @return $this
     */
    public function from($table){
        $this->sql .= ' FROM '. $table;
        return $this;
    }

    /**
     * @param $table
     * @param $key
     * @param $fkey
     * @return $this
     */
    public function leftJoin($table, $key, $fkey){
        $this->sql .= ' inner join ' .$table . ' on '.  $key .  ' = ' .$fkey;
        return $this;
    }

    /**
     * @param string $select
     * @return $this
     */
    public function select($select = '*'){

        $this->sql .= 'SELECT ' . $select;
        return $this;
    }

    /**
     * @return int|mixed
     */
    public function exec(){

        $statement = $this->db->pdo->prepare($this->sql);
        foreach ($this->binds as $key => $attribute){

            $statement->bindValue($key+1, $attribute);
        }
        $statement->execute();

        $result = ($statement->fetchAll(\PDO::FETCH_COLUMN))[0] ?? 0;
        return $result;
    }
}