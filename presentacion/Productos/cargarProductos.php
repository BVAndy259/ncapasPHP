<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tabla de Productos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-primary mb-4">Mis Productos</h1><hr>
    <div class="mb-3">
      <a href="guardarProducto.php" class="btn btn-success me-2">Crear Nuevo</a>
      <a href="../../index.php" class="btn btn-secondary">Página principal</a>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Stock</th>
            <th>Monto</th>
            <th>ID Categoría</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
            require_once '../../logica/LProducto.php';
            $log = new LProducto();
            foreach ($log->cargar() as $producto) {
          ?>
          <tr>
            <td><?= $producto->getIdProducto() ?></td>
            <td><?= $producto->getNombre() ?></td>   
            <td><?= $producto->getStock() ?></td>
            <td><?= $producto->getMonto() ?></td>    
            <td><?= $producto->getIdCategoria() ?></td>   
            <td>
              <form method="GET" action="modificarProducto.php" class="d-inline">
                <input type="hidden" name="id" value="<?= $producto->getIdProducto() ?>">
                <button type="submit" class="btn btn-warning btn-sm">Modificar</button>
              </form>
              <form method="POST" action="eliminarProducto.php" class="d-inline">
                <input type="hidden" name="id" value="<?= $producto->getIdProducto() ?>">
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este producto?')">Eliminar</button>
              </form>
            </td> 
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>