# CRUD — Mi Bodeguita

Documentación de las operaciones Create, Read, Update y Delete implementadas en el sistema para los módulos de **Ingresos** y **Gastos**.

---

## Tablas involucradas

```sql
CREATE TABLE ingreso (
  id_ingreso  INT AUTO_INCREMENT PRIMARY KEY,
  concepto    VARCHAR(150) NOT NULL,
  descripcion TEXT,
  monto       DECIMAL(10,2) NOT NULL,
  fecha       DATE NOT NULL,
  id_usuario  INT NOT NULL,
  FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);

CREATE TABLE gasto (
  id_gasto    INT AUTO_INCREMENT PRIMARY KEY,
  concepto    VARCHAR(150) NOT NULL,
  descripcion TEXT,
  monto       DECIMAL(10,2) NOT NULL,
  fecha       DATE NOT NULL,
  id_usuario  INT NOT NULL,
  FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);
```

---

## CRUD de Ingresos

### CREATE — Registrar ingreso

**Ruta:** `GET /ingresos/registro` → muestra el formulario  
**Ruta:** `POST /ingresos/guardar` → procesa y guarda

El formulario solicita: concepto, monto, fecha y descripción (opcional). El `id_usuario` se toma automáticamente de la sesión activa.

Método en el modelo `Ingreso.php`:
```php
public function guardar(array $datos): void {
    $sql = "INSERT INTO ingreso (concepto, descripcion, monto, fecha, id_usuario)
            VALUES (:concepto, :descripcion, :monto, :fecha, :id_usuario)";
    $stmt = $this->db->prepare($sql);
    $stmt->execute($datos);
}
```

Flujo: formulario → `POST /ingresos/guardar` → `guardar()` en modelo → redirect a `/ingresos`.

---

### READ — Listar ingresos

**Ruta:** `GET /ingresos`

Obtiene todos los ingresos ordenados por fecha descendente, haciendo JOIN con la tabla `usuario` para mostrar el nombre de quien registró.

Método en el modelo:
```php
public function obtenerTodos(): array {
    $sql = "SELECT i.id_ingreso, i.concepto, i.descripcion, i.monto, i.fecha, u.nombre_usuario
            FROM ingreso i
            INNER JOIN usuario u ON u.id_usuario = i.id_usuario
            ORDER BY i.fecha DESC, i.id_ingreso DESC";
    return $this->db->query($sql)->fetchAll();
}
```

También se usa `obtenerPorId(int $id)` para precargar el formulario de edición:
```php
public function obtenerPorId(int $id): array|false {
    $stmt = $this->db->prepare("SELECT * FROM ingreso WHERE id_ingreso = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}
```

---

### UPDATE — Editar ingreso

**Ruta:** `GET /ingresos/editar?id=X` → muestra formulario precargado  
**Ruta:** `POST /ingresos/actualizar` → procesa y actualiza

El formulario se precarga con los datos actuales del registro. El `id_ingreso` viaja como campo oculto en el formulario.

Método en el modelo:
```php
public function actualizar(array $datos): void {
    $sql = "UPDATE ingreso SET concepto = :concepto, descripcion = :descripcion,
            monto = :monto, fecha = :fecha WHERE id_ingreso = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute($datos);
}
```

Flujo: clic en Editar → `GET /ingresos/editar?id=X` → formulario con datos → `POST /ingresos/actualizar` → `actualizar()` en modelo → redirect a `/ingresos`.

---

### DELETE — Eliminar ingreso

**Ruta:** `POST /ingresos/eliminar`

El botón Eliminar está dentro de un `<form>` con el `id_ingreso` como campo oculto. Antes de enviar muestra una confirmación en el navegador (`confirm()`).

Método en el modelo:
```php
public function eliminar(int $id): void {
    $stmt = $this->db->prepare("DELETE FROM ingreso WHERE id_ingreso = ?");
    $stmt->execute([$id]);
}
```

Flujo: clic en Eliminar → confirmación → `POST /ingresos/eliminar` → `eliminar()` en modelo → redirect a `/ingresos`.

---

## CRUD de Gastos

Exactamente el mismo patrón que Ingresos, usando la tabla `gasto` y el modelo `Gasto.php`.

### CREATE
**Rutas:** `GET /gastos/registro` y `POST /gastos/guardar`

### READ
**Ruta:** `GET /gastos`  
JOIN con `usuario` para mostrar quién registró cada gasto.

### UPDATE
**Rutas:** `GET /gastos/editar?id=X` y `POST /gastos/actualizar`

### DELETE
**Ruta:** `POST /gastos/eliminar`  
Con confirmación antes de enviar el formulario.

---

## Resumen del flujo completo

```
Usuario hace clic
        │
        ▼
   Router.php
   lee la URL
        │
        ▼
  Controller
  (valida sesión)
        │
        ▼
    Model.php
  (consulta BD)
        │
        ▼
   Vista .php
 (muestra resultado)
```

Cada operación sigue este camino. Los controladores solo coordinan: reciben la petición, llaman al modelo y redirigen o cargan la vista. Toda la lógica de base de datos vive en los modelos.
