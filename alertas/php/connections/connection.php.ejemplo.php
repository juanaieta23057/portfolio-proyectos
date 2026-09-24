<?php
// Connections/connection.php

$host = 'localhost';
$dbname = 'jja'; // 
$username = 'root'; // 
$password = 'TU CONTRASEÑA';     // 
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Manejo de errores mediante excepciones
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Devuelve los resultados como arrays asociativos
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Consultas preparadas reales para evitar SQL Injection
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (\PDOException $e) {
    // En entorno de desarrollo mostramos el error; en producción se debe guardar en un log
    die("Error al conectar con la base de datos: " . $e->getMessage());
}
?>