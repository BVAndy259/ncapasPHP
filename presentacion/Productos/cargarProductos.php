<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Productos</title>
</head>
<body>
    <div>
        <h1>Mis Productos</h1>
        <hr>
        <a href="guardarProducto.php">Crear Nuevo</a>
        <a href="../../index.php">Página principal</a>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Stock</th>
                    <th>Monto</th>
                    <th>ID Categoria</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once '../../logica/LProducto.php';
                    $log=new LProducto();
                    foreach($log->cargar() as $producto){
                ?>
                <tr>
                    <td><?=$producto->getIdProducto()?></td>
                    <td><?=$producto->getNombre()?></td>   
                    <td><?=$producto->getStock()?></td>
                    <td><?=$producto->getMonto()?></td>    
                    <td><?=$producto->getIdCategoria()?></td>   
                    <td>
                        <form method="GET" action="modificarProducto.php" style="display: inline;">
                            <input type="hidden" name="id" value="<?=$producto->getIdProducto()?>">
                            <button type="submit">Modificar</button>
                        </form>
                        <form method="POST" action="eliminarProducto.php" style="display: inline;">
                            <input type="hidden" name="id" value="<?=$producto->getIdProducto()?>">
                            <button type="submit" onclick="return confirm('¿Está seguro de eliminar este producto?')">Eliminar</button>
                        </form>
                    </td> 
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>