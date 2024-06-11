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

// Consulta SQL para obtener las comandas
$query = mysqli_query($conn, "SELECT id, primerplato, segundoplato, nmesa FROM comandas");

// Verificar si la consulta fue exitosa
if ($query) {
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Comandas</title>
        <!-- Incluir jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            // Función para eliminar una comanda
            function eliminarComanda(idComanda) {
                if (confirm("¿Estás seguro de que quieres eliminar esta comanda?")) {
                    // Enviar la solicitud AJAX para eliminar la comanda
                    $.post("paginas/eliminar_comanda.php", { eliminar: idComanda }, function(data) {
                        var response = JSON.parse(data);
                        if (response.status === "success") {
                            alert(response.message);
                            // Recargar la tabla de comandas
                            $("#comandasTable").load(location.href + " #comandasTable>*", "");
                        } else {
                            alert(response.message);
                        }
                    });
                }
            }
        </script>
    </head>
    <body>
    <div class="container">
        <h1>Comandas</h1>

        <table class="table table-bordered" id="comandasTable">
            <thead class="thead-dark">
                <tr>
                    <th>Primer Plato</th>
                    <th>Segundo Plato</th>
                    <th>Numero de mesa</th>
                    <th>Acciones</th> <!-- Nueva columna para los botones de eliminar -->
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<tr>";
                    echo "<td>" . $row["primerplato"] . "</td>";
                    echo "<td>" . $row["segundoplato"] . "</td>";
                    echo "<td>" . $row["nmesa"] . "</td>";
                    echo "<td>
                            <button type='button' onclick='eliminarComanda(" . $row["id"] . ")'>Eliminar</button>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    </body>
    </html>
<?php
} 
?>
