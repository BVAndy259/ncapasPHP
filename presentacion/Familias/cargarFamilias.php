<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <title>Tabla de Familias</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-primary">Listado de Familias</h1>
        <hr>

        <div class="mb-3">
            <a href="guardarFamilia.php" class="btn btn-success">Crear Nuevo</a>
            <a href="../../index.php" class="btn btn-secondary">Página principal</a>
        </div>
        
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once '../../logica/LFamilia.php';
                        $log=new LFamilia();
                        foreach($log->cargar() as $familia){
                    ?>
                    <tr>
                        <td><?=$familia->getIdFamilia()?></td>
                        <td><?=$familia->getNombre()?></td>
                        <td><?=$familia->getDescripcion()?></td>
                        <td>
                            <form method="GET" action="modificarFamilia.php" class="d-inline">
                                <input type="hidden" name="id" value="<?=$familia->getIdFamilia()?>">
                                <button type="submit" class="btn btn-warning btn-sm">Modificar</button>
                            </form>
                            <form method="POST" action="eliminarFamilia.php" class="d-inline">
                                <input type="hidden" name="id" value="<?=$familia->getIdFamilia()?>">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar esta familia?')">Eliminar</button>
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