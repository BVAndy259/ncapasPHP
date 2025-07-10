<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reporte AJAX de Familias</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-info mb-4">Reporte - Categoría por Familia (AJAX)</h1>
    <hr>

    <div class="mb-4">
      <label for="cbxFam" class="form-label">Seleccione una familia:</label>
      <select name="cbxFam" id="cbxFam" class="form-select">
        <option value="">Seleccione Familia</option>
        <?php
          require_once '../../logica/LFamilia.php';
          require_once '../../entidades/Familia.php';
          $logFamilia = new LFamilia();
          $familias = $logFamilia->cargar();
          foreach ($familias as $fam) {
        ?>
          <option value="<?= $fam->getIdFamilia() ?>"><?= $fam->getNombre() ?></option>
        <?php } ?>
      </select>
    </div>

    <a href="../../index.php" class="btn btn-secondary mb-4">Página Principal</a>

    <div id="res" class="mt-3"></div>
  </div>

  <script>
    $('#cbxFam').change(function () {
      let idfam = $('#cbxFam').val();
      if (idfam !== "") {
        $.ajax({
          url: 'reporte1.php',
          data: { idfam: idfam },
          type: 'get',
          success: function (res) {
            $('#res').html(res);
          }
        });
      } else {
        $('#res').html('');
      }
    });
  </script>
</body>
</html>