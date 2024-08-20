<?php
    session_start();
    if (!isset($_SESSION['id_cliente'])){
        header("location: ../login/log-in.php");
    } else  {
        include("borrar_carrito.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="icon.png" type="image/png">
</head>
<body>
    <header class="encabezado-principal d-flex justify-content-between align-items-center p-3 bg-dark text-white">
        <h1>Carrito de Compra</h1>
        <a href="index.php" class="enlaces">Volver</a>
    </header>
    
    <div class="container-fluid mt-3" >
        <input id="id_cliente" value = "<?php echo $_SESSION['id_cliente'];?>" style="visibility: hidden; position: absolute;">
        <div class="row">
            <section class="col-md-2 col-sm-3 bg-secondary text-white p-3 d-flex flex-md-column flex-sm-row ">
              <h2 id="valor_total">Valor Total:</h2>
              <button class="enviar">Realizar Pedido</button>
            </section>
            <main class="col-10" id="carrito">
                
            </main>
           </div>
    </div>
    
    

    <script src="main.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
</html>
<?php
}
?>