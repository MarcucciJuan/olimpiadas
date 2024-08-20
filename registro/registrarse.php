<?php
    $error_nombre ="";
    $error_Gmail ="";
    $error_contraseña_cliente ="";
    $error_c_contraseña_cliente ="";
    $campo_vacio = "";
    include("registro.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../pag_prin/styles.css">
    <link rel="icon" href="icon.png" type="image/png">
</head>
<body>
    <header class="login-header bg-dark text-white p-3">
        <h1>(Título)</h1>
    </header>

    <section class="login-nav d-flex justify-content-center bg-secondary py-2">
        <a href="../pag_prin/index.php" class="enlaces">Volver al Inicio</a>
        <a href="../login/log-in.php" class="enlaces">Ya tengo una Cuenta</a>
    </section>

    <main class="login-main d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="login-container card p-4 shadow-lg">
            <h2 class="text-center registrarse-heading">Registrarse</h2>

            <form  method="post" class="registrarse-form">

                <div class="form-group login-form-group">
                    <label for="nombre" class="login-label">Nombre:</label>
                    <input type="name" id="nombre" name="nombre"  class="form-control login-input" required>
                        <div id="error_nombre"> <?php echo $GLOBALS['error_nombre']; ?></div>
                </div>

                <div class="form-group login-form-group">
                    <label for="Gmail" class="login-label">Correo Electrónico:</label>
                    <input type="Gmail" id="Gmail" name="Gmail"  class="form-control login-input" required>
                    <div id="error_Gmail"><?php echo $GLOBALS['error_Gmail']; ?></div>
                </div>

                <div class="form-group login-form-group">
                    <label for="contraseña_cliente" class="login-label">Contraseña:</label>
                    <input type="password" id="contraseña_cliente" name="contraseña_cliente" class="form-control login-input" required>
                    <div id="error_contraseña_cliente"><?php echo $GLOBALS['error_contraseña_cliente'];?></div>

                </div>

                <div class="form-group login-form-group">
                    <label for="confirmar_clave" class="login-label">Repetir Contraseña:</label>
                    <input type="password" id="confirmar_clave" name="confirmar_clave" class="form-control login-input" required>
                    <div class="error" id="error_c_contraseña_cliente"><?php echo $GLOBALS['error_c_contraseña_cliente'];?></div>
                </div>

                <button type="submit" class="enviar" name="Registrar">Crear Cuenta</button>
            </form>

        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
