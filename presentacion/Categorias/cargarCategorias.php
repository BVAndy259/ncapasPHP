<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Categorias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-primary">Mis Categorias</h1>
        <hr>

        <div class="mb-3">
            <a href="guardarcategoria.php" class="btn btn-success">Crear Nuevo</a>
            <a href="../../index.php" class="btn btn-secondary">Página principal</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>ID Familia</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once '../../logica/LCategoria.php';
                        $log=new LCategoria();
                        foreach($log->cargar() as $categoria){
                    ?>
                    <tr>
                        <td><?=$categoria->getIdCategoria()?></td>
                        <td><?=$categoria->getNombre()?></td>   
                        <td><?=$categoria->getIdFamilia()?></td>    
                        <td>
                            <form method="GET" action="modificarCategoria.php" class="d-inline">
                                <input type="hidden" name="id" value="<?=$categoria->getIdCategoria()?>">
                                <button type="submit" class="btn btn-warning btn-sm">Modificar</button>
                            </form>
                            <form method="POST" action="eliminarCategoria.php" class="d-inline">
                                <input type="hidden" name="id" value="<?=$categoria->getIdCategoria()?>">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar esta categoria?')">Eliminar</button>
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