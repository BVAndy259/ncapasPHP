<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Guardado de Productos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
</head>
<body>
  <div class="container mt-5">
    <?php
      require_once '../../logica/LFamilia.php';
      require_once '../../logica/LCategoria.php';
      require_once '../../logica/LProducto.php';
    ?>

    <h1 class="text-primary mb-4">Inserción de Productos</h1>
    <form action="" method="post" class="border p-4 rounded bg-light">
      <div class="mb-3">
        <label for="txtNom" class="form-label">Nombre del producto</label>
        <input type="text" name="txtNom" id="txtNom" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="txtSto" class="form-label">Stock</label>
        <input type="number" name="txtSto" id="txtSto" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="txtMon" class="form-label">Monto</label>
        <input type="number" step="0.01" name="txtMon" id="txtMon" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="cbxFam" class="form-label">Familia</label>
        <select name="cbxFam" id="cbxFam" class="form-select" required>
          <option value="">Seleccione Familia</option>
          <?php
            $logFamilia = new LFamilia();
            $familias = $logFamilia->cargar();
            foreach ($familias as $fam) {
              echo "<option value='{$fam->getIdFamilia()}'>{$fam->getNombre()}</option>";
            }
          ?>
        </select>
      </div>

      <div class="mb-3">
        <label for="cbxCat" class="form-label">Categoría</label>
        <select name="cbxCat" id="cbxCat" class="form-select" required>
          <option value="">Seleccione Categoría</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Guardar</button>
      <a href="cargarProductos.php" class="btn btn-secondary ms-2">Volver al listado</a>
    </form>
  </div>

  <script>
    $('#cbxFam').change(function () {
      const idfam = $(this).val();
      $.ajax({
        url: 'respuestaCategorias1.php',
        data: { idfam: idfam },
        type: 'get',
        success: function (res) {
          $('#cbxCat').html(res);
        }
      });
    });
  </script>

  <?php
    if ($_POST) {
      $pro = new Producto();
      $pro->setNombre($_POST['txtNom']);
      $pro->setStock($_POST['txtSto']);
      $pro->setMonto($_POST['txtMon']);
      $pro->setIdCategoria($_POST['cbxCat']);

      $logProducto = new LProducto();
      $logProducto->guardar($pro);

      header('Location: cargarProductos.php');
      exit();
    }
  ?>
</body>
</html>