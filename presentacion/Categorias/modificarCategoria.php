<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificación de Categorias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-primary">Modificar Categoría</h1>
        <hr>
        
        <?php if ($error): ?>
            <div style="color: red; margin-bottom: 10px;">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <?php if (!$error): ?>
            <form action="" method="post" class="border p-4 rounded bg-light">
                <div class="mb-3">
                    <label for="txtNom" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="txtNom" id="txtNom" value="<?= htmlspecialchars($nombre) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="cbxFam" class="form-label">Familia:</label>
                    <select name="cbxFam" id="cbxFam" class="form-select" required>
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
                </div>

                <button type="submit" class="btn btn-warning">Modificar</button>
                <a href="cargarCategorias.php" class="btn btn-secondary ms-2">Cancelar</a>
            </form>
        <?php else: ?>
            <a href="cargarCategorias.php" class="btn btn-secondary">Volver al listado</a>
        <?php endif; ?>
    </div>
    
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
</body>
</html>