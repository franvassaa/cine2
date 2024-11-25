<?php
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $basededatos = "cine2";

    $enlace = mysqli_connect($servidor, $usuario, $clave, $basededatos);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elección de Butacas</title>
</head>
<body>
    <!-- Formulario para seleccionar butacas y realizar la compra -->
    <form action="eleccion_butacas.php" method="POST">
        <label for="nombre_cliente">Nombre:</label>
        <input type="text" id="nombre_cliente" name="nombre_cliente" required><br>

        <label for="pelicula">Película:</label>
        <input type="text" id="pelicula" name="pelicula" required><br>

        <label for="tipo_entrada">Tipo de entrada:</label>
        <select id="tipo_entrada" name="tipo_entrada" required>
            <option value="menor">Menor de edad</option>
            <option value="jubilado">Jubilado</option>
            <option value="mayor">Mayor de edad</option>
        </select><br>

        <label for="cantidad_butacas">Cantidad de butacas:</label>
        <input type="number" id="cantidad_butacas" name="cantidad_butacas" required><br>

        <label for="metodo_pago">Método de pago:</label>
        <select id="metodo_pago" name="metodo_pago" required>
            <option value="mastercard">Mastercard</option>
            <option value="visa">Visa</option>
            <option value="mercadopago">Mercado Pago</option>
        </select><br>

        <input type="submit" name="registro" value="Comprar">
    </form>

<?php
    if (isset($_POST['registro'])) {
        // Recibir datos del formulario
        $nombre_cliente = $_POST["nombre_cliente"];
        $pelicula = $_POST["pelicula"];
        $tipo_entrada = $_POST["tipo_entrada"];
        $cantidad_butacas = $_POST["cantidad_butacas"];
        $metodo_pago = $_POST["metodo_pago"];

        // Calcular el total según el tipo de entrada
        switch ($tipo_entrada) {
            case "menor":
                $total = $cantidad_butacas * 30;
                break;
            case "jubilado":
                $total = $cantidad_butacas * 50;
                break;
            case "mayor":
                $total = $cantidad_butacas * 100;
                break;
            default:
                $total = 0;
        }

        // Insertar datos en la base de datos
        $insertarDatos = "INSERT INTO datos (nombre_cliente, pelicula, tipo_entrada, cantidad_butacas, metodo_pago, total) 
                          VALUES ('$nombre_cliente', '$pelicula', '$tipo_entrada', '$cantidad_butacas', '$metodo_pago', '$total')";

        // Ejecutar la consulta
        $ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

        if ($ejecutarInsertar) {
            echo "Compra realizada con éxito.";
        } else {
            echo "Error al realizar la compra: " . mysqli_error($enlace);
        }
    }
?>

</body>
</html>
