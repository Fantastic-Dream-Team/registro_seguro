<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <style>
        :root {
            --primary-color: #10b981; /* Un verde moderno y elegante */
            --primary-hover: #059669;
            --bg-color: #f3f4f6;
            --text-color: #374151;
            --border-color: #d1d5db;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .registro-container {
            background-color: #ffffff;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 400px;
        }

        .registro-container h2 {
            margin-top: 0;
            margin-bottom: 1.5rem;
            text-align: center;
            color: #111827;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
        }

        .btn-submit {
            width: 100%;
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.875rem;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 1rem;
        }

        .btn-submit:hover {
            background-color: var(--primary-hover);
        }
    </style>
</head>
<body>

    <div class="registro-container">
        <h2>Crear Cuenta</h2>
        
        <form action="procesador.php" method="POST" id="registroForm">
            
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