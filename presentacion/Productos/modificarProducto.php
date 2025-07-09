<?php
    require_once '../../logica/LProducto.php';
    require_once '../../logica/LCategoria.php';
    require_once '../../entidades/Producto.php';

    $nombre = '';
    $stock = '';
    $monto = '';
    $idcategoria = '';
    $error = '';

    $id = isset($_GET['id']) ? $_GET['id'] : null;
    if ($id) {
        $log = new LProducto();
        $producto = $log->cargarPorId($id);
        if ($producto) {
            $nombre = $producto->getNombre();
            $stock = $producto->getStock();
            $monto = $producto->getMonto();
            $idcategoria = $producto->getIdCategoria();
        } else {
            $error = "Producto no encontrado.";
        }
    } else {
        $error = "ID de producto no proporcionado.";
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$error) {
        $nombre = trim($_POST['txtNom']);
        $stock = trim($_POST['txtStock']);
        $monto = trim($_POST['txtMonto']);
        $idcategoria = trim($_POST['cbxCat']);

        if (empty($nombre) || empty($stock) || empty($monto) || $idcategoria == 'Seleccione Categoría') {
            $error = "Todos los campos son obligatorios.";
        } else {
            $producto = new Producto();
            $producto->setIdProducto($id);
            $producto->setNombre($nombre);
            $producto->setStock($stock);
            $producto->setMonto($monto);
            $producto->setIdCategoria($idcategoria);

            $log->modificar($producto);
            header("Location: cargarProductos.php");
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
        <h1>Modificar Producto</h1>
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
                <label for="txtStock">Stock:</label>
                <input type="text" name="txtStock" id="txtStock" value="<?= htmlspecialchars($stock) ?>" required>
                <label for="txtMonto">Monto:</label>
                <input type="text" name="txtMonto" id="txtMonto" value="<?= htmlspecialchars($monto) ?>" required>
                <select name="cbxCat" id="cbxCat">
                    <option>Seleccione Categoria</option>
                    <?php
                        $logCategoria = new LCategoria();
                        $categorias = $logCategoria->cargar();
                        foreach($categorias as $cat){
                    ?>
                    <option value="<?=$cat->getIdCategoria()?>" <?= ($cat->getIdCategoria() == $idcategoria) ? 'selected' : '' ?>>
                        <?=$cat->getNombre()?>
                    </option>
                    <?php } ?>
                </select>
                <br><br>
                <input type="submit" value="Modificar">
                <a href="cargarProductos.php">Cancelar</a>
            </form>
        <?php else: ?>
            <a href="cargarProductos.php">Volver al listado</a>
        <?php endif; ?>
    </div>
</body>
</html>