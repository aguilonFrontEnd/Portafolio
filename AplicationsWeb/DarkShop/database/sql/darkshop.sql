-- Tabla de Usuarios (Usuarios que administran la tienda)
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    correo VARCHAR(255) NOT NULL UNIQUE,
    contraseña VARCHAR(255) NOT NULL,
    foto_perfil VARCHAR(255),
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    actualizado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabla de Roles (Roles de los usuarios)
CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_rol VARCHAR(255) NOT NULL,
    descripcion TEXT,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    actualizado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabla de Productos (Productos disponibles en la tienda)
CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10,2) NOT NULL,
    codigo_producto VARCHAR(255) NOT NULL UNIQUE,
    imagen VARCHAR(255),
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    actualizado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabla de Categorías (Categorías de productos)
CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    actualizado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Relación muchos a muchos entre productos y categorías
CREATE TABLE productos_categorias (
    id_producto INT NOT NULL,
    id_categoria INT NOT NULL,
    PRIMARY KEY (id_producto, id_categoria),
    FOREIGN KEY (id_producto) REFERENCES productos(id),
    FOREIGN KEY (id_categoria) REFERENCES categorias(id)
);

-- Tabla de Tallas (Tallas de las prendas)
CREATE TABLE tallas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    talla VARCHAR(255) NOT NULL,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    actualizado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Relación entre productos y tallas (cantidad disponible para cada talla)
CREATE TABLE productos_tallas (
    id_producto INT NOT NULL,
    id_talla INT NOT NULL,
    stock INT NOT NULL,
    PRIMARY KEY (id_producto, id_talla),
    FOREIGN KEY (id_producto) REFERENCES productos(id),
    FOREIGN KEY (id_talla) REFERENCES tallas(id)
);

-- Tabla de Carritos (Cestas de compras de los usuarios)
CREATE TABLE carritos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    estado ENUM('PENDIENTE', 'CANCELADO', 'EN ESPERA') DEFAULT 'PENDIENTE',
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    actualizado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

-- Tabla de Elementos del carrito (Productos que un usuario tiene en su carrito)
CREATE TABLE elementos_carrito (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_carrito INT NOT NULL,
    id_producto INT NOT NULL,
    id_talla INT NOT NULL,
    cantidad INT NOT NULL,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    actualizado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_carrito) REFERENCES carritos(id),
    FOREIGN KEY (id_producto) REFERENCES productos(id),
    FOREIGN KEY (id_talla) REFERENCES tallas(id)
);

-- Tabla de Pedidos (Pedidos realizados por los usuarios)
CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_carrito INT NOT NULL,
    estado_pedido ENUM('PENDIENTE', 'CANCELADO', 'COMPLETADO') DEFAULT 'PENDIENTE',
    precio_total DECIMAL(10,2) NOT NULL,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    actualizado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_carrito) REFERENCES carritos(id)
);

-- Tabla de Elementos del Pedido (Productos dentro de un pedido)
CREATE TABLE elementos_pedido (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_pedido INT NOT NULL,
    id_producto INT NOT NULL,
    id_talla INT NOT NULL,
    cantidad INT NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    actualizado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_pedido) REFERENCES pedidos(id),
    FOREIGN KEY (id_producto) REFERENCES productos(id),
    FOREIGN KEY (id_talla) REFERENCES tallas(id)
);

-- Tabla de Pagos (Pagos realizados por los usuarios)
CREATE TABLE pagos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_pedido INT NOT NULL,
    metodo_pago VARCHAR(255) NOT NULL,
    estado_pago ENUM('PENDIENTE', 'COMPLETADO', 'FALLIDO') DEFAULT 'PENDIENTE',
    monto DECIMAL(10,2) NOT NULL,
    fecha_pago TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_pedido) REFERENCES pedidos(id)
);

-- Tabla de Historial de Actividades (Historial de cambios de estado de productos, pedidos, etc.)
CREATE TABLE historial_actividades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_pedido INT NOT NULL,
    id_producto INT NOT NULL,
    accion VARCHAR(255) NOT NULL,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_pedido) REFERENCES pedidos(id),
    FOREIGN KEY (id_producto) REFERENCES productos(id)
);

