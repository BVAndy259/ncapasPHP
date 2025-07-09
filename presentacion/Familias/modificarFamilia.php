<?php
    require_once '../../logica/LFamilia.php';
    require_once '../../entidades/Familia.php';

    $nombre = '';
    $descripcion = '';
    $error = '';

    $id = isset($_GET['id']) ? $_GET['id'] : null;
    if ($id) {
        $log = new LFamilia();
        $familia = $log->cargarPorId($id);
        if ($familia) {
            $nombre = $familia->getNombre();
            $descripcion = $familia->getDescripcion();
        } else {
            $error = "Familia no encontrada.";
        }
    } else {
        $error = "ID de familia no proporcionado.";
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$error) {
        $nombre = trim($_POST['nombre']);
        $descripcion = trim($_POST['descripcion']);

        if (empty($nombre) || empty($descripcion)) {
            $error = "Todos los campos son obligatorios.";
        } else {
            $familia = new Familia();
            $familia->setIdFamilia($id);
            $familia->setNombre($nombre);
            $familia->setDescripcion($descripcion);

            $log->modificar($familia);
            header("Location: cargarFamilias.php");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificación de Familias</title>
</head>
<body>
    <div>
        <h1>Modificar Familia</h1>
        <hr>
        
        <?php if ($error): ?>
            <div style="color: red; margin-bottom: 10px;">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <?php if (!$error): ?>
            <form action="" method="post">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($nombre) ?>" required>
                <br><br>
                <label for="descripcion">Descripción:</label>
                <input type="text" name="descripcion" id="descripcion" value="<?= htmlspecialchars($descripcion) ?>" required>
                <br><br>
                <input type="submit" value="Modificar">
                <a href="cargarFamilias.php">Cancelar</a>
            </form>
        <?php else: ?>
            <a href="cargarFamilias.php">Volver al listado</a>
        <?php endif; ?>
    </div>
</body>
</html>