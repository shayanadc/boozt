<?php


namespace App;


class QueryBuilder implements QueryBuilderInterface
{

    private Database $db;
    private $binds = [];
    private $sql = null;
    public function __construct(){

        $this->db = Application::$app->db;
        $this->sql = null;

    }
    public function where($field, $clause, $value){
        $bind = $field.$clause;
        array_push($this->binds, $value);
        $this->sql .= ' WHERE ' .$field . ' ' . $clause.  ' ?';
        return $this;
    }
    public function andWhere($field, $clause, $value){
        $bind = $field.$clause;
        array_push($this->binds, $value);

        $this->sql .= ' AND ' .$field. ' ' .$clause. '?';
        return $this;
    }
    public function from($table){
        $this->sql .= ' FROM '. $table;
        return $this;
    }

    public function leftJoin($table, $key, $fkey){
        $this->sql .= ' inner join ' .$table . ' on '.  $key .  ' = ' .$fkey;
        return $this;
    }
    public function select($select = '*'){

        $this->sql .= 'SELECT ' . $select;
        return $this;
    }
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