<?php
include_once("conexion.php");

$con = conectar_bd();

if (isset($_POST["envio"])) {
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
   
    insertar_datos($con, $nombre, $precio);
}

function insertar_datos($con, $nombre, $precio) {
    
    // Consulta SQL para insertar datos en la tabla Producto
    $consulta_insertar = "INSERT INTO Producto (Nombre, Precio) VALUES ('$nombre', '$precio')";

    if (mysqli_query($con, $consulta_insertar)) {
        // Si la inserción está bien, consultar y mostrar los datos
        $salida = consultar_datos($con);
        echo $salida;
    } else {
        echo "Error: " . $consulta_insertar . "<br>" . mysqli_error($con);
    }
}

function consultar_datos($con, $busqueda = '') {

    if ($busqueda != '') {
        $consulta = "SELECT * FROM Producto WHERE Cod_P = '$busqueda'";
    } else {
        $consulta = "SELECT * FROM Producto";
    }
    
    $resultado = mysqli_query($con, $consulta);
   
    //variable que guarda resultados
    $salida = "";
   
    // Si se recupera algún registro de la consulta
    if (mysqli_num_rows($resultado) > 0) {
        
        // Mientras haya registros..
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $salida .= "<div class='producto'>";
            $salida .= "<h3>ID: " . htmlspecialchars($fila["Cod_P"]) . " - " . htmlspecialchars($fila["Nombre"]) . "</h3>";
            $salida .= "<p>Precio: $" . htmlspecialchars($fila["Precio"]) . "</p>";

            //obtener detalles del producto
            $id_producto = $fila["Cod_P"];
            $consultaDetalles = "SELECT * FROM Detalle WHERE Cod_P = '$id_producto'";
            $resultadoDetalles = mysqli_query($con, $consultaDetalles);
            
            //mostrar los detalles del producto
            if (mysqli_num_rows($resultadoDetalles) > 0) {
                $salida .= "<div class='detalles'>";
                while ($detalle = mysqli_fetch_assoc($resultadoDetalles)) {
                    $salida .= "<p>Origen: " . htmlspecialchars($detalle["Origen"]) . "</p>";
                    $salida .= "<p>Descripción: " . htmlspecialchars($detalle["Descripcion"]) . "</p>";
                }
                $salida .= "</div>";
            } else {
                $salida .= "<p>Sin detalles disponibles para este producto.</p>";
            }

            $salida .= "</div><hr>";
        }
    } else {
        $salida = "<p>No se encontraron productos con ese código.</p>";
    }

    return $salida;
}
?>
