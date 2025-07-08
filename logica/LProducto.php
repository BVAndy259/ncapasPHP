<?php
    require_once '../datos/DB.php';
    require_once '../interfaces/IProducto.php';

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
    }
?>