<?php
$hostname = "db-mysql";      // Host de la base de datos
$username = "DiegoMartaAS";
$password = "@nOOD23dwdjk92@dmos!mcidcndsdc";
$db = "RestauranteDiegoMarta";


try {
    $conn = mysqli_connect($hostname,$username,$password,$db);
   if ($conn->connect_error) {
     die("Database connection failed: " . $conn->connect_error);
   }
     // Realiza las consultas y operaciones de base de datos usando $pdo
 } catch (PDOException $e) {
     echo "Error de conexión a la base de datos: " . $e->getMessage();
 }
 