<?php
require_once 'env.php';

try {
    // Connect to mysql server without db selected first
    $pdo = new PDO(
        "mysql:host=" . DBHOST . ";charset=" . DBCHARSET,
        DBUSER,
        DBPASS,
        [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . DBCHARSET,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    );
    
    $sql = file_get_contents('database.sql');
    
    // Remove comments and split statements
    // A simple split by semicolon
    // First, let's just execute the queries
    $pdo->exec($sql);
    
    echo "Database imported successfully with UTF-8 encoding!";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
