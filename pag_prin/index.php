<?php
    session_start();
    include("cargar_carrito.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <script src="main.js" defer></script>
    <link rel="icon" href="icon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header class="encabezado-principal d-flex justify-content-between align-items-center p-3 bg-dark text-white">
        <h1>(Título)</h1>
        <a href="carrito.php" class="ms-auto me-4">
            <i class="fa-solid fa-cart-shopping"></i>
        </a>
        <a href="../login/cerrar_sesion.php">
            <img src="../img/Foto-perfil.jpg" alt="Foto de perfil" title="foto de perfil" class="foto-perfil">
        </a>
    </header>

    <div class="container-fluid">
        <div class="row">
        <section class="col-md-2 col-sm-3 bg-secondary text-white p-3 d-flex flex-md-column flex-sm-row " id="barra">
            <button class="clasificacion">Pelotas</button>
            <button class="clasificacion">Ropa</button>
            <button class="clasificacion">Zapatillas</button>
            <button class="clasificacion">Bicicletas</button>
            <button class="clasificacion">Otros</button>
        </section>
    

<main class="col-md-10 mt-3">
    <div class="row g-4" id="publicaciones"></div>
    <div class="container mt-4">
        <div class="row publicacion-bg" id="producto-detalle"></div>
    
</main>
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>