<?php
    require_once '../../datos/DB.php';
    require_once '../../interfaces/ICategoria.php';
    class LCategoria implements ICategoria{
        public function cargarPorFamilia($idfam){
            $db=new DB();
            $cn=$db->conectar();
            $sql="select * from categoria where idfamilia=:idfam";
            $ps=$cn->prepare($sql);
            $ps->bindParam(':idfam', $idfam);
            $ps->execute();
            $categorias=array();
            $filas=$ps->fetchall();
            foreach($filas as $f){
                $cat=new Categoria();
                $cat->setIdCategoria($f[0]);
                $cat->setNombre($f[1]);
                $cat->setIdFamilia($f[2]);
                array_push($categorias, $cat);
            }
            return $categorias;
        }
        public function guardar($categoria){
            $db=new DB();
            $cn=$db->conectar();
            $sql="insert into categoria (nombre, idfamilia) values (:nom, :idfam)";
            $ps=$cn->prepare($sql);
            $ps->bindParam(":nom", $categoria->getNombre());
            $ps->bindParam(":idfam", $categoria->getIdFamilia());
            $ps->execute();
        }

        public function modificar($categoria){
            $db=new DB();
            $cn=$db->conectar();
            $sql="update categoria set nombre=:nom, idfamilia=:idfam where idcategoria=:id";
            $ps=$cn->prepare($sql);
            $ps->bindParam(":nom", $categoria->getNombre());
            $ps->bindParam(":idfam", $categoria->getIdFamilia());
            $ps->bindParam(":id", $categoria->getIdCategoria());
            $ps->execute();
        }

        public function eliminar($categoria){
            $db=new DB();
            $cn=$db->conectar();
            $sql="delete from categoria where idcategoria=:id";
            $ps=$cn->prepare($sql);
            $ps->bindParam(":id", $categoria->getIdCategoria());
            $ps->execute();
        }

        public function cargar(){
            $db=new DB();
            $cn=$db->conectar();
            $sql="select * from categoria";
            $ps=$cn->prepare($sql);
            $ps->execute();
            $categorias=array();
            $filas=$ps->fetchall();
            foreach($filas as $f){
                $cat=new Categoria();
                $cat->setIdCategoria($f[0]);
                $cat->setNombre($f[1]);
                $cat->setIdFamilia($f[2]);
                array_push($categorias, $cat);
            }
            return $categorias;
        }

        public function cargarPorId($id){
            $db=new DB();
            $cn=$db->conectar();
            $sql="select * from categoria where idcategoria=:id";
            $ps=$cn->prepare($sql);
            $ps->bindParam(':id', $id);
            $ps->execute();
            $f=$ps->fetch();
            if($f){
                $cat=new Categoria();
                $cat->setIdCategoria($f[0]);
                $cat->setNombre($f[1]);
                $cat->setIdFamilia($f[2]);
                return $cat;
            }
            return null;
        }
    }
?>