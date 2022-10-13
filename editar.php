<?php

require 'config/database.php';

$db = new Database(); 
$con = $db->conectar();

$id = $_GET['id']; // obtencion del ID
$activo = 1;

// cuando uso : en una consulta es porque estoy llamando a una variable existente

$query = $con->prepare("SELECT codigo, descripcion,inventariable, stock FROM productos WHERE id = :id AND activo = :activo");
$query->execute(['id'=>$id,'activo'=>$activo]);
$num = $query->rowCount();
if ($num>0) {
    $row = $query->fetch(PDO::FETCH_ASSOC);
} else {
    header("Location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/estilos.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
</head>
<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
               <div class="col"> 
                <h4>Nuevos registros</h4>
                </div> 
            </div>
            <div class="row">
                <div class="col">
                    <form class="row g-3" method="post" action="guarda.php" autocomplete="off">

                <input type="hidden" id="id" name="id" class="from-control" value="<?php echo $id; ?>">
                    <div class=col-md-8>
                        <label for="codigo" class="form-label">Codigo</label>
                        <input type="text" id="codigo" name="codigo" class="form-control" value="<?php echo $row ['codigo']; ?>" required autofocus>
                        </div>
                    </div>
                    <div class=col-md-8> 
                        <label for="descripcion" class="form-label">descripcion</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control" value="<?php echo $row ['codigo']; ?>" required autofocus>
                        </div>    
                        <div class=col-md-12> 
                        <div class="form-check">
                        <label for="inventariable" class="form-check-label"> Usa Inventario</label>
                        <input type="checkbox" id="inventariable" name="inventariable" class="form-check-input" value="<?php if ($row['inventariable']) { echo 'checked';}; ?>" >
                        </div>
                    </div>
                    <div class=col-md-8> 
                        <label for="descripcion" class="form-label">descripcion</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control" value="<?php echo $row ['codigo']; ?>" required autofocus>
                        </div>    
                        <div class=col-md-12> 
                        <label for="stock" class="form-label"> Existencia </label>
                        <input type="text" id="stock" name="stock" class="form-control" value="<?php echo $row ['stock']; ?>" >
                        </div>
                        <div class=col-md-12> 
                        <a href="index.php" class="btn btn-primary"> Regregar </a>
                        <button type="submit" class="btn btn-primary" name="registro" > Guardar</button>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>