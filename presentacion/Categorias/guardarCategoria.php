<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardado de Categorias</title>
</head>
<body>
    <?php
        require_once '../../logica/LFamilia.php';
        require_once '../../logica/LCategoria.php';
    ?>
    <div>
        <h1>Módulo de Inserción</h1>
        <hr>
        <form action="" method="post">
            <label for="txtNom">Nombre:</label>
            <input type="text" name="txtNom" required>
            <br><br>
            <select name="cbxFam" id="cbxFam">
                <option>Seleccione Familia</option>
                <?php
                    $logFamilia=new LFamilia();
                    $familias=$logFamilia->cargar();
                    foreach($familias as $fam){
                ?>
                <option value="<?=$fam->getIdFamilia()?>"><?=$fam->getNombre()?></option>
                <?php
                    }
                ?>
            </select>
            <br><br>
            <input type="submit" value="Guardar">
        </form>
        <br>
        <a href="cargarCategorias.php">Volver al listado</a>
    </div>
</body>
</html>
<?php
    if($_POST){
        $cat=new Categoria();
        $cat->setNombre($_POST['txtNom']);
        $cat->setIdFamilia($_POST['cbxFam']);

        $logCategoria=new LCategoria();
        $logCategoria->guardar($cat);

        header('Location: cargarCategorias.php');
    }
?>