CREATE DATABASE mi_bodeguita;
USE mi_bodeguita;

CREATE TABLE usuario (
  id_usuario INT AUTO_INCREMENT PRIMARY KEY,
  nombre_usuario VARCHAR(120) NOT NULL UNIQUE,
  clave VARCHAR(255) NOT NULL,
  rol ENUM('admin') NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE ingreso (
  id_ingreso INT AUTO_INCREMENT PRIMARY KEY,
  concepto VARCHAR(150) NOT NULL,
  descripcion TEXT,
  monto DECIMAL(10,2) NOT NULL,
  fecha DATE NOT NULL,
  id_usuario INT NOT NULL,
  FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE gasto (
  id_gasto INT AUTO_INCREMENT PRIMARY KEY,
  concepto VARCHAR(150) NOT NULL,
  descripcion TEXT,
  monto DECIMAL(10,2) NOT NULL,
  fecha DATE NOT NULL,
  id_usuario INT NOT NULL,
  FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO usuario (nombre_usuario, clave, rol) VALUES
('Jhojan', '123456', 'admin'),
('Daniel', '123456', 'admin'),
('Gabriel', '123456', 'admin'),
('Luka', '123456', 'admin'),
('Sandra', '123456', 'admin');

INSERT INTO ingreso (concepto, descripcion, monto, fecha, id_usuario) VALUES
('Venta de abarrotes', 'Ingreso por ventas del turno mañana', 350.00, '2026-05-02', 1),
('Venta de bebidas', 'Ingreso por bebidas y snacks', 180.50, '2026-05-05', 2),
('Recarga virtual', 'Comisión por recargas telefónicas', 95.00, '2026-05-08', 3),
('Venta de productos de limpieza', 'Ingreso por productos del hogar', 240.00, '2026-05-14', 4),
('Venta fin de semana', 'Ingreso acumulado del sábado', 420.75, '2026-05-18', 5);

INSERT INTO gasto (concepto, descripcion, monto, fecha, id_usuario) VALUES
('Compra de mercadería', 'Reposición de abarrotes y bebidas', 210.00, '2026-05-03', 1),
('Pago de luz', 'Servicio eléctrico del local', 85.50, '2026-05-06', 2),
('Compra de bolsas', 'Bolsas para atención al cliente', 25.00, '2026-05-09', 3),
('Pago de internet', 'Servicio mensual de internet', 79.90, '2026-05-12', 4),
('Compra de limpieza', 'Productos de limpieza para la tienda', 48.30, '2026-05-19', 5);
