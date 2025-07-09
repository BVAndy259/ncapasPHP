<?php
    require_once '../../logica/LCategoria.php';
    require_once '../../logica/LFamilia.php';
    require_once '../../entidades/Categoria.php';

    $nombre = '';
    $idfamilia = '';
    $error = '';
    
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    if ($id) {
        $log = new LCategoria();
        $categoria = $log->cargarPorId($id);
        if ($categoria) {
            $nombre = $categoria->getNombre();
            $idfamilia = $categoria->getIdFamilia();
        } else {
            $error = "Categoría no encontrada.";
        }
    } else {
        $error = "ID de categoría no proporcionado.";
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$error){
        $nombre = trim($_POST['txtNom']);
        $idfamilia = trim($_POST['cbxFam']);

        if (empty($nombre) || empty($idfamilia) || $idfamilia == 'Seleccione Familia') {
            $error = "Todos los campos son obligatorios.";
        } else {
            $categoria = new Categoria();
            $categoria->setIdCategoria($id);
            $categoria->setNombre($nombre);
            $categoria->setIdFamilia($idfamilia);

            $log->modificar($categoria);
            header("Location: cargarCategorias.php");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Modificar Categoría</h1>
        <hr>
        
        <?php if ($error): ?>
            <div style="color: red; margin-bottom: 10px;">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <?php if (!$error): ?>
            <form action="" method="post">
                <label for="txtNom">Nombre:</label>
                <input type="text" name="txtNom" id="txtNom" value="<?= htmlspecialchars($nombre) ?>" required>
                <br><br>
                <select name="cbxFam" id="cbxFam">
                    <option>Seleccione Familia</option>
                    <?php
                        $logFamilia = new LFamilia();
                        $familias = $logFamilia->cargar();
                        foreach($familias as $fam){
                    ?>
                    <option value="<?=$fam->getIdFamilia()?>" <?= ($fam->getIdFamilia() == $idfamilia) ? 'selected' : '' ?>>
                        <?=$fam->getNombre()?>
                    </option>
                    <?php } ?>
                </select>
                <br><br>
                <input type="submit" value="Modificar">
                <a href="cargarCategorias.php">Cancelar</a>
            </form>
        <?php else: ?>
            <a href="cargarCategorias.php">Volver al listado</a>
        <?php endif; ?>
    </div>
</body>
</html>