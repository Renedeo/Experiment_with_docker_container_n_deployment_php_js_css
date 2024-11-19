<?php
require __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../../../");
$dotenv->load();

$dbname = getenv("MYSQL_DATABASE");
$username = getenv("MYSQL_USER");
$password = getenv("MYSQL_PASSWORD");

$conn = new \PDO(
    "mysql:host=mysql:3306;dbname=$dbname",
    $username,
    $password,
    array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION)
);