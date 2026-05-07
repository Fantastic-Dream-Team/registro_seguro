<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Acceso no permitido.");
}

try {
    // 1. Verificar que ningún campo esté vacío
    $nombre = trim($_POST['nombre'] ?? '');
    $email = trim($_POST['correo'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmar = $_POST['confirm_password'] ?? '';

    if (empty($nombre) || empty($email) || empty($password) || empty($confirmar)) {
        throw new Exception("Todos los campos son obligatorios.");
    }

    // 2. Validar solo letras y espacios en nombre completo
    if (!preg_match('/^[a-zA-ZáéíóúñÑÁÉÍÓÚ\s]+$/', $nombre)) {
        throw new Exception("El nombre completo solo debe contener letras y espacios.");
    }

    // 3. Validar formato de correo
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception("El correo electrónico no tiene un formato válido.");
    }

    // 4. Validar longitud mínima de contraseña
    if (strlen($password) < 8) {
        throw new Exception("La contraseña debe tener al menos 8 caracteres.");
    }

    // 5. Validar que contraseña y confirmación coincidan
    if ($password !== $confirmar) {
        throw new Exception("La contraseña y su confirmación no coinciden.");
    }

    // 6. Cifrar contraseña
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // Éxito: mostrar resultado
    echo "<!DOCTYPE html>
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
            <p>Bienvenido, <strong>" . htmlspecialchars($nombre) . "</strong></p>
            <p>Hash de tu contraseña (solo demostración):</p>
            <div class='hash'>" . htmlspecialchars($hash) . "</div>
            <button onclick='window.history.back()'>← Registrar otro usuario</button>
        </div>
    </body>
    </html>";

} catch (Exception $e) {
    $errorMsg = $e->getMessage();
    echo "<!DOCTYPE html>
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
            <p>" . htmlspecialchars($errorMsg) . "</p>
            <a href='javascript:history.back()'>← Volver al formulario</a>
        </div>
    </body>
    </html>";
}
?>