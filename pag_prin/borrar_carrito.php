<?php
    include("../bd/conexion_bd.php");

    if (isset($_POST['borrar_carrito'])) {
        $id = $_POST['id'];

        $borrar = "DELETE FROM `pedido` WHERE id_pedido = '$id'";
        $resultado =  mysqli_query($conexion, $borrar);

        if (!$resultado){
            die("Error al borrar pedido: " . mysqli_error($conexion));
        } else {
            header("location: carrito.php");
            exit;
        }
    }

?>