<?php
include 'database.php';  // Incluir archivo de conexión

// Verificar si los datos llegaron por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreCliente = $_POST['nombre_cliente'];
    $pelicula = $_POST['pelicula'];
    $cantidad = $_POST['cantidad'];
    $total = $_POST['total'];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO compras (nombre_cliente, pelicula, cantidad, total) VALUES ('$nombreCliente', '$pelicula', $cantidad, $total)";
    
    if ($conn->query($sql) === TRUE) {
        echo "Compra realizada con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>
