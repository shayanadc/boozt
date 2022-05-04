<?php



class m0002_initial extends \App\Schemas implements \App\CreateTables
{
    public function up(){
        $this->db->pdo->exec("CREATE TABLE orders(
            id int NOT NULL AUTO_INCREMENT,
            purchase_date DATETIME,
            country VARCHAR(255),
            device VARCHAR(255),
            user_id int,
            PRIMARY KEY (id),
            FOREIGN KEY (user_id)
            REFERENCES users (id)
            ON DELETE CASCADE

        )");
    }
    public function down(){
        $this->db->pdo->exec("DROP TABLE orders");
    }
}