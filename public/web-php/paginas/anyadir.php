<div class="container">
    <h1>¿Qué quieres pedir?</h1>

    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="primerplato" class="form-label">Primer Plato</label>
            <input type="text" class="form-control" id="primerplato" name="primerplato" placeholder="¿Qué quiere de primer plato?" required>
        </div>
        <div class="mb-3">
            <label for="segundoplato" class="form-label">Segundo plato</label>
            <input type="texto" class="form-control" id="segundoplato" name="segundoplato" placerholder="¿Qué quiere de segundo plato?" required>
        </div>
        <div class="mb-3">
            <label for="nmesa" class="form-label"> Numero de la mesa </label>
            <input type="number" class="form-control" id="nmesa"name="nmesa" placeholder="Introduzca en que mesa está sentado" >
        </div>
        <button type="submit" class="btn btn-primary">Guardar comanda</button>
    </form>
</div>

<?php

// Configuración de la base de datos
$hostname = "db-mysql";      // Host de la base de datos
$username = "DiegoMartaAS";
$password = "@nOOD23dwdjk92@dmos!mcidcndsdc";
$db = "RestauranteDiegoMarta";

// Crear una conexión a la base de datos
$conn = mysqli_connect($hostname, $username, $password, $db);

// Verificar la conexión
if (!$conn) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha seleccionado un archivo de imagen
	$primerplato = $_POST['primerplato'];
	$segundoplato = $_POST['segundoplato'];
	$nmesa = $_POST['nmesa'];
	
   // Sentencia SQL para insertar en la tabla comandas
	$sql = "INSERT INTO comandas (primerplato, segundoplato, nmesa) VALUES ('$primerplato', '$segundoplato', '$nmesa')";

	if (mysqli_query($conn, $sql)) {
        echo "La comanda ha sido guardada con exito";
    } else {
        echo "Error al guardar la comanda: " . mysqli_error($conn);
    }
}

// Cerrar la conexión
mysqli_close($conn);
?>
