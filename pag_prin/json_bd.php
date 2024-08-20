<?php

include("../bd/conexion_bd.php");

// Array donde se almacenarán los usuarios
$usuarios = array();

// Consultar usuarios
$tabla_connect = "SELECT * FROM `cliente`";
$resultado_tabla = mysqli_query($conexion, $tabla_connect);

// Iterar sobre cada fila obtenida de la consulta
while ($row = $resultado_tabla->fetch_assoc()) {
    $id = $row['id_cliente'];
    $nombre = $row['nombre'];
    $Gmail = $row['Gmail'];

    // Agregar datos al array de usuarios usando el Gmail como clave
    $usuarios[$Gmail] = array(
        "id" => $id,
        "nombre" => $nombre,
        "Gmail" => $Gmail
    );
}

// Array donde se almacenarán los pedidos
$pedidos = array();

// Consultar pedidos
$tabla_connect = "SELECT * FROM `pedido`";
$resultado_tabla = mysqli_query($conexion, $tabla_connect);

// Iterar sobre cada fila obtenida de la consulta
while ($row = $resultado_tabla->fetch_assoc()) {
    $id_pedido = $row['id_pedido'];
    $total = $row['total'];
    $id_cliente = $row['id_cliente'];
    $stock = $row['stock'];

    // Agregar los datos del pedido al array principal
    $pedidos[] = array(
        "id_pedido" => $id_pedido,
        "id_cliente" => $id_cliente,
        "total" => $total,
        "stock" => $stock
    );
}

// Array donde se almacenarán los productos
$productos = array();

// Consultar productos
$tabla_connect = "SELECT * FROM `producto`";
$resultado_tabla = mysqli_query($conexion, $tabla_connect);

// Iterar sobre cada fila obtenida de la consulta
while ($row = $resultado_tabla->fetch_assoc()) {
    $id_producto = $row['id_producto'];
    $nombre_producto = $row['nombre_producto'];
    $stock = $row['stock'];
    $precio = $row['precio'];
    $tipo_producto = $row['tipo_de_producto'];
    $img = $row['imagen'];

    // Agregar los datos del producto al array principal
    $productos[] = array(
        "id_producto" => $id_producto,
        "nombre_producto" => $nombre_producto,
        "stock" => $stock,
        "precio" => $precio,
        "imagen" => $img,
        "tipo_de_producto" => $tipo_producto
    );
}

// Inicializar la variable $pedidos_tiene_producto como un array vacío
$pedidos_tiene_producto = array();

// Consultar la relación entre pedidos y productos
$tabla_connect = "SELECT * FROM `pedido_tiene_producto`";
$resultado_tabla = mysqli_query($conexion, $tabla_connect);

// Iterar sobre cada fila obtenida de la consulta
while ($row = $resultado_tabla->fetch_assoc()) {
    $id_pedido = $row['id_pedido'];
    $id_producto = $row['id_producto'];

    // Agregar los datos del pedido al array principal
    $pedidos_tiene_producto[] = array(
        "id_pedido" => $id_pedido,
        "id_producto" => $id_producto,
    );
}

// Combinar usuarios, pedidos y productos en un array maestro
$master = array(
    "clientes" => $usuarios,
    "pedidos" => $pedidos,
    "pedido_tiene_producto" => $pedidos_tiene_producto,
    "productos" => $productos
);

// Codificar el array maestro en formato JSON
$json_tabla = json_encode($master, true);

// Enviar el JSON como respuesta
echo $json_tabla;

?>
