<?php


namespace App;


class Database
{
    public \PDO $pdo;

    public function __construct($host, $port, $db, $user, $password)
    {
        $this->pdo = new \PDO("mysql:host=$host;port=$port;dbname=$db", $user, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function createMigrationTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations(
            id int NOT NULL AUTO_INCREMENT,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY (id)

            )"
        );
    }

    public function appliedMigration($order = 'asc')
    {
        $sql = 'SELECT migration from migrations order by id ' . $order;

        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }

    public function applyMigrations()
    {
        $this->createMigrationTable();
        $appliedMigrations = $this->appliedMigration();

        $files = array_diff(scandir(Application::$ROOT_DIR . '/migrations'), array(".", ".."));

        $toApplyMigration = array_diff($files, $appliedMigrations);

        foreach ($toApplyMigration as $migration) {

            require_once Application::$ROOT_DIR . '/migrations/' . $migration;
            $classname = pathinfo($migration, PATHINFO_FILENAME);
            $instance = new $classname();
            $instance->up();
        }

        $this->saveMigration($toApplyMigration);
    }

    public function rollBackMigrations()
    {
        $this->createMigrationTable();
        $appliedMigrations = $this->appliedMigration('desc');


        foreach ($appliedMigrations as $migration) {

            require_once Application::$ROOT_DIR . '/migrations/' . $migration;
            $classname = pathinfo($migration, PATHINFO_FILENAME);
            $instance = new $classname();
            $instance->down();
        }

        $this->removeMigration();
    }

    public function removeMigration()
    {
        $stats = $this->pdo->prepare("DROP TABLE migrations");
        $stats->execute();
    }

    public function saveMigration(array $migrations)
    {
        $migrations = implode(',', array_map(fn($m) => "('$m')", $migrations));
        $stats = $this->pdo->prepare("INSERT INTO migrations(migration) VALUES $migrations");
        $stats->execute();
    }

}