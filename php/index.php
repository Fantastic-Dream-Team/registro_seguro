<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <div class="registro-container">
        <h2>Crear Cuenta</h2>
        
        <form action="" method="POST" id="registroForm">
            
            <div class="form-group">
                <label for="nombre">Nombre completo</label>
                <input type="text" id="nombre" name="nombre" required pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" title="Solo se permiten letras y espacios">
            </div>

            <div class="form-group">
                <label for="correo">Correo electrónico</label>
                <input type="email" id="correo" name="correo" required placeholder="ejemplo@correo.com">
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required minlength="8" title="Debe contener al menos 8 caracteres">
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirmar contraseña</label>
                <input type="password" id="confirm_password" name="confirm_password" required minlength="8">
            </div>

            <button type="submit" class="btn-submit">Registrarse</button>
        </form>
    </div>

    <script>
        const password = document.getElementById("password");
        const confirm_password = document.getElementById("confirm_password");

        function validarPasswords() {
            if (password.value !== confirm_password.value) {
                confirm_password.setCustomValidity("Las contraseñas no coinciden");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validarPasswords;
        confirm_password.onkeyup = validarPasswords;
    </script>

</body>
</html>