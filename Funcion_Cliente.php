<?php

require("conexion.php");

$con = conectar_bd();

// Comprobar que se envió un formulario por POST desde carga_datos
if (isset($_POST["envio"])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $direccion = $_POST["direccion"];
    $email = $_POST["email"];
    
   
    insertar_datos($con, $nombre, $apellido, $direccion, $email);
}

function insertar_datos($con, $nombre, $apellido, $direccion, $email) {
    // Concatenar nombre y apellido para obtener el nombre completo
    $nombreCompleto = $nombre . ' ' . $apellido;

    // Consulta SQL para insertar datos en la tabla Cliente
    $consulta_insertar = "INSERT INTO Cliente (Nombre_C, Direccion, Email) 
                          VALUES ('$nombreCompleto', '$direccion', '$email')";

    if (mysqli_query($con, $consulta_insertar)) {
        // Si la inserción fue exitosa, consultar y mostrar los datos
        $salida = consultar_datos($con);
        echo $salida;
    } else {
        echo "Error: " . $consulta_insertar . "<br>" . mysqli_error($con);
    }
}

function consultar_datos($con) {
    // Consulta SQL para seleccionar todos los registros de la tabla Cliente
    $consulta = "SELECT DISTINCT * FROM Cliente";
    
    $resultado = mysqli_query($con, $consulta);
   
    // Inicializo una variable para guardar los resultados
    $salida = "";
   
    // Si se recupera algún registro de la consulta
    if (mysqli_num_rows($resultado) > 0) {
        // Mientras haya registros..
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $salida .= "Cod_cli: " . $fila["Cod_cli"] . " - Nombre: " . $fila["Nombre_C"] . " - Dirección: " . $fila["Direccion"] . " - Email: " . $fila["Email"] . "<br><hr>";
        }
    } else {
        $salida = "Sin datos ";
    }

    return $salida;
}

// Ejecutar la consulta y cerrar la conexión
$salida = consultar_datos($con);
mysqli_close($con);   


?>
