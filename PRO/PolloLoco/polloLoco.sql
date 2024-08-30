-- PolloLoco

DROP DATABASE IF EXISTS restaurante;
CREATE DATABASE restaurante CHARACTER SET utf8mb4;
USE restaurante;

CREATE TABLE usuario (
  id int auto_increment,
  cuenta varchar(25) not null,
  nombre varchar(25),
  apellidos varchar(25),
  contrasena varchar(25),
  email varchar(45),
  telefono varchar(9),
  ciudad varchar(25),
  cp varchar(5),
  calle varchar(25),
  numero varchar(25),
  piso varchar(25),
  letra varchar(5),
  rol enum ('cliente', 'cocina', 'reparto', 'boss'),
  PRIMARY KEY (id)
);

CREATE TABLE productos (
  id INT AUTO_INCREMENT,
  nombre VARCHAR(50),
  descripcion TEXT,
  precio TEXT, -- he cambiado float a text
  imagen TEXT,
  categoria VARCHAR(25),
  alergenos varchar (150),
  proveedor varchar(50),
  tiempoPreparacion varchar(50),
  PRIMARY KEY (id)
);

CREATE TABLE pedido (
   id int auto_increment,
   estado enum ('hecho', 'en proceso', 'pendiente'),
   PRIMARY KEY (id)
);

CREATE TABLE detalle_pedido (
   pedido_id int,
   producto_id int,
   cantidad int,
   FOREIGN KEY (pedido_id) REFERENCES pedido(id),
   FOREIGN KEY (producto_id) REFERENCES productos(id),
   PRIMARY KEY (pedido_id, producto_id)
);
select * from productos;
 select * from usuario;
 -- EJEMPLOS
 -- BOSS
 insert into usuario (cuenta, contrasena, rol) values ('m', 'm', 'boss');
  insert into usuario (cuenta, contrasena, rol) values ('c', 'c', 'cliente');
delete from usuario where id=4;
INSERT INTO usuario (cuenta, nombre, apellidos, contrasena, email, telefono, ciudad, cp, calle, numero, piso, letra, rol)
VALUES 
-- Empleados de cocina
('cocinero1', 'Pedro', 'García', 'password123', 'pedro@example.com', '987654321', 'Madrid', '28001', 'Calle Secundaria', '456', '1', 'B', 'cocina'),
('cocinero2', 'Ana', 'Martínez', 'password456', 'ana@example.com', '876543210', 'Barcelona', '08002', 'Calle Tercera', '789', '2', 'C', 'cocina'),
('cocinero3', 'Luis', 'Fernández', 'password789', 'luis@example.com', '765432109', 'Valencia', '46003', 'Calle Cuarta', '101', '3', 'D', 'cocina'),

-- Empleados de reparto
('repartidor1', 'Carlos', 'Sánchez', 'password123', 'carlos@example.com', '654321098', 'Sevilla', '41004', 'Avenida Primera', '202', '4', 'E', 'reparto'),
('repartidor2', 'Marta', 'Gómez', 'password456', 'marta@example.com', '543210987', 'Bilbao', '48005', 'Avenida Segunda', '303', '5', 'F', 'reparto'),
('repartidor3', 'Diego', 'Ruiz', 'password789', 'diego@example.com', '432109876', 'Granada', '18006', 'Avenida Tercera', '404', '6', 'G', 'reparto'),

-- Clientes
('cliente1', 'Juan', 'López', 'contraseña1', 'juan@example.com', '123456789', 'Ciudad de México', '12345', 'Calle Principal', '123', '2', 'A', 'cliente'),
('cliente2', 'Sofía', 'Hernández', 'contraseña2', 'sofia@example.com', '234567890', 'Guadalajara', '67890', 'Calle Secundaria', '456', '3', 'B', 'cliente'),
('cliente3', 'Mario', 'Pérez', 'contraseña3', 'mario@example.com', '345678901', 'Monterrey', '23456', 'Calle Tercera', '789', '4', 'C', 'cliente');


-- INSERT INTO productos (nombre, descripcion, precio, imagen, categoria) VALUES   ('Pizza Margarita', 'Deliciosa pizza con salsa de tomate, mozzarella y albahaca fresca', 9.99, 'https://ejemplo.com/pizza_margarita.jpg', 'Pizzas'),  ('Hamburguesa Clásica', 'Jugosa hamburguesa con carne de res, lechuga, tomate, cebolla y mayonesa', 7.49, 'https://cochesnuevos.autofacil.es/img/AUDI_A3_SPORTBACK_2020.jpg', 'Hamburguesas');

-- INSERT INTO productos (nombre, descripcion, precio, imagen, categoria, alergenos, proveedor, tiempoPreparacion) VALUES 
  -- Hamburguesas  ('Hamburguesa Clásica', 'Jugosa hamburguesa con carne de res, lechuga, tomate, cebolla y mayonesa', 7.49, 'https://img.freepik.com/fotos-premium/foto-stock-hamburguesa-clasica-aislada-blanco_940723-217.jpg', 'Hamburguesas', 'Ninguno', 'Carnes de la Abuela S.A.', '15 minutos'),   ('Hamburguesa BBQ', 'Hamburguesa con carne de res, queso cheddar, cebolla caramelizada y salsa BBQ', 8.99, 'https://static.vecteezy.com/system/resources/previews/030/622/548/large_2x/a-closeup-magazine-quality-shot-of-a-luscious-hambu-free-photo.jpg', 'Hamburguesas', 'Ninguno', 'Lácteos del Valle', '18 minutos'),   ('Hamburguesa Vegana', 'Hamburguesa con patty de garbanzos, aguacate, lechuga y tomate', 6.99, 'https://statics-cuidateplus.marca.com/cms/styles/natural/azblob/hamburguesa_vegetal_ok.jpg.webp?itok=rLa1Hqy1', 'Hamburguesas', 'Ninguno', 'Verduras Eco', '20 minutos'),


  -- Pizzas   ('Pizza Margarita', 'Deliciosa pizza con salsa de tomate, mozzarella y albahaca fresca', 9.99, 'https://ejemplo.com/pizza_margarita.jpg', 'Pizzas', 'Ninguno', 'Pizza Italia SRL', '25 minutos'),   ('Pizza Pepperoni', 'Pizza con salsa de tomate, mozzarella y pepperoni', 10.99, 'https://ejemplo.com/pizza_pepperoni.jpg', 'Pizzas', 'Ninguno', 'Pizza Italia SRL', '28 minutos'),  ('Pizza Cuatro Quesos', 'Pizza con una mezcla de mozzarella, gorgonzola, parmesano y queso de cabra', 11.99, 'https://ejemplo.com/pizza_cuatro_quesos.jpg', 'Pizzas', 'Ninguno', 'Pizza Italia SRL', '30 minutos'),

  -- Bocadillos   ('Bocadillo de Jamón', 'Bocadillo con jamón serrano, tomate y aceite de oliva', 5.99, 'https://ejemplo.com/bocadillo_jamon.jpg', 'Bocadillos', 'Gluten', 'Panadería la Esquina', '10 minutos'),   ('Bocadillo Vegetal', 'Bocadillo con lechuga, tomate, huevo cocido y mayonesa', 4.99, 'https://ejemplo.com/bocadillo_vegetal.jpg', 'Bocadillos', 'Huevos Gallegos', '12 minutos'),   ('Bocadillo de Atún', 'Bocadillo con atún, tomate y pimientos', 6.49, 'https://ejemplo.com/bocadillo_atun.jpg', 'Bocadillos', 'Pescados del Mar', '15 minutos'),

  -- Bebidas   ('Coca Cola', 'Refresco de cola', 1.99, 'https://ejemplo.com/coca_cola.jpg', 'Bebidas', 'Ninguno', 'Refrescos S.A.', '5 minutos'),   ('Agua Mineral', 'Botella de agua mineral', 1.49, 'https://ejemplo.com/agua_mineral.jpg', 'Bebidas', 'Ninguno', 'Aguas del Manantial', '2 minutos'),   ('Zumo de Naranja', 'Zumo de naranja recién exprimido', 2.99, 'https://ejemplo.com/zumo_naranja.jpg', 'Bebidas', 'Ninguno', 'Frutas Naturales S.L.', '7 minutos');
 
 
 INSERT INTO productos (nombre, descripcion, precio, imagen, categoria, alergenos, proveedor, tiempoPreparacion) VALUES
  -- Hamburguesas
  ('Hamburguesa Clásica', 'Jugosa hamburguesa con carne de res, lechuga, tomate, cebolla y mayonesa', '7.49', 'https://img.freepik.com/fotos-premium/foto-stock-hamburguesa-clasica-aislada-blanco_940723-217.jpg', 'Hamburguesas', 'Ninguno', 'Carnes de la Abuela S.A.', '15 minutos'),
  ('Hamburguesa BBQ', 'Hamburguesa con carne de res, queso cheddar, cebolla caramelizada y salsa BBQ', '8.99', 'https://static.vecteezy.com/system/resources/previews/030/622/548/large_2x/a-closeup-magazine-quality-shot-of-a-luscious-hambu-free-photo.jpg', 'Hamburguesas', 'Ninguno', 'Lácteos del Valle', '18 minutos'),
  ('Hamburguesa Vegana', 'Hamburguesa con patty de garbanzos, aguacate, lechuga y tomate', '6.99', 'https://statics-cuidateplus.marca.com/cms/styles/natural/azblob/hamburguesa_vegetal_ok.jpg.webp?itok=rLa1Hqy1', 'Hamburguesas', 'Ninguno', 'Verduras Eco', '20 minutos'),

  -- Pizzas
  ('Pizza Margarita', 'Deliciosa pizza con salsa de tomate, mozzarella y albahaca fresca', '9.99', 'https://imag.bonviveur.com/pizza-con-diferentes-ingredientes-vegetales-y-jamon.jpg', 'Pizzas', 'Ninguno', 'Pizza Italia SRL', '25 minutos'),
  ('Pizza Pepperoni', 'Pizza con salsa de tomate, mozzarella y pepperoni', '10.99', 'https://www.cobsbread.com/us/wp-content//uploads/2022/09/Pepperoni-pizza-850x630-1.png', 'Pizzas', 'Ninguno', 'Pizza Italia SRL', '28 minutos'),
  ('Pizza Cuatro Quesos', 'Pizza con una mezcla de mozzarella, gorgonzola, parmesano y queso de cabra', '11.99', 'https://www.foodandwine.com/thmb/Wd4lBRZz3X_8qBr69UOu2m7I2iw=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/classic-cheese-pizza-FT-RECIPE0422-31a2c938fc2546c9a07b7011658cfd05.jpg', 'Pizzas', 'Ninguno', 'Pizza Italia SRL', '30 minutos'),

  -- Bocadillos
  ('Bocadillo de Jamón', 'Bocadillo con jamón serrano, tomate y aceite de oliva', '5.99', 'https://thespanishradish.com/wp-content/uploads/2023/05/bocadillo-de-jamon-600x-jpg.webp', 'Bocadillos', 'Gluten', 'Panadería la Esquina', '10 minutos'),
  ('Bocadillo Vegetal', 'Bocadillo con lechuga, tomate, huevo cocido y mayonesa', '4.99', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-bArGiTWZ8cCx4kSupDNv1Xk98Jg6sGD9uw&s', 'Bocadillos', 'Huevos', 'Verdurería la Panadera', '12 minutos'),
  ('Bocadillo de Atún', 'Bocadillo con atún, tomate y pimientos', '6.49', 'https://s1.abcstatics.com/media/gurmesevilla/2013/01/bocadillo-atun-morron.jpg', 'Bocadillos', 'Pescados del Mar', 'Pescadería la Panadera', '15 minutos'),

  -- Bebidas
  ('Coca Cola', 'Refresco de cola', 1.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQO8UUgEzRxxUoVBeXArFrNOa_Un75hX4cBFw&s', 'Bebidas', 'Ninguno', 'Refrescos S.A.', '5 minutos'),
  ('Agua Mineral', 'Botella de agua mineral', 1.49, 'https://www.lavanguardia.com/files/og_thumbnail/files/fp/uploads/2020/10/05/5f7b260277fed.r_d.1244-497-0.jpeg', 'Bebidas', 'Ninguno', 'Aguas del Manantial', '2 minutos'),
  ('Zumo de Naranja', 'Zumo de naranja recién exprimido', 2.99, 'https://www.gastronomiavasca.net/uploads/image/file/3224/Zumo_de_naranja.jpg', 'Bebidas', 'Ninguno', 'Frutas Naturales S.L.', '7 minutos');


       
insert into pedido (estado) values ('en proceso');       
       
INSERT INTO detalle_pedido (pedido_id, producto_id, cantidad) VALUES
(1, 1, 3), -- Producto 1 con una cantidad de 3 unidades
(1, 2, 2); -- Producto 2 con una cantidad de 2 unidades
       
-- Muestra los detalles de todos los productos de un pedido
-- SELECT d.pedido_id, p.id AS producto_id, p.nombre AS nombre_producto, p.descripcion AS descripcion_producto, p.precio AS precio_producto, p.url AS url_producto, p.categoria AS categoria_producto, d.cantidad FROM detalle_pedido d JOIN productos p ON d.producto_id = p.id WHERE d.pedido_id = 1;

select * from productos;

SELECT * FROM productos WHERE categoria = 'Hamburguesas' ORDER BY categoria;

 INSERT INTO productos (nombre, descripcion, precio, imagen, categoria, alergenos, proveedor, tiempoPreparacion) VALUES
('PACO', 'Jugosa hamburguesa con carne de res, lechuga, tomate, cebolla y mayonesa', '7.49', 'https://img.freepik.com/fotos-premium/foto-stock-hamburguesa-clasica-aislada-blanco_940723-217.jpg', 'Hamburguesas', 'Ninguno', 'Carnes de la Abuela S.A.', '15 minutos');

select * FROM productos WHERE nombre = 'PACO';
DELETE  FROM productos WHERE nombre = 'PACO';


SET SQL_SAFE_UPDATES = 0;
DELETE FROM productos WHERE nombre = 'jt';
SET SQL_SAFE_UPDATES = 1;


DELETE FROM productos WHERE nombre = 'PACO' AND id = 14;

update productos set nombre='sandra' where id= 25;