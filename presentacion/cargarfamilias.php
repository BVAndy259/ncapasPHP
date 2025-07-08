<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Listado de Familias</h1>
        <hr>
        <a href="guardarfamilia.php">Crear Nuevo</a>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Nombre</td>
                    <td>Descripción</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once '../logica/LFamilia.php';
                    $log=new LFamilia();
                    foreach($log->cargar() as $familia){
                ?>
                <tr>
                    <td><?=$familia->getIdFamilia()?></td>
                    <td><?=$familia->getNombre()?></td>
                    <td><?=$familia->getDescripcion()?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>