<?php
// backend/register_process.php
session_start();

require_once '../connections/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitización e ingreso de datos
    $name             = trim($_POST['name'] ?? '');
    $username         = trim($_POST['username'] ?? '');
    $ariasname        = trim($_POST['ariasname'] ?? '');
    $email            = trim($_POST['email'] ?? '');
    $password         = trim($_POST['password'] ?? '');
    $confirm_password = trim($_POST['confirm_password'] ?? '');
    $pista_pass = trim($_POST['pista_pass'] ?? '');

    // Validar campos vacíos
    if (empty($name) || empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        header("Location: ../front/register.php?error=" . urlencode("Todos los campos obligatorios deben ser completados."));
        exit();
    }

    // Validar coincidencia de contraseñas
    if ($password !== $confirm_password) {
        header("Location: ../front/register.php?error=" . urlencode("Las contraseñas no coinciden."));
        exit();
    }

    // Validar formato de e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../front/register.php?error=" . urlencode("El correo electrónico no es válido."));
        exit();
    }

    try {
        // Verificar si el username o email ya existen en la tabla 'users'
        $checkStmt = $pdo->prepare("SELECT uid FROM users WHERE username = :username OR email = :email LIMIT 1");
        $checkStmt->execute([
            'username' => $username,
            'email'    => $email
        ]);

        if ($checkStmt->fetch()) {
            header("Location: ../front/register.php?error=" . urlencode("El usuario o correo electrónico ya se encuentra registrado."));
            exit();
        }

        // Hashear contraseña con bcrypt
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        // Insertar usuario en la base de datos (por defecto adm = 0)
        $insertStmt = $pdo->prepare("
            INSERT INTO users (username, password, pista_pass, email, ariasname, name, adm) 
            VALUES (:username, :password, :pista_pass, :email, :ariasname, :name, 0)
        ");

        $insertStmt->execute([
            'username'   => $username,
            'password'   => $passwordHash,
            'pista_pass' => $pista_pass,
            'email'      => $email,
            'ariasname'  => $ariasname,
            'name'       => $name
        ]);

        // Redireccionar al login tras registro exitoso
        header("Location: ../front/register.php?success=" . urlencode("Usuario registrado correctamente. Ya puede iniciar sesión."));
        exit();

    } catch (\PDOException $e) {
        header("Location: ../front/register.php?error=" . urlencode("Error al guardar el usuario en la base de datos: " . $e->getMessage()));
        exit();
    }

} else {
    header("Location: ../front/register.php");
    exit();
}