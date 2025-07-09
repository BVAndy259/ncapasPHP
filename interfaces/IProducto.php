<?php
    require_once '../../entidades/Producto.php';
    interface IProducto{
        public function guardar(Producto $producto);
        public function modificar(Producto $producto);
        public function eliminar(Producto $producto);
        public function cargar();
        public function cargarPorId($id);
    }
?>