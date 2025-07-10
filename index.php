<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Principal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-primary text-center mb-4">Módulo de Selección</h1>
    <hr>

    <div class="row">
      <div class="col-md-6 mb-4">
        <div class="card border-primary">
          <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Tablas de Mantenimiento</h5>
          </div>
          <div class="card-body">
            <a href="presentacion/Familias/cargarFamilias.php" class="btn btn-outline-primary w-100 mb-2">Familias</a>
            <a href="presentacion/Categorias/cargarCategorias.php" class="btn btn-outline-primary w-100 mb-2">Categorías</a>
            <a href="presentacion/Productos/cargarProductos.php" class="btn btn-outline-primary w-100">Productos</a>
          </div>
        </div>
      </div>

      <div class="col-md-6 mb-4">
        <div class="card border-success">
          <div class="card-header bg-success text-white">
            <h5 class="mb-0">Reportes</h5>
          </div>
          <div class="card-body">
            <a href="presentacion/Reportes/generarreporte1.php" class="btn btn-outline-success w-100 mb-2">Reporte Simple</a>
            <a href="presentacion/Reportes/generarreporte2.php" class="btn btn-outline-success w-100">Reporte Ajax</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
