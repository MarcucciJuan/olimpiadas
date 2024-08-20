<?php
/*
Tipos de datos en bind_param
    i: Integer (número entero)
    d: Double (número de punto flotante)
    s: String (cadena de caracteres)
    b: Blob (grandes objetos binarios, como archivos)
*/

// Incluir archivos necesarios
include("../bd/conexion_bd.php");
include("../login/funciones_php.php");

$campos_correctos = false;

if (isset($_POST['Registrar'])) {
    if (empty($_POST['nombre']) || empty($_POST['Gmail']) || empty($_POST['contraseña_cliente'])) {
        global $campo_vacio; 
        $campo_vacio = "No se han completado todos los campos";
    } else {

        // Recoger datos del formulario
        $nombre = $_POST['nombre'];
        $Gmail = $_POST['Gmail'];
        $contraseña_cliente = $_POST['contraseña_cliente'];
        $confirmar_clave = $_POST['confirmar_clave'];
        $rol = "cliente";

        $elementos = array(
            "nombre" => $nombre,
            "Gmail" => $Gmail,
            "contraseña_cliente" => $contraseña_cliente,
            "confirmar_clave" => $confirmar_clave
        );

        $campos_correctos = campos_correctos($elementos);

        if ($campos_correctos) {

            // Verificar email válido
            $verificacion = verificar_email($Gmail);

            if ($verificacion) {
                $error_Gmail = "El Email ya fue utilizado";
            } else {
                // Preparar consulta SQL segura
                $consulta = "INSERT INTO `cliente`(`nombre`, `Gmail`, `contraseña_cliente`, `rol_cliente`) VALUES  (?, ?, ?, ?)";
                $declaracion = $conexion->prepare($consulta);

                if ($declaracion === false) {
                    die("Error consulta: " . $conexion->error);
                }

                // Vincular parámetros y ejecutar consulta
                $declaracion->bind_param("ssss", $nombre, $Gmail, $contraseña_cliente, $rol);
                $resultado = $declaracion->execute();

                if ($resultado){
                    header("Location: ../login/log-in.php");
                    exit(); 
                }
               
            }

            // Cerrar conexión
            $conexion->close();

      }
    }
}
?>
