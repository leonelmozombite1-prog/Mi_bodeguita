# Mi Bodeguita — Sistema de Registro Financiero

Sistema web MVC desarrollado en PHP puro que permite al administrador de una bodega registrar, consultar y gestionar sus ingresos y gastos mensuales desde un panel privado.

---

## Tecnologías utilizadas

- PHP 8+ (sin frameworks)
- MySQL
- Bootstrap 5
- Font Awesome 6
- Poppins (Google Fonts)
- Arquitectura MVC propia

---

## Instalación

1. Clona o descomprime el proyecto dentro de tu servidor local (por ejemplo `htdocs/` en XAMPP).
2. Crea la base de datos ejecutando el archivo `basedatos.sql` en tu gestor MySQL.
3. Copia `.env.example` como `.env` y completa tus datos de conexión:

```
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=mi_bodeguita
DB_USERNAME=root
DB_PASSWORD=
APP_URL=http://localhost/mi-bodeguita
```

4. Asegúrate de que el módulo `mod_rewrite` esté activo en Apache (el `.htaccess` lo requiere).
5. Accede desde el navegador a la URL configurada en `APP_URL`.

---

## Estructura del proyecto

```
mi-bodeguita/
├── app/
│   ├── config/         # Configuración de BD y constantes
│   ├── controllers/    # Lógica de cada módulo
│   ├── core/           # Router, App, Controller base, Database
│   ├── models/         # Acceso a la base de datos
│   └── views/          # Vistas HTML/PHP por módulo
├── public/
│   ├── css/            # Estilos del dashboard y landing
│   ├── js/             # Scripts del dashboard y landing
│   └── image/          # Imágenes y SVGs
├── .env
├── .htaccess
└── basedatos.sql
```

---

## Funcionalidades

### Landing pública (`/`)
Página de presentación del sistema con fondo animado. Incluye un menú hamburguesa que abre un panel con el acceso directo al login.

### Login (`/login`)
Formulario de acceso para el administrador. Valida usuario y contraseña contra la tabla `usuario`. Si las credenciales son correctas, inicia sesión y redirige al dashboard. En caso contrario muestra un mensaje de error.

### Dashboard (`/dashboard`)
Panel principal protegido por sesión. Muestra los últimos 5 ingresos y los últimos 5 gastos registrados en dos tablas con acceso rápido a cada módulo completo.

### Ingresos (`/ingresos`)
Lista todos los ingresos registrados ordenados por fecha descendente. Desde aquí el administrador puede registrar un nuevo ingreso, editar uno existente o eliminarlo.

### Gastos (`/gastos`)
Lista todos los gastos registrados ordenados por fecha descendente. Igual que ingresos, permite registrar, editar y eliminar.

### Resumen (`/resumen`)
Consulta financiera por mes. Permite seleccionar un mes y ver el total de ingresos, total de gastos y la ganancia neta del período.

### Logout (`/logout`)
Destruye la sesión activa y redirige al login.

---

## Usuarios de prueba

Los siguientes usuarios vienen precargados en `basedatos.sql`:

| Usuario | Contraseña |
|---------|-----------|
| Jhojan  | 123456    |
| Daniel  | 123456    |
| Gabriel | 123456    |
| Luka    | 123456    |
| Sandra  | 123456    |

---

## Rutas disponibles

| Ruta | Descripción |
|------|-------------|
| `/` | Landing pública |
| `/login` | Formulario de acceso |
| `/logout` | Cerrar sesión |
| `/dashboard` | Panel principal |
| `/ingresos` | Lista de ingresos |
| `/ingresos/registro` | Formulario nuevo ingreso |
| `/ingresos/editar?id=X` | Formulario editar ingreso |
| `/ingresos/guardar` | Guardar nuevo ingreso (POST) |
| `/ingresos/actualizar` | Actualizar ingreso (POST) |
| `/ingresos/eliminar` | Eliminar ingreso (POST) |
| `/gastos` | Lista de gastos |
| `/gastos/registro` | Formulario nuevo gasto |
| `/gastos/editar?id=X` | Formulario editar gasto |
| `/gastos/guardar` | Guardar nuevo gasto (POST) |
| `/gastos/actualizar` | Actualizar gasto (POST) |
| `/gastos/eliminar` | Eliminar gasto (POST) |
| `/resumen` | Consulta de ganancia por mes |
