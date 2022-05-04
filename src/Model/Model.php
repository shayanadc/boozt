<?php


namespace App\Model;


use App\Application;

abstract class Model
{
    public \PDO $pdo;
    public function __construct()
    {
        $this->pdo = Application::$app->db->pdo;

    }

    public function save(){
        $table = $this->table;
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);

        $statement = $this->pdo->prepare(
            "INSERT INTO $table (".implode(',', $attributes).") 
                VALUES (".implode(',', $params).")");

        foreach ($attributes as $attribute){
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        $statement->execute();
        $this->id = intval($this->pdo->lastInsertId());
        return $this;
    }
}