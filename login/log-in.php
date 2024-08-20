<?php
$error_Gmail ="";
$error_contraseña_cliente ="";
$campo_vacio = "";
$error_login = "";
session_start();

include('login.php');
?>

<!DOCTYPE >
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../pag_prin/styles.css">
</head>
<body class="login-body">
    <header class="login-header bg-dark text-white p-3">
        <h1 class="text-center login-title">Título</h1>
    </header>

    <section class="login-nav d-flex justify-content-center bg-secondary py-3">
        <a href="../pag_prin/index.php" class="login-link text-white mx-3">Inicio</a>
        <a href="../registro/registrarse.php" class="login-link text-white mx-3">Registrarse</a>
    </section>

    <main class="login-main d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="login-container card p-4 shadow-lg">
            <h2 class="text-center login-heading">Iniciar Sesión</h2>

            <form  method="post" class="login-form">

                <div class="form-group login-form-group">
                    <label for="Gmail" class="login-label">Correo Electrónico</label>
                    <input type="Gmail" id="Gmail" name="Gmail" class="form-control login-input" required>
                    <p><?php echo $GLOBALS['error_Gmail'];?></p>
                </div>

                <div class="form-group login-form-group">
                    <label for="password" class="login-label">Contraseña</label>
                    <input type="password" id="contraseña_cliente" name="contraseña_cliente" class="form-control login-input" required>
                    <p><?php echo $GLOBALS['error_contraseña_cliente'];?></p>
                    <p><?php echo $campo_vacio;?></p>
                    <p><?php echo $error_login; ?></p>
                </div>

                <button type="submit" class="enviar">Ingresar</button>
            </form>
        </div>
    </main>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
