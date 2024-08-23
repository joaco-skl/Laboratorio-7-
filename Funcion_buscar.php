<?php
    include_once("conexion.php");
    include_once("funcion_prod.php");

    $con = conectar_bd();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        //se toma el código del producto del formulario
        $codigo = $_POST['codigo'];

        //se consultan los datos del producto
        echo consultar_datos($con, $codigo);
    }

    //se cierra la conexión
    $con->close();
    ?>