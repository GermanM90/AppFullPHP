<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Registro</title>

    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/estilos.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <body class="py-3">
        <main class="container contenedor">
            <div class="p-3 rounded">
                <div class= "row">
                 <div class="col">
                    <h4>Nuevo Registro</h4>
                 </div>   
                </div>
                <div class= "row">
                 <div class="col">
                    <form class="row g-3" method="post" action="guarda.php" autocomplete="off">
                    <div class="col-md-4">
                        <label for="codigo" class="form-label">Codigo</label>
                        <input type="text" name="codigo" id="codigo" class="form-control" require autofocus>
                    </div>
                    <div class="col-md-8">
                        <label for="descripcion" class="form-label">Descripccion</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control" require autofocus>
                    </div>
                    <h5>Inventario</h5> 
                    <div class="col-md-12">
                        <div class="formi-check"></div>
                        <label for="inventariable" class="form-check-label">Existencia</label>
                        <input type="checkbox" name="inventariable" id="inventariable" class="form-check-input">
                    </div>
                    </div>
                    <div class=col-md-12> 
                        <a href="index.php" class="btn btn-primary"> Regregar </a>
                        <button type="submit" class="btn btn-primary" name="registro" > Guardar</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>

    
</body>
</html>