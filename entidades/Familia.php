<?php
    class Familia{
        private $idfamilia;
        private $nombre;
        private $descripcion;

        public function getIdFamilia(){
            return $this->idfamilia;
        }

        public function setIdFamilia($idfamilia){
            $this->idfamilia=$idfamilia;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre=$nombre;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

        public function setDescripcion($descripcion){
            $this->descripcion=$descripcion;
        }

    }
?>