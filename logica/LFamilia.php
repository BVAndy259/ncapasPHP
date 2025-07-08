<?php
    require_once '../../datos/DB.php';
    require_once '../../interfaces/IFamilia.php';

    class LFamilia implements IFamilia{
        public function cargar(){
            $db=new DB();
            $cn=$db->conectar();
            $sql="SELECT idfamilia, nombre, descripcion FROM familia";
            $ps=$cn->prepare($sql);
            $ps->execute();
            $familias=array();
            $filas=$ps->fetchall();
            foreach($filas as $f){
                $fam=new Familia();
                $fam->setIdFamilia($f[0]);
                $fam->setNombre($f[1]);
                $fam->setDescripcion($f[2]);
                array_push($familias, $fam);
            }
            return $familias;
        }

        public function cargarPorId($id){
            $db=new DB();
            $cn=$db->conectar();
            $sql="SELECT idfamilia, nombre, descripcion FROM familia WHERE idfamilia=:id";
            $ps=$cn->prepare($sql);
            $ps->bindParam(":id", $id);
            $ps->execute();
            $fila=$ps->fetch();
            if($fila){
                $fam=new Familia();
                $fam->setIdFamilia($fila[0]);
                $fam->setNombre($fila[1]);
                $fam->setDescripcion($fila[2]);
                return $fam;
            }
            return null;
        }

        public function guardar(Familia $familia){
            $db=new DB();
            $cn=$db->conectar();
            $sql="INSERT INTO familia (nombre, descripcion) VALUES (:nom, :des)";
            $ps=$cn->prepare($sql);
            $ps->bindParam(":nom", $familia->getNombre());
            $ps->bindParam(":des", $familia->getDescripcion());
            $ps->execute();
        }

        public function modificar(Familia $familia){
            $db=new DB();
            $cn=$db->conectar();
            $sql="UPDATE familia SET nombre=:nom, descripcion=:des WHERE idfamilia=:id";
            $ps=$cn->prepare($sql);
            $ps->bindParam(":nom", $familia->getNombre());
            $ps->bindParam(":des", $familia->getDescripcion());
            $ps->bindParam(":id", $familia->getIdFamilia());
            $ps->execute();
        }

        public function eliminar(Familia $familia){
            $db=new DB();
            $cn=$db->conectar();
            $sql="DELETE FROM familia WHERE idfamilia=:id";
            $ps=$cn->prepare($sql);
            $ps->bindParam(":id", $familia->getIdFamilia());
            $ps->execute();
        }
    }
?>