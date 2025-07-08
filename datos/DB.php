<?php
    class DB{
        private $url='cadena de conexion a la base de datos';
        private $user='usuario';
        private $password='contraseña';
        public function conectar(){
            $cn=new PDO($this->url,$this->user,$this->password);
            return $cn;
        }
    }
?>