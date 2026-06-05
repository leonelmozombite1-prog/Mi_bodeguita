
###  Mi_bodeguita
Aplicación web para el registro y gestión de asistencia del personal, desarrollada en **PHP puro con arquitectura MVC desde cero**, **Programación Orientada a Objetos (POO)**, **PDO** y **MariaDB** como base de datos.

## 1. Descripción del Negocio

El negocio se llama "MI BODEGUITA  Se trata de un emprendimiento local o comercial que, según sus registros de ingresos, se dedica a la venta de alimentos de primera necesidad.

## 2. Problema y Solución

### Problema Identificado
Las bodegas y pequeños negocios suelen registrar sus ingresos y gastos de forma manual en cuadernos, hojas de cálculo o incluso de memoria. Esto genera dificultades para controlar el flujo de dinero, conocer las ganancias reales y tomar decisiones oportunas sobre compras, ventas e inversiones.
Además, cuando el propietario necesita revisar gastos anteriores, identificar quién realizó un registro o verificar movimientos de una fecha específica, el proceso resulta lento y propenso a errores.
---
# Causas
Resistencia al cambio: Existe un hábito arraigado de usar el cuaderno físico ("el cuaderno de fiados" o de apuntes) debido a que se percibe como el método más rápido y tradicional.

Brecha digital: Algunos comerciantes sienten desconfianza o falta de familiaridad hacia las herramientas digitales, aplicaciones o sistemas de gestión en la nube.

Percepción de costos: Se suele pensar que implementar un sistema de control financiero requiere una gran inversión en software licencias o equipos informáticos complejos, ignorando que existen soluciones sencillas y accesibles.


### Solución Propuesta
El software "Mi Bodeguita" permite gestionar los movimientos económicos del negocio mediante módulos de ingresos y gastos, donde el usuario puede:
•	Registrar nuevos ingresos y gastos. 
•	Visualizar los movimientos registrados. 
•	Editar información incorrecta. 
•	Eliminar registros innecesarios. 
•	Identificar al usuario que realizó cada operación. 
•	Consultar montos y fechas de cada movimiento.


## 3. Preanálisis

### Necesidades Identificadas
El Problema: Los pequeños comercios suelen registrar sus cuentas manualmente (cuadernos, hojas de cálculo o de memoria). Esto genera descontrol en el flujo de caja, desconocimiento de las ganancias reales y lentitud al auditar movimientos o buscar errores.

Las Causas: Resistencia cultural al cambio (apego al cuaderno físico), brecha digital ante sistemas complejos y la falsa percepción de que el software financiero es costoso.

Necesidades Identificadas: El negocio urge de centralización financiera, agilidad para buscar/editar datos históricos, trazabilidad para saber qué usuario registra cada movimiento y seguridad para restringir el acceso a la información confidencial.

### Estudio de Viabilidad

#### Viabilidad Técnica
- PHP 8+ disponible en prácticamente cualquier servidor web
- MariaDB es un gestor gratuito, robusto y ampliamente documentado
- Apache con `mod_rewrite` disponible en XAMPP para desarrollo local
- La POO permite estructurar el sistema con clases, herencia y encapsulamiento
- El patrón MVC está documentado en [`CONCEPTS.md`](./CONCEPTS.md)

#### Viabilidad Económica
- Stack completamente open source y gratuito (PHP, MariaDB, Apache, Git)
- Entorno de desarrollo levantable localmente con XAMPP sin costo
- No se requieren licencias de software adicionales

#### Viabilidad Operacional
- Los usuarios solo necesitan un navegador web para acceder
- Administrable de forma remota una vez desplegado
- La separación en módulos facilita la capacitación del personal

### Alcance del Sistema

#### Dentro del alcance
- Autenticación con sesiones PHP y roles (administrador / empleado)
- Módulo de empleados: CRUD completo
- Módulo de departamentos: gestión de áreas
- Módulo de asistencia: registro de entrada/salida e historial
- Dashboard con resumen de asistencias del día
- Layouts reutilizables (header, footer, navbar) — principio DRY

#### Fuera del alcance
- Integración con dispositivos biométricos
- Módulo de nómina o cálculo de salarios
- Aplicación móvil nativa (iOS / Android)
- Notificaciones por correo o SMS
- Integración con sistemas ERP externos

---

## 4. Análisis de Requisitos

### 4.1 Requisitos Funcionales
Falta
### 4.2 Requisitos No Funcionales
Falta
## Stack Tecnológico

| Capa | Tecnología |
|---|---|
| **Backend** | PHP 8+ — POO (Programación Orientada a Objetos) — MVC desde cero |
| **Base de datos** | MariaDB — PDO (PHP Data Objects) con prepared statements |
| **Frontend** | HTML5, CSS3, JavaScript — Vistas PHP con layouts reutilizables |
| **Servidor web** | Apache — Reescritura de URLs vía `.htaccess` |
| **Control de versiones** | Git + GitHub |
| **Configuración** | Variables de entorno (`.env`) para credenciales |
---

## Arquitectura del Proyecto

El sistema aplica **POO** y **MVC** implementado desde cero. Los 4 pilares de POO en el proyecto:


### Requisitos previos
- PHP 8+
- Servidor web local o hosting
- MariaDB / MySQL

### Pasos

```bash
# 1. Clonar el repositorio
git clone https://github.com/Mi_bodeguita

# 2. Configurar variables de entorno
cp .env.example .env
# Editar .env con tus credenciales de base de datos

# 3. Crear la base de datos

## TRELLO
<img width="997" height="549" alt="image" src="https://github.com/user-attachments/assets/7ec1c5a9-ce4b-415d-9f47-879369839377" />


### DIAGRAMA DE FIGMA UI/UX

##FIGMA UX 
<img width="1340" height="331" alt="image" src="https://github.com/user-attachments/assets/61492134-9d78-4cdf-8b86-6d75e1ba163a" />


## Base de datos
```sql
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


### Diagrama Entidad-Relacion (DER)
Falta integrar

 
### Modelo Relacional (MR)
![MODELO_RELACIONAL](https://raw.githubusercontent.com/ojitoslanda/testing/refs/heads/master/img/db.png)

### Cardinalidades

Las cardinalidades describen cuántos registros de una tabla se relacionan con cuántos de otra.

**cargo → empleado (1:N)**
Un cargo puede estar asignado a muchos empleados.
Un empleado solo puede tener un cargo.
```
cargo (1) -----< empleado (N)
```

**empleado → asistencia (1:N)**
Un empleado puede tener muchos registros de asistencia (uno por día).
Cada registro de asistencia pertenece a un solo empleado.
```
empleado (1) -----< asistencia (N)
```

**usuario**
La tabla usuario es independiente. No se relaciona con empleado ni con asistencia.
Representa las cuentas de acceso al sistema (administradores), no a los empleados.



