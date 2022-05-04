<?php


class m0003_initial extends \App\Schemas implements App\CreateTables
{
    public function up(){
        $this->db->pdo->exec("CREATE TABLE items(
            id int NOT NULL AUTO_INCREMENT,
            ean VARCHAR(255),
            qty int,
            price DECIMAL(5 , 2),
            order_id int,
            PRIMARY KEY (id),
            FOREIGN KEY (order_id)
            REFERENCES orders (id)
            ON DELETE CASCADE

        )");
    }
    public function down(){
        $this->db->pdo->exec("DROP TABLE items");
    }
}