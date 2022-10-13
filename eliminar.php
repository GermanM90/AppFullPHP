<?php 

require 'config/database.php';

$db = new Database(); 
$con = $db->conectar();
// debemos obtener un id a través de un GET
$id = $_GET['id'];

$query = $con-> prepare("DELETE FROM productos WHERE id=?");
$query -> execute ([$id]);
$numElimina = $query->rowCount();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Registro</title>

    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/estilos.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
</head>
<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col"> 
                    <?php if($numElimina>0){ ?>
                    <h3>registro eliminado correctamente</h3>
                    <?php } else { ?>
                        <h3>ERROR al eliminar</h3>
                    <?php } ?>

                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a class= "btn btn-primary" href="index.php"> Regresar</a>
        </div>
    </main>     
    
</body>
</html>