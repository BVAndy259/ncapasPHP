<?php
    class Categoria{
        private $idcategoria;
        private $nombre;
        private $idfamilia;
        
        public function getIdCategoria()
        {
            return $this->idcategoria;
        }
        public function setIdCategoria($idcategoria)
        {
            $this->idcategoria = $idcategoria;
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }

        public function getIdFamilia()
        {
            return $this->idfamilia;
        }

        public function setIdFamilia($idfamilia)
        {
            $this->idfamilia = $idfamilia;
        }
    }
?>