<?php
/**
 * Valida los datos del formulario y retorna el hash de la contraseña.
 */
function validarRegistro($nombre, $email, $password, $confirmar) {
    // 1. Verificar que ningún campo esté vacío
    if (empty($nombre) || empty($email) || empty($password) || empty($confirmar)) {
        throw new Exception("Todos los campos son obligatorios.");
    }

    // 2. Validar solo letras y espacios en nombre completo
    if (!preg_match('/^[a-zA-ZáéíóúñÑÁÉÍÓÚ\s]+$/', $nombre)) {
        throw new Exception("El nombre completo solo debe contener letras y espacios.");
    }

    // 3. Validar formato de correo (filter_var)
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

    // Retornar hash si todo es correcto
    return password_hash($password, PASSWORD_DEFAULT);
}