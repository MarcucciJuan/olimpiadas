<?php

    include("../bd/conexion_bd.php");

    
    if (isset($_POST['carrito'])) { 
        if (!isset($_SESSION['id_cliente'])) {
            header("location: ../login/log-in.php");
            exit;
        } {
        $id_cliente = $_SESSION['id_cliente'];
        $id = $_POST['id_producto'];
        $cantidad = $_POST['selec_cantidad'];

        $tabla_producto = "SELECT  `stock`, `precio` FROM `producto` WHERE id_producto = '$id'";
        $resultado_tabla = mysqli_query($conexion, $tabla_producto);

        if($resultado_tabla){
            $campos = mysqli_fetch_assoc($resultado_tabla);

            if ($campos['stock'] < $cantidad){
            } else{
                $total = $cantidad * $campos['precio'];
                // Al confirmar los datos se inserta el pedido en la BD
                $tabla_pedido= "INSERT INTO `pedido`(`total`, `id_cliente`, `stock`) VALUES ($total, $id_cliente, $cantidad)";
                $resultado  = mysqli_query($conexion, $tabla_pedido);
                    if (!$resultado){
                        die( $resultado.$error );
                    }
                //Obtenemos el id del pedido
                $consulta = "SELECT `id_pedido`FROM `pedido` WHERE id_cliente = '$id_cliente'";
                $resultado_consulta  = mysqli_query($conexion, $consulta);
                    if (!$resultado_consulta){
                        die("Error al obtener el ID del pedido: " . mysqli_error($conexion));
                    }

                $resultado_id_pedido = mysqli_fetch_assoc($resultado_consulta);
                $id_pedido = $resultado_id_pedido['id_pedido'];

                //Inserciona la tabla relacion depedido y producto
                    $tabla_pedido_tiene_producto= "INSERT INTO `pedido_tiene_producto`(`id_pedido`, `id_producto`) VALUES ( $id_pedido, $id)";
                    $resultado_pedido_tiene  = mysqli_query($conexion, $tabla_pedido_tiene_producto);
                        if (!$resultado_pedido_tiene){
                            die( $resultado_pedido_tiene.$error );
                        }
            }
        }

    }
}

?>