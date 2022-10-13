<?php

require 'config/database.php'; // nos conecta al archivo database.php

$db = new Database(); // un variable db la incializamos con la clase DATABASE // tomo una clase y se la asigna a un objeto
$con = $db->conectar(); // metodo conectar, en el archivo tadabase, el archivo que se conecta a la base de datos, esta variable es igual a db
// pero en especifico a la funcion conectar el OBJ $CON permite ir a $DB con la funcion nectar
// activo 0, no hay producto en inventario
$activo = 1; // mostrará los productos activos
// la variable comando, se conecta a la basededatos, $con, la palabra PREPARE prepara la consulta
$comando = $con->prepare("SELECT id, codigo, descripcion, stock FROM productos WHERE activo=:mi_activo ORDER BY codigo ASC");
$comando->execute(['mi_activo' => $activo]); // permite que la consulta se ejecute, ahora define mi_activo sea igual a $activo
$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);  // creamos variable $resultado y le asignamos comando que es todas las consultas
// fetchall, crea un arrray y fetch_assoc los asocia en el vector ( los coloca en lista)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacen</title>

    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/estilos.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
</head>

<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col-12">
                    <h4>Productos
                        <a href="nuevo.php" class="btn btn-primary float-right">Nuevo</a>
                    </h4>
                </div>
            </div>

            <div class="row py-3">
                <div class="col">
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Código</th>
                                <th>Descripción</th>
                                <th>Stock</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php //el Row de la linea 60 en adelante me trae todos los ID de mi base de datos en fila
                            foreach ($resultado as $row) { // este pequeño PHP, recorre el arreglo resultado, le asigna un nombre (ROW) así podemos ir consultando cada uno de los valores de la fina para que el lo recorra
                            ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td> 
                                    <td><?php echo $row['codigo']; ?></td>
                                    <td><?php echo $row['descripcion']; ?></td>
                                    <td><?php echo $row['stock']; ?></td>
                                    <td><a href="editar.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Editar</a></td>
                                    <td><a href="eliminar.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Eliminar</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

</body>

</html>