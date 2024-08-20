<?php

// Función para establecer la conexión a la base de datos
function conexion_bd() {
        include("../bd/conexion_bd.php");
        return $conexion;
}

function campos_correctos($elementos) {

    if (count($elementos) > 2) {
        if (validar_nombre($elementos['nombre']) && validar_email($elementos['Gmail']) && 
            validar_clave($elementos['contraseña_cliente']) && validar_confirmar_clave($elementos['contraseña_cliente'], $elementos['confirmar_clave'])) {
            return true;
        } else {
            return false;
        }
    } else {
        if (validar_email($elementos['Gmail']) && validar_clave($elementos['contraseña_cliente'])) {
            return true;
        } else {
            return false;
        }
    }
}

// Función para verificar si el email existe en la base de datos
function verificar_email($Gmail) {

        $conexion = conexion_bd();

        $consulta = "SELECT * FROM `cliente` WHERE `Gmail` = ?";
        $declaracion = $conexion->prepare($consulta);

        if (!$declaracion) {
            die ("Error en la consulta: " . $conexion->error);
        }

        $declaracion->bind_param('s', $Gmail);

        $declaracion->execute();

        $resultado = $declaracion->get_result();

        if ($resultado->num_rows > 0) {
            
            return true; 
        } else {
            return false; 
        }

}

// Función para verificar si la clave coincide con el email en la base de datos
function verificar_clave($Gmail, $contraseña_cliente) {

        $conexion = conexion_bd();

        $consulta = "SELECT * FROM `cliente` WHERE `Gmail` = ? AND `contraseña_cliente` = ?";
        $declaracion = $conexion->prepare($consulta);

        if (!$declaracion) {
            die ("Error en la consulta: " . $conexion->error);
        }

       
        $declaracion->bind_param('ss', $Gmail, $contraseña_cliente);

        $declaracion->execute();

        $resultado = $declaracion->get_result();

        if ($resultado->num_rows > 0) {
            return true;
        } else {
            return false;
        }

}




function validar_email($Gmail) {
        
    global $error_Gmail;
    if (!preg_match('/^[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]+$/', $Gmail)) {
        $error_Gmail =  "El email no es valido.";
        return false;
    } else {
        return true;
    }
}

function validar_clave($contraseña_cliente) {
        
    global $error_contraseña_cliente;
    if (strlen($contraseña_cliente) < 8 || strlen($contraseña_cliente) > 16) {
        $error_contraseña_cliente =  "La clave no es válida, debe contener entre 8 - 16 dígitos.";
        return false;
    } else {
        return true;
    }
}

function validar_confirmar_clave($contraseña_cliente, $confirmar_clave) {
        
    global $error_c_contraseña_cliente;
    if ($confirmar_clave != $contraseña_cliente) {
        $error_contraseña_cliente =  "La clave no es correcta.";
        return false;
    } else {
        return true;
    }
}
 
function validar_nombre($nombre) {
        
    global $error_nombre;
    if (strlen($nombre) < 4 || strlen($nombre) > 16 || !preg_match('/^[a-zA-Z0-9]/', $nombre)) {
        $error_nombre =  "Solo se aceptan entre 4 - 16 dígitos y solo letras y/o numerales.";
        return false;
    } else {
        return true;
    }
}

?>




