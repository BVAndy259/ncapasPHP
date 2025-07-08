<?php
    require_once '../../logica/LCategoria.php';
    require_once '../../entidades/Categoria.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        
        if ($id) {
            $log = new LCategoria();
            $categoria = $log->cargarPorId($id);
            
            if ($categoria) {
                try {
                    $log->eliminar($categoria);
                    header("Location: cargarCategorias.php");
                    exit();
                } catch (Exception $e) {
                    header("Location: cargarCategorias.php");
                    exit();
                }
            } else {
                header("Location: cargarCategorias.php");
                exit();
            }
        } else {
            header("Location: cargarCategorias.php");
            exit();
        }
    } else {
        header("Location: cargarCategorias.php");
        exit();
    }
?>