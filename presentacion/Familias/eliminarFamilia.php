<?php
    require_once '../../logica/LFamilia.php';
    require_once '../../entidades/Familia.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        
        if ($id) {
            $log = new LFamilia();
            $familia = $log->cargarPorId($id);
            
            if ($familia) {
                try {
                    $log->eliminar($familia);
                    header("Location: cargarFamilias.php");
                    exit();
                } catch (Exception $e) {
                    header("Location: cargarFamilias.php");
                    exit();
                }
            } else {
                header("Location: cargarFamilias.php");
                exit();
            }
        } else {
            header("Location: cargarFamilias.php");
            exit();
        }
    } else {
        header("Location: cargarFamilias.php");
        exit();
    }
?>