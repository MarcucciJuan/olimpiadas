<?php
include('funciones_php.php');
include('../bd/conexion_bd.php');

$error_login = "";

if ($_POST) {
    if (empty($_POST['Gmail']) || empty($_POST['contraseña_cliente'])) {
        $error_login = "No se han completado todos los campos";
    } else {
        $Gmail = $_POST['Gmail'];
        $contraseña_cliente = $_POST['contraseña_cliente'];
    
        $elementos = array(
            "Gmail" => $Gmail,
            "contraseña_cliente" => $contraseña_cliente,
        );

        // Supongo que `campos_correctos` es una función que valida los campos
        $campos_correctos = campos_correctos($elementos);

        if ($campos_correctos) {
            $consulta = "SELECT * FROM cliente WHERE Gmail='$Gmail' AND contraseña_cliente='$contraseña_cliente'";
            $resultado = mysqli_query($conexion, $consulta);
    
            if (mysqli_num_rows($resultado) > 0) {
                $row = mysqli_fetch_assoc($resultado);
                $_SESSION['id_cliente'] = $row['id_cliente']; // Cambiado a corchetes
                header("Location: ../pag_prin/index.php");
                exit(); 
            } else {
                $error_login = "Correo o contraseña incorrectos";
            }
        } else {
            $error_login = "Los campos no son válidos";
        }
    }
}

         
         
    

 



?>