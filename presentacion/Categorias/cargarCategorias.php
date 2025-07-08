<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Mis Categorias</h1>
        <hr>
        <a href="guardarcategoria.php">Crear Nuevo</a>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>ID Familia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once '../../logica/LCategoria.php';
                    $log=new LCategoria();
                    foreach($log->cargar() as $categoria){
                ?>
                <tr>
                    <td><?=$categoria->getIdCategoria()?></td>
                    <td><?=$categoria->getNombre()?></td>   
                    <td><?=$categoria->getIdFamilia()?></td>    
                    <td>
                        <form method="GET" action="modificarCategoria.php" style="display: inline;">
                            <input type="hidden" name="id" value="<?=$categoria->getIdCategoria()?>">
                            <button type="submit">Modificar</button>
                        </form>
                        <form method="POST" action="eliminarCategoria.php" style="display: inline;">
                            <input type="hidden" name="id" value="<?=$categoria->getIdCategoria()?>">
                            <button type="submit" onclick="return confirm('¿Está seguro de eliminar esta categoria?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>