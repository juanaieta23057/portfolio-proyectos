<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña - Sistema de Alertas</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <div class="login-card">
        <h2>¿Olvidaste tu contraseña?</h2>
        <p class="subtitle">Ingresa tu usuario o correo electrónico para obtener asistencia</p>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert-error">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['info'])): ?>
            <div class="alert-success">
                <?php echo htmlspecialchars($_GET['info']); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="../backend/recover_process.php">
            <div class="form-group">
                <label for="user_input">Usuario o Email</label>
                <input type="text" id="user_input" name="user_input" placeholder="Ej. jperez o usuario@dominio.com" required>
            </div>

            <button type="submit" class="btn-submit">Consultar recordatorio</button>
        </form>

        <div class="auth-links">
            <a href="login.php">Volver al inicio de sesión</a>
        </div>
    </div>

</body>
</html>