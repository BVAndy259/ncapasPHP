<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardado de Categorias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
</head>
<body>
    <?php
        require_once '../../logica/LFamilia.php';
        require_once '../../logica/LCategoria.php';
    ?>

    <div class="container mt-5">
        <h1 class="text-primary mb-4">Módulo de Inserción</h1><hr>

        <form action="" method="post" class="border p-4 rounded bg-light">
            <div>
                <label for="txtNom" class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="txtNom" required>
            </div>

            <div class="mb-3">
                <label for="cbxFam" class="form-label">Familia:</label>
                <select name="cbxFam" id="cbxFam" class="form-select" required>
                    <option>Seleccione Familia</option>
                    <?php
                        $logFamilia=new LFamilia();
                        $familias=$logFamilia->cargar();
                        foreach($familias as $fam){
                    ?>
                    <option value="<?=$fam->getIdFamilia()?>"><?=$fam->getNombre()?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="cargarCategorias.php" class="btn btn-secondary ms-2">Volver al listado</a>
        </form>
    </div>
    
    <?php
        if($_POST){
            $cat=new Categoria();
            $cat->setNombre($_POST['txtNom']);
            $cat->setIdFamilia($_POST['cbxFam']);

            $logCategoria=new LCategoria();
            $logCategoria->guardar($cat);

            header('Location: cargarCategorias.php');
        }
    ?>
</body>
</html>