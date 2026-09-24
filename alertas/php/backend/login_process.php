<?php
// backend/login_process.php
session_start();

// Incluimos la conexión relativa a la carpeta Connections
require_once '../connections/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_input = trim($_POST['username'] ?? '');
    $pass_input = trim($_POST['password'] ?? '');

    if (!empty($user_input) && !empty($pass_input)) {
        try {
            // Consulta a la tabla users
            $stmt = $pdo->prepare("SELECT uid, username, password, name, adm FROM users WHERE username = :user OR email = :email LIMIT 1");
            //aca uso dos marcadores distintos para evitar que PDO lance un error
            $stmt->execute([
                'user'  => $user_input,
                'email' => $user_input
            ]);
            $user = $stmt->fetch();

            if ($user && (password_verify($pass_input, $user['password']) || $pass_input === $user['password'])) {
                // Credenciales correctas: guardar sesión
                $_SESSION['user_id']  = $user['uid'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['name']     = $user['name'];
                $_SESSION['is_admin'] = $user['adm'];

                // Redirigir al panel principal
                header("Location: ../front/dashboard.php");
                exit();
            } else {
                // Credenciales incorrectas
                header("Location: ../front/login.php?error=" . urlencode("Usuario o contraseña incorrectos."));
                exit();
            }
        } catch (\PDOException $e) {
            header("Location: ../front/login.php?error=" . urlencode("Error de BD: " . $e->getMessage()));
            exit();
        }
    } else {
        header("Location: ../front/login.php?error=" . urlencode("Por favor, complete todos los campos."));
        exit();
    }
} else {
    // Si intentan ingresar por GET sin enviar formulario
    header("Location: ../front/login.php");
    exit();
}