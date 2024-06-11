<?php
// Configuración de la base de datos
$hostname = "db-mysql";      // Host de la base de datos
$username = "DiegoMartaAS";
$password = "@nOOD23dwdjk92@dmos!mcidcndsdc";
$db = "RestauranteDiegoMarta";

$conn = mysqli_connect($hostname, $username, $password, $db);

// Verificar la conexión
if (!$conn) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}

// Verificar si se ha enviado una solicitud para eliminar una comanda
if (isset($_POST['eliminar'])) {
    // Obtener el ID de la comanda a eliminar
    $idComanda = $_POST['eliminar'];

    // Consulta SQL para eliminar la comanda
    $eliminarQuery = "DELETE FROM comandas WHERE id = $idComanda";
    $resultado = mysqli_query($conn, $eliminarQuery);

    // Verificar si la eliminación fue exitosa
    if ($resultado) {
        echo json_encode(["status" => "success", "message" => "Comanda eliminada correctamente"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error al eliminar la comanda"]);
    }
    exit;
}
?>