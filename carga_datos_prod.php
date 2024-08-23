<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carga de datos Producto</title>
    <link rel="Stylesheet" href="Style.css">
</head>
<body>

<button onclick="location.href='index.php'">Ir al inicio</button>

<h1 class="texto">Cargar Producto</h1>

<form action="Funcion_prod.php" method="POST">

    <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="">
        <br>

    <label for="precio">Precio:</label>
        <input type="number" name="precio" id="">
        <br>
        <button type="submit" value="Submit" name="envio">Cargar</button>

</form>
</body>
</html>