<?php

// Utilitaire pour initialiser un objet PDO (PHP Data Object) qui donne accès à une base de données
class PdoWrapper {

    public function __construct($bd) {
        $host = 'localhost';
        $port = 3307;  // MariaDB avec Wamp server
        $charset = 'utf8mb4';
        // Data Source Name
        $dsn = "mysql:host=$host;port=$port;dbname=$bd;charset=$charset";

        $user = 'root';
        $pwd = '';

        $options = [
            PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC  // Les résultats seront sous forme de tableaux associatifs
        ];

        $this->pdo = new PDO($dsn, $user, $pwd, $options);
    }

    public function getPdo() {
        return $this->pdo;
    }

    private PDO $pdo;
}

?>
