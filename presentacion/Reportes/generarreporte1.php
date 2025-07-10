<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reporte Simple de Familias</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-success mb-4">Reporte - Categoría por Familia</h1>
    <hr>

    <div class="mb-4">
      <label for="cbxFam" class="form-label">Seleccione una familia:</label>
      <select name="cbxFam" id="cbxFam" class="form-select" onchange="enviar()">
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

    <a href="../../index.php" class="btn btn-secondary">Página Principal</a>
  </div>

  <script>
    function enviar() {
      let idfam = document.getElementById('cbxFam').value;
      if (idfam !== "") {
        window.location.href = 'reporte1.php?idfam=' + idfam;
      }
    }
  </script>
</body>
</html>