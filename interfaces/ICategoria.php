<?php
    require_once '../../entidades/Categoria.php';
    interface ICategoria{
        public function guardar(Categoria $categoria);
        public function modificar(Categoria $categoria);
        public function eliminar(Categoria $categoria);
        public function cargar();
        public function cargarPorId($id);
        public function cargarPorFamilia($idfam);
    }
?>