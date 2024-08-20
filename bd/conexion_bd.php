<?php
//Conexion a la Base de datos
$servidor="localhost";
$usuario="root";
$contraseña="";
$base_datos="olimpiadas";

$conexion= mysqli_connect($servidor,$usuario,$contraseña,$base_datos);
     if ($conexion){
        //echo "La base de datos se conecto correctamente";
     }

?>