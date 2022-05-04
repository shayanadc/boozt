<?php


namespace App\Model;


use App\Application;

/**
 * Class Model
 * @package App\Model
 */
abstract class Model
{
    /**
     * @var \PDO
     */
    public \PDO $pdo;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->pdo = Application::$app->db->pdo;

    }

    /**
     * @return $this
     */
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