<?php
    require_once '../entidades/Familia.php';
    interface IFamilia{
        public function guardar(Familia $familia);
        public function cargar();
    }
?>