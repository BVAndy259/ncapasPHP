<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Categorias de la Familia <?=$_GET['idfam']?></h1>
        <hr>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Id Familia</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once '../logica/LCategoria.php';
                    $log=new LCategoria();
                    $categorias=$log->cargarPorFamilia($_GET['idfam']);
                    foreach($categorias as $cat){
                ?>
                <tr>
                    <td><?=$cat->getIdCategoria()?></td>
                    <td><?=$cat->getNombre()?></td>   
                    <td><?=$cat->getIdFamilia()?></td>    
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>