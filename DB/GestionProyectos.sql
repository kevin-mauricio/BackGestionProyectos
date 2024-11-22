-- Crear base de datos
CREATE DATABASE GestionProyectos;
USE GestionProyectos;

-- Tabla de compañías
CREATE TABLE companias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    nit VARCHAR(20) NOT NULL UNIQUE,
    telefono VARCHAR(20) NOT NULL,
    direccion VARCHAR(200),
    correo VARCHAR(100) NOT NULL UNIQUE
);

-- Tabla de proyectos
CREATE TABLE proyectos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    compania_id INT NOT NULL,
    FOREIGN KEY (compania_id) REFERENCES companias(id) ON DELETE CASCADE
);

-- Tabla de historias de usuario
CREATE TABLE historias_usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(200) NOT NULL,
    proyecto_id INT NOT NULL,
    FOREIGN KEY (proyecto_id) REFERENCES proyectos(id) ON DELETE CASCADE
);

-- Tabla de tickets
CREATE TABLE tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descripcion VARCHAR(500) NOT NULL,
    comentarios TEXT,
    estado ENUM('Activo', 'En Proceso', 'Finalizado') DEFAULT 'Activo',
    historia_usuario_id INT NOT NULL,
    FOREIGN KEY (historia_usuario_id) REFERENCES historias_usuario(id) ON DELETE CASCADE
);

-- Tabla de usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    contrasena VARCHAR(255) NOT NULL,
    compania_id INT NOT NULL,
    FOREIGN KEY (compania_id) REFERENCES companias(id) ON DELETE CASCADE
);

-- Datos iniciales para compañías
INSERT INTO companias (nombre, nit, telefono, direccion, correo)
VALUES
('Compañía A', '123456789', '111-222-333', 'Calle 1 #2-3', 'contacto@companiaa.com'),
('Compañía B', '987654321', '444-555-666', 'Calle 4 #5-6', 'contacto@companiab.com'),
('Compañía C', '456789123', '777-888-999', 'Calle 7 #8-9', 'contacto@companiac.com');

-- Datos iniciales para proyectos
INSERT INTO proyectos (nombre, compania_id)
VALUES
('Proyecto 1', 1),
('Proyecto 2', 2),
('Proyecto 3', 2);

-- Datos iniciales para historias de usuario
INSERT INTO historias_usuario (titulo, proyecto_id)
VALUES
('Historia 1 - Carrito de compras', 1),
('Historia 2 - Catálogo de productos', 1),
('Historia 3 - Gestión de pedidos', 1),
('Historia 1 - Autenticación de usuarios', 2),
('Historia 2 - Dashboard administrativo', 2),
('Historia 1 - Generación de reportes', 3);

-- Datos iniciales para tickets
INSERT INTO tickets (descripcion, comentarios, estado, historia_usuario_id)
VALUES
('Crear la interfaz del carrito de compras', 'Se debe usar React', 'En Proceso', 1),
('Implementar lógica de carrito', 'Pendiente de validaciones', 'En Proceso', 1),
('Crear página de catálogo', 'Verificar diseño con el cliente', 'Finalizado', 2),
('Optimizar búsqueda en catálogo', 'Prioridad baja', 'Finalizado', 2),
('Configurar roles de usuario', 'Definir permisos específicos', 'Activo', 4),
('Implementar dashboard de métricas', 'Pendiente de mockups', 'En Proceso', 5),
('Generar reportes de ventas', 'Se necesitan datos históricos', 'Finalizado', 6);

-- Datos iniciales para usuarios
INSERT INTO usuarios (nombre, correo, contrasena, compania_id)
VALUES
('Juan Pérez', 'juan.perez@companiaa.com', 'contrasena_encriptada', 1),
('Ana Gómez', 'ana.gomez@companiab.com', 'contrasena_encriptada', 2),
('Carlos Ruiz', 'carlos.ruiz@companiac.com', 'contrasena_encriptada', 3);
