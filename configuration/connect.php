<?php
$envPath = $_SERVER['DOCUMENT_ROOT'] . "/.env";
$envConfig = parse_ini_file($envPath);

if ($envConfig) {
    define('HOST', $envConfig['DB_HOST']);
    define('DBNAME', $envConfig['DB_NAME']);
    define('USER', $envConfig['DB_USER']);
    define('PASS', $envConfig['DB_PASS']);
} else {
    echo "Configure as variáveis de ambiente.";
}

class Connect
{
    public $connection;

    function __construct()
    {
        try {
            $dsn = "mysql:host=" . HOST . ";dbname=" . DBNAME;
            $this->connection = new PDO($dsn, USER, PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
