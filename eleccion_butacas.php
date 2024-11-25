<?php
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $basededatos = "cine2";

    $enlace = mysqli_connect($servidor, $usuario, $clave, $basededatos );

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="procesar_compra.php" method="POST">
        <label for="nombre_cliente">Nombre:</label>
        <input type="text" id="nombre_cliente" name="nombre_cliente" required><br>
        <label for="pelicula">Pelicula:</label>
        <input type="text" id="pelicula" name="pelicula" required><br>
        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" required><br>
        <label for="total">Total:</label>
        <input type="text" id="total" name="total" required><br>
        <input type="submit" value="Comprar">
    </form>

</body>
</html>

<?php
    if (isset($_POST['registro'])){
        $tipo_entrada = $_POST ["tipo_entrada"];
        $cantidad_butacas = $_POST ["cantidad_butacas"];
        $metodo_pago = $_POST ["metodo_pago"];

        $insertarDatos = "INSERT INTO datos VALUES ('$tipo_entrada', '$cantidad_butacas', '$metodo_pago', '')";

        $ejecutarInsertar = mysqli_query ($enlace, $insertarDatos);
    }

?>