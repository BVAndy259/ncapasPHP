<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Familias</title>
</head>
<body>
    <div>
        <h1>Listado de Familias</h1>
        <hr>
        <a href="guardarFamilia.php">Crear Nuevo</a>
        <a href="../../index.php">Página principal</a>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once '../../logica/LFamilia.php';
                    $log=new LFamilia();
                    foreach($log->cargar() as $familia){
                ?>
                <tr>
                    <td><?=$familia->getIdFamilia()?></td>
                    <td><?=$familia->getNombre()?></td>
                    <td><?=$familia->getDescripcion()?></td>
                    <td>
                        <form method="GET" action="modificarFamilia.php" style="display: inline;">
                            <input type="hidden" name="id" value="<?=$familia->getIdFamilia()?>">
                            <button type="submit">Modificar</button>
                        </form>
                        <form method="POST" action="eliminarFamilia.php" style="display: inline;">
                            <input type="hidden" name="id" value="<?=$familia->getIdFamilia()?>">
                            <button type="submit" onclick="return confirm('¿Está seguro de eliminar esta familia?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>