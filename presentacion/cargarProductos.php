<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Mis Productos</h1>
        <hr>
        <a href="guardarProductos.php">Crear Nuevo</a>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Stock</th>
                    <th>Monto</th>
                    <th>ID Categoria</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once '../logica/LProducto.php';
                    $log=new LProducto();
                    $productos=$log->cargar();
                    foreach($productos as $pro){
                ?>
                <tr>
                    <td><?=$pro->getIdProducto()?></td>
                    <td><?=$pro->getNombre()?></td>   
                    <td><?=$pro->getStock()?></td>
                    <td><?=$pro->getMonto()?></td>    
                    <td><?=$pro->getIdCategoria()?></td>    
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>