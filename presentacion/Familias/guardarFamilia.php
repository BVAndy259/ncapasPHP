<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guardado de Familias</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-success">Inserción de Familias</h1>
    <hr>

    <form action="" method="post" class="border p-4 rounded bg-light">
      <div class="mb-3">
        <label for="txtNom" class="form-label">Nombre:</label>
        <input type="text" name="txtNom" id="txtNom" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="txtDes" class="form-label">Descripción:</label>
        <input type="text" name="txtDes" id="txtDes" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-primary">Guardar</button>
      <a href="cargarFamilias.php" class="btn btn-secondary ms-2">Volver al listado</a>
    </form>
  </div>

  <?php
    require_once '../../logica/LFamilia.php';
    require_once '../../entidades/Familia.php';
    if ($_POST) {
      if (!empty($_POST['txtNom']) && !empty($_POST['txtDes'])) {
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