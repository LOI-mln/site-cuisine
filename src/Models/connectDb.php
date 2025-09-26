<?php
// src/Models/connectDb.php
try {
    $host = "localhost";
    $dbname = "lacosina";
    $user = "root";
    $password = "root"; 

    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $user,
        $password,
        [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ]
    );
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
