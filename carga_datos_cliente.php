<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carga de datos Cliente</title>
    <link rel="Stylesheet" href="Style.css">
</head>
<body>

<button onclick="location.href='index.php'">Ir al inicio</button>

<h1 class="texto">Cargar Cliente</h1>

<form action="Funcion_Cliente.php" method="POST">

    <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="">
        <br>

    <label for="nombre">Apellido:</label>
        <input type="text" name="apellido" id="">
        <br>

    <label for="nombre">Dirección: </label>
        <input type="text" name="direccion" id="">
        <br>    

    <label for="nombre">Email: </label>
        <input type="text" name="email" id="">
        <br>
                <button type="submit" value="Submit" name="envio">Cargar</button>

</form>
</body>
</html>