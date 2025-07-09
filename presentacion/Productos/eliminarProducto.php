<?php
    require_once '../../logica/LProducto.php';
    require_once '../../entidades/Producto.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        
        if ($id) {
            $log = new LProducto();
            $producto = $log->cargarPorId($id);
            
            if ($producto) {
                try {
                    $log->eliminar($producto);
                    header("Location: cargarProductos.php");
                    exit();
                } catch (Exception $e) {
                    header("Location: cargarProductos.php");
                    exit();
                }
            } else {
                header("Location: cargarProductos.php");
                exit();
            }
        } else {
            header("Location: cargarProductos.php");
            exit();
        }
    } else {
        header("Location: cargarProductos.php");
        exit();
    }
?>