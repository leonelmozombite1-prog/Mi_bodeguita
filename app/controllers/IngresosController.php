<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Ingreso.php';

class IngresosController extends Controller {

    // Mostrar lista de ingresos
    public function index(): void {
        $this->requireAuth();
        $modelo = new Ingreso();
        $this->view('ingresos/index', [
            'usuario'  => $_SESSION['usuario'],
            'ingresos' => $modelo->obtenerTodos()
        ]);
    }

    // Mostrar formulario de registro
    public function registro(): void {
        $this->requireAuth();
        $this->view('ingresos/registro', [
            'usuario' => $_SESSION['usuario']
        ]);
    }

    // Guardar nuevo ingreso
    public function guardar(): void {
        $this->requireAuth();
        $modelo = new Ingreso();
        $modelo->guardar([
            'concepto'    => trim($_POST['concepto'] ?? ''),
            'descripcion' => trim($_POST['descripcion'] ?? ''),
            'monto'       => (float) ($_POST['monto'] ?? 0),
            'fecha'       => $_POST['fecha'] ?? date('Y-m-d'),
            'id_usuario'  => $_SESSION['usuario']['id_usuario'],
        ]);
        header('Location: ' . BASE_URL . '/ingresos');
        exit;
    }

    // Mostrar formulario de edición
    public function editar(): void {
        $this->requireAuth();
        $id = (int) ($_GET['id'] ?? 0);
        $modelo = new Ingreso();
        $ingreso = $modelo->obtenerPorId($id);
        if (!$ingreso) {
            header('Location: ' . BASE_URL . '/ingresos');
            exit;
        }
        $this->view('ingresos/editar', [
            'usuario' => $_SESSION['usuario'],
            'ingreso' => $ingreso
        ]);
    }

    // Actualizar ingreso existente
    public function actualizar(): void {
        $this->requireAuth();
        $modelo = new Ingreso();
        $modelo->actualizar([
            'id_ingreso'  => (int) ($_POST['id_ingreso'] ?? 0),
            'concepto'    => trim($_POST['concepto'] ?? ''),
            'descripcion' => trim($_POST['descripcion'] ?? ''),
            'monto'       => (float) ($_POST['monto'] ?? 0),
            'fecha'       => $_POST['fecha'] ?? date('Y-m-d'),
        ]);
        header('Location: ' . BASE_URL . '/ingresos');
        exit;
    }

    // Eliminar ingreso
    public function eliminar(): void {
        $this->requireAuth();
        $id = (int) ($_POST['id_ingreso'] ?? 0);
        (new Ingreso())->eliminar($id);
        header('Location: ' . BASE_URL . '/ingresos');
        exit;
    }
}
