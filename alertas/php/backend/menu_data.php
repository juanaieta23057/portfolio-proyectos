<?php
// backend/menu_data.php

// Asumiendo que connection.php inicializa la variable $pdo mediante PDO
require_once '../connections/connection.php';

// Inicializamos arreglos o variables por defecto para evitar errores si falla la consulta
$fechas = [];
$alertascats = [];

// Definición del arreglo auxiliar
$rn = array('C','i','ii','iii','iv','v','vi','vii','viii','ix','x','xi','xii','xiii','xiv','xv','xvi','xvii','xviii','xix','xx','xxi','xxii','xxiii','xxiv','xxv','xxvi','xxvii','xxviii','xxix','xxx','xxx1');

try {
    // 1. Consulta de alertas agrupadas por fecha (equivalente a mysqli_query)
    $stmtFechas = $pdo->query("SELECT * FROM alertas GROUP BY fecha ORDER BY fecha DESC");
    $fechas = $stmtFechas->fetchAll(); // Obtenemos todos los registros como un arreglo asociativo

    // 2. Consulta de categorías de alertas ordenadas por categoría
    $stmtCats = $pdo->query("SELECT * FROM alertascats ORDER BY cat");
    $alertascats = $stmtCats->fetchAll();

} catch (\PDOException $e) {
    // Manejo de errores profesional: puedes registrar el error o inicializar variables vacías
    // Opcionalmente podrías guardar el mensaje de error en una variable para mostrarlo en el front si es necesario
    $error_bd = "Error al cargar los datos del menú: " . $e->getMessage();
}