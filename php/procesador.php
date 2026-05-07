<?php
require_once 'funciones.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Acceso no permitido.");
}

try {
    // Captura de datos por POST
    $nombre = trim($_POST['nombre'] ?? '');
    $email = trim($_POST['correo'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmar = $_POST['confirm_password'] ?? '';

    // Procesamiento con manejo de excepciones
    $hash = validarRegistro($nombre, $email, $password, $confirmar);

    // HTML de Éxito (Mantiene tu diseño original)
    ?>
    <!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <title>Registro exitoso</title>
        <style>
            body { font-family: 'Segoe UI', system-ui, sans-serif; background: #f3f4f6; text-align: center; padding: 50px; }
            .exito { background: #10b981; color: white; padding: 20px; border-radius: 12px; display: inline-block; max-width: 500px; }
            .hash { background: #fff; color: #374151; padding: 10px; border-radius: 8px; word-break: break-all; font-family: monospace; margin-top: 10px; }
            button { margin-top: 20px; padding: 10px 20px; border: none; background: #fff; color: #10b981; border-radius: 8px; cursor: pointer; font-size: 16px; }
            button:hover { background: #f0fdf4; }
        </style>
    </head>
    <body>
        <div class='exito'>
            <h2>✅ Registro exitoso</h2>
            <p>Bienvenido, <strong><?php echo htmlspecialchars($nombre); ?></strong></p>
            <p>Hash generado:</p>
            <div class='hash'><?php echo htmlspecialchars($hash); ?></div>
            <button onclick='window.history.back()'>← Volver</button>
        </div>
    </body>
    </html>
    <?php

} catch (Exception $e) {
    // HTML de Error (Mantiene tu diseño original)
    $errorMsg = $e->getMessage();
    ?>
    <!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <title>Error en el registro</title>
        <style>
            body { font-family: 'Segoe UI', system-ui, sans-serif; background: #fef2f2; text-align: center; padding: 50px; }
            .error { background: #ef4444; color: white; padding: 20px; border-radius: 12px; display: inline-block; }
            a { color: white; text-decoration: underline; }
        </style>
    </head>
    <body>
        <div class='error'>
            <h2>⚠️ Error en el registro</h2>
            <p><?php echo htmlspecialchars($errorMsg); ?></p>
            <a href='javascript:history.back()'>← Volver al formulario</a>
        </div>
    </body>
    </html>
    <?php
}
?>