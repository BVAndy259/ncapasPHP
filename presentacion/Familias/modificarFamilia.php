<?php
    require_once '../../logica/LFamilia.php';
    require_once '../../entidades/Familia.php';

    $id = isset($_GET['id']) ? $_GET['id'] : null;
    if ($id) {
        $log = new LFamilia();
        $familia = $log->cargarPorId($id);
        if ($familia) {
            $nombre = $familia->getNombre();
            $descripcion = $familia->getDescripcion();
        } else {
            die("Familia no encontrada.");
        }
    } else {
        die("ID de familia no proporcionado.");
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombres'];
        $descripcion = $_POST['descripcion'];

        if (empty($nombre) || empty($descripcion)) {
            die("Todos los campos son obligatorios.");
        }

        $familia = new Familia();
        $familia->setIdFamilia($id);
        $familia->setNombre($nombre);
        $familia->setDescripcion($descripcion);

        $log->modificar($familia);
        header("Location: cargarfamilias.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modificar Familia</title>
</head>
<body>
    <div>
        <h1>Modificar Familia</h1>
        <hr>
        <form action="" method="post">
            <label for="nombres">Nombre:</label>
            <input type="text" name="nombres" id="nombres" value="<?= htmlspecialchars($nombre) ?>" required>
            <br>
            <label for="descripcion">Descripción:</label>
            <input type="text" name="descripcion" id="descripcion" value="<?= htmlspecialchars($descripcion) ?>" required>
            <br>
            <input type="submit" value="Modificar">
        </form>
    </div>
</body>
</html>