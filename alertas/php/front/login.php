<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Sistema de Alertas</title>
    <!-- Vinculación del archivo CSS -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <div class="login-card">
        <h2>Sistema de Alertas</h2>
        <p class="subtitle">Ingrese sus credenciales de acceso</p>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert-error">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="../backend/login_process.php">
            <div class="form-group">
                <label for="username">Usuario o Email</label>
                <input type="text" id="username" name="username" placeholder="Ej. usuario@dominio.com" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn-submit">Ingresar</button>
        </form>
        <div class="auth-links">
            <a href="recover.php">¿Olvidaste tu contraseña?</a>
            <br><br>
            ¿No tienes cuenta? <a href="register.php">Registrarse</a>
        </div>
    </div>
</body>
</html>