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
INSERT INTO familia (nombre, descripcion) VALUES ('Bebidas','Todo bebidas'),
('Lácteos','Todo lácteos'),
('Limpieza', 'Todo limpieza'),
('Alimentos', 'Todo alimentos');

--==> Inserción de categorías
INSERT INTO categoria (nombre, idfamilia) VALUES 
('Agua Mineral',1),
('Leche',2), 
('Detergentes',3), 
('Carnes',4);

--==> Inserción de productos
INSERT INTO producto (nombre, stock, monto, idcategoria) VALUES 
('Agua Cielo', 10, 2.5, 1),
('Leche condensada', 20, 1.5, 2),
('Detergente Líquido', 30, 3.0, 3),
('Carne de Res', 25, 5.0, 4);