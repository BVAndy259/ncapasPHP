<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reporte Familias</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
</head>
<body>
  <div class="container mt-4">
    <h2 class="text-primary">Categorías de la Familia #<?= htmlspecialchars($_GET['idfam']) ?></h2>
    <hr>

    <?php
      require_once '../../logica/LCategoria.php';
      require_once '../../entidades/Categoria.php';

      $log = new LCategoria();
      $categorias = $log->cargarPorFamilia($_GET['idfam']);

      if (count($categorias) > 0):
    ?>
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover align-middle">
          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>ID Familia</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($categorias as $cat): ?>
              <tr>
                <td><?= $cat->getIdCategoria() ?></td>
                <td><?= $cat->getNombre() ?></td>
                <td><?= $cat->getIdFamilia() ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php else: ?>
      <div class="alert alert-warning">No se encontraron categorías para esta familia.</div>
    <?php endif; ?>
  </div>
</body>
</html>