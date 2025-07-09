<?php
    require_once '../../datos/DB.php';
    require_once '../../interfaces/IProducto.php';

    class LProducto implements IProducto{
        public function guardar(Producto $producto){
            $db=new DB();
            $cn=$db->conectar();
            $sql="insert into producto (nombre, stock, monto, idcategoria) values (:nom, :sto, :mon, :idcat)";
            $ps=$cn->prepare($sql);
            $ps->bindParam(":nom", $producto->getNombre());
            $ps->bindParam(":mon", $producto->getMonto());
            $ps->bindParam(":sto", $producto->getStock());
            $ps->bindParam(":idcat", $producto->getIdCategoria());
            $ps->execute();
        }

        public function modificar(Producto $producto){
            $db=new DB();
            $cn=$db->conectar();
            $sql="update producto set nombre=:nom, stock=:sto, monto=:mon, idcategoria=:idcat where idproducto=:id";
            $ps=$cn->prepare($sql);
            $ps->bindParam(":nom", $producto->getNombre());
            $ps->bindParam(":mon", $producto->getMonto());
            $ps->bindParam(":sto", $producto->getStock());
            $ps->bindParam(":idcat", $producto->getIdCategoria());
            $ps->bindParam(":id", $producto->getIdProducto());
            $ps->execute();
        }

        public function eliminar(Producto $producto){
            $db=new DB();
            $cn=$db->conectar();
            $sql="delete from producto where idproducto=:id";
            $ps=$cn->prepare($sql);
            $ps->bindParam(":id", $producto->getIdProducto());
            $ps->execute();
        }

        public function cargar(){
            $db=new DB();
            $cn=$db->conectar();
            $sql="select * from producto";
            $ps=$cn->prepare($sql);
            $ps->execute();
            $producto=array();
            $filas=$ps->fetchall();
            foreach($filas as $f){
                $pro=new Producto();
                $pro->setIdProducto($f[0]);
                $pro->setNombre($f[1]);
                $pro->setStock($f[2]);
                $pro->setMonto($f[3]);
                $pro->setIdCategoria($f[4]);
                array_push($producto, $pro);
            }
            return $producto;
        }

        public function cargarPorId($id){
            $db=new DB();
            $cn=$db->conectar();
            $sql="select * from producto where idproducto=:id";
            $ps=$cn->prepare($sql);
            $ps->bindParam(":id", $id);
            $ps->execute();
            $f=$ps->fetch();
            if($f){
                $pro=new Producto();
                $pro->setIdProducto($f[0]);
                $pro->setNombre($f[1]);
                $pro->setStock($f[2]);
                $pro->setMonto($f[3]);
                $pro->setIdCategoria($f[4]);
                return $pro;
            }
            return null;
        }
    }
?>