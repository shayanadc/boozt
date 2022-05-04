<?php


class m0001_initial extends \App\Schemas implements \App\CreateTables
{
    public function up() {
        $this->db->pdo->exec("CREATE TABLE users(
            id int NOT NULL AUTO_INCREMENT,
            email VARCHAR(255),
            first_name VARCHAR(255),
            last_name VARCHAR(255),
            created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        )");
    }
    public function down(){
        $this->db->pdo->exec("DROP TABLE users");
    }
}