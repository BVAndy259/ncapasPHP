<?php
    class Producto{
        private $idproducto;
        private $nombre;
        private $stock;
        private $monto;
        private $idcategoria;

        public function getIdProducto(){
            return $this->idproducto;
        }

        public function setIdProducto($idproducto){
            $this->idproducto=$idproducto;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre=$nombre;
        }

        public function getStock(){
            return $this->stock;
        }

        public function setStock($stock){
            $this->stock=$stock;
        }

        public function getMonto(){
            return $this->monto;
        }

        public function setMonto($monto){
            $this->monto=$monto;
        }

        public function getIdCategoria(){
            return $this->idcategoria;
        }

        public function setIdCategoria($idcategoria){
            $this->idcategoria=$idcategoria;
        }
    }
?>