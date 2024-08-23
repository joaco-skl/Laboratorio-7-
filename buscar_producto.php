<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Producto</title>
    <link rel="Stylesheet" href="Style.css">
</head>
<body>

<button onclick="location.href='index.php'">Ir al inicio</button>

    <h1 class="texto">Buscar Producto por Código</h1>
    <form method="POST">
        <label for="codigo">Código del Producto:</label>
        <input type="text" id="codigo" name="codigo" required>
        <button type="submit">Buscar</button>
    </form>

    <?php    include("Funcion_buscar.php"); ?>

</body>
</html>
