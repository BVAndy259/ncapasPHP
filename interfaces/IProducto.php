<?php
    require_once '../entidades/Producto.php';
    interface IProducto{
        public function guardar(Producto $producto);
        public function cargar();
    }
?>