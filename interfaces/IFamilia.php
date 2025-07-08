<?php
    require_once '../../entidades/Familia.php';
    interface IFamilia{
        public function guardar(Familia $familia);
        public function modificar(Familia $familia);
        public function eliminar(Familia $familia);
        public function cargar();
        public function cargarPorId($id);
    }
?>