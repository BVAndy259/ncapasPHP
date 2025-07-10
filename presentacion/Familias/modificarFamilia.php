<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificación de Familias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-primary">Modificar Familia</h1>
        <hr>
        
        <?php if ($error): ?>
            <div style="color: red; margin-bottom: 10px;">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <?php if (!$error): ?>
            <form action="" method="post" class="border p-4 rounded bg-light">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?= htmlspecialchars($nombre) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion" value="<?= htmlspecialchars($descripcion) ?>" required>
                </div>

                <button type="submit" class="btn btn-warning">Modificar</button>
                <a href="cargarFamilias.php" class="btn btn-secondary ms-2">Cancelar</a>
            </form>
        <?php else: ?>
            <a href="cargarFamilias.php" class="btn btn-secondary">Volver al listado</a>
        <?php endif; ?>
    </div>
    
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
</body>
</html>