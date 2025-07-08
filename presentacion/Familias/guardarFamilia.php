<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Inserción de Familias</h1>
        <hr>
        <form action="" method="post">
            <label for="txtNom">Nombre:</label>
            <input type="text" name="txtNom" id="txtNom" placeholder="Nombre" required>
            <br><br>
            <label for="txtDes">Descripción:</label>
            <input type="text" name="txtDes" id="txtDes" placeholder="Descripción" required>
            <br><br>
            <input type="submit" value="Guardar">
        </form>
        <br>
        <a href="cargarFamilias.php">Volver al listado</a>
    </div>

    <?php
        require_once '../../logica/LFamilia.php';
        if($_POST){
            if(!empty($_POST['txtNom']) && !empty($_POST['txtDes'])){
                $fam = new Familia();
                $fam->setNombre(trim($_POST['txtNom']));
                $fam->setDescripcion(trim($_POST['txtDes']));
                $log = new LFamilia();
                $log->guardar($fam);
                header('Location: cargarFamilias.php');
                exit();
            } else {
                echo '<script>alert("Por favor complete todos los campos");</script>';
            }
        }
    ?>
</body>
</html>