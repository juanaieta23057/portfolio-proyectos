<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Sistema de Alertas</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <div class="login-card wide">
        <h2>Crear Cuenta</h2>
        <p class="subtitle">Ingrese los datos para registrar un nuevo usuario</p>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert-error">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['success'])): ?>
            <div class="alert-success">
                <?php echo htmlspecialchars($_GET['success']); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="../backend/register_process.php">
            
            <div class="form-group">
                <label for="name">Nombre Completo</label>
                <input type="text" id="name" name="name" placeholder="Ej. Juan Pérez" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="username">Usuario</label>
                    <input type="text" id="username" name="username" placeholder="jperez" required>
                </div>
                <div class="form-group">
                    <label for="ariasname">Alias / Nick</label>
                    <input type="text" id="ariasname" name="ariasname" placeholder="Ej. Inspector Zona 1">
                </div>
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" placeholder="juan.perez@dominio.com" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="••••••••" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirmar Contraseña</label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="••••••••" required>
                </div>
            </div>
            <div class="form-group">
                <label for="pista_pass">Pista / Recordatorio de contraseña</label>
                <input type="text" id="pista_pass" name="pista_pass" placeholder="Ej. Nombre de mi primera mascota" required>
            </div>
            <button type="submit" class="btn-submit">Registrar Usuario</button>
        </form>

        <div class="auth-links">
            ¿Ya tienes una cuenta? <a href="login.php">Iniciar Sesión</a>
        </div>
    </div>

</body>
</html>