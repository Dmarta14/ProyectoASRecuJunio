<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restaurante App</title>
</head>
<body>
  <header>
    <h1 class="page-title">Diego's Restaurant</h1>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
        <a class="navbar-brand" href="?page=inicio">Inicio</a>
        <a class="navbar-brand" href="?page=comandas">Comandas solicitadas</a>
        <a class="navbar-brand" href="?page=anyadir">Añadir una comanda</a>
        </div>
    </nav>
  </header>
  <main >
    <?php
    include 'conexionDB/conexion.php';
    
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case 'inicio':
                include 'paginas/inicio.php';
                break;
            case 'comandas':
                include 'paginas/comandas.php';
                break;                   
            case 'anyadir':
                include 'paginas/anyadir.php';                        
                break;
            default:
                include 'paginas/inicio.php';
                break;
        }
    } else {
        include 'paginas/inicio.php';
    }
  ?>
  </main>

</body>
</html>