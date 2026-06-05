# CONCEPTS.md

Proyecto MVC adaptado a **Mi Bodeguita**.

## Estructura

```
mi-bodeguita-system/
├── app/
├── public/
├── sql/
├── .env
├── .env.example
├── .htaccess
├── README.md
└── CONCEPTS.md
```

## Controladores

- `HomeController`: landing pública
- `LoginController`: acceso del administrador
- `DashboardController`: resumen financiero
- `IngresosController`: listado de ingresos
- `GastosController`: listado de gastos
- `ResumenController`: consulta por mes
- `LogoutController`: cierre de sesión

## Modelos

- `Login.php`
- `Ingreso.php`
- `Gasto.php`
- `Resumen.php`

## Vistas

- `home/`
- `auth/`
- `dashboard/`
- `ingresos/`
- `gastos/`
- `resumen/`
- `layouts/`

## Objetivo

Permitir que el dueño registre movimientos y conozca la ganancia mensual real del negocio de forma rápida y clara.
