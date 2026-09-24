<?php
// backend/recover_process.php
session_start();

require_once '../connections/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_input = trim($_POST['user_input'] ?? '');

    if (empty($user_input)) {
        header("Location: ../front/recover.php?error=" . urlencode("Por favor, ingrese un usuario o correo."));
        exit();
    }

    try {
        // Consultar el usuario en la tabla users
        $stmt = $pdo->prepare("SELECT username, pista_pass FROM users WHERE username = :user OR email = :user LIMIT 1");
        $stmt->execute(['user' => $user_input]);
        $user = $stmt->fetch();

        if ($user) {
            if (!empty($user['pista_pass'])) {
                $mensaje = "Pista para el usuario '" . htmlspecialchars($user['username']) . "': " . htmlspecialchars($user['pista_pass']);
            } else {
                $mensaje = "El usuario no registró ninguna pista de contraseña.";
            }

            header("Location: ../front/recover.php?info=" . urlencode($mensaje));
            exit();
        } else {
            header("Location: ../front/recover.php?error=" . urlencode("No se encontró ningún usuario con esos datos."));
            exit();
        }

    } catch (\PDOException $e) {
        header("Location: ../front/recover.php?error=" . urlencode("Error al procesar la solicitud."));
        exit();
    }

} else {
    header("Location: ../front/recover.php");
    exit();
}