<?php
namespace ClassName;

require __DIR__ . '/../../vendor/autoload.php';

class Database {
    protected $conn;
    private $dotenv;
    private $dbname;
    private $username;
    private $password;
    
    public function __construct() {
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . "/../../../");
        $dotenv->load();
        $dbname = getenv("MYSQL_DATABASE");
        $username = getenv("MYSQL_USER");
        $password = getenv("MYSQL_PASSWORD");

        // require_once(__DIR__ . "/../mySQLdatabase/database_credentials.php");

        try {
            $this->conn = new \PDO(
                "mysql:host=mysql:3306;dbname={$dbname}",
                $username,
                $password,
                array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION)
            );
        } catch (\PDOException $e) {
            echo "Error: ". $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}

// $test = new Database();
// var_dump($test->getConnection());
