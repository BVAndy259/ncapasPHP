-- DB para MySQL, adaptar la query a tu base de datos
CREATE DATABASE ventasweb1;
USE ventasweb1;

--=> Tablas creadas
CREATE TABLE familia
(
	idfamilia INT PRIMARY KEY AUTO_INCREMENT,
	nombre VARCHAR(30),
	descripcion VARCHAR(50)
);

CREATE TABLE categoria
(
	idcategoria INT PRIMARY KEY AUTO_INCREMENT,
	nombre VARCHAR(30),
	idfamilia INT
);

CREATE TABLE producto (
	idproducto INT PRIMARY KEY AUTO_INCREMENT,
	nombre VARCHAR(30),
	stock INT,
	monto DOUBLE,
	idcategoria INT
);

--=> Inserción de datos
--==> Inserción de familias
INSERT INTO familia (nombre, descripcion) VALUES ('Bebidas','Todo bebidas');
INSERT INTO familia (nombre, descripcion) VALUES ('Lácteos','Todo lácteos');
INSERT INTO familia (nombre, descripcion) VALUES ('Limpieza', 'Todo limpieza');
INSERT INTO familia (nombre, descripcion) VALUES ('Alimentos', 'Todo alimentos');

--==> Inserción de categorías
insert into categoria (nombre, idfamilia) values ('Agua Mineral',1);
insert into categoria (nombre, idfamilia) values ('Leche',2);
insert into categoria (nombre, idfamilia) values ('Detergentes',3);
insert into categoria (nombre, idfamilia) values ('Carnes',4);

--==> Inserción de productos
INSERT INTO producto (nombre, stock, monto, idcategoria) VALUES ('Agua Cielo', 10, 2.5, 1);
INSERT INTO producto (nombre, stock, monto, idcategoria) VALUES ('Leche condensada', 20, 1.5, 2);
INSERT INTO producto (nombre, stock, monto, idcategoria) VALUES ('Detergente Líquido', 30, 3.0, 3);
INSERT INTO producto (nombre, stock, monto, idcategoria) VALUES ('Carne de Res', 25, 5.0, 4);