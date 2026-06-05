<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Gasto.php';

class GastosController extends Controller {

    // Mostrar lista de gastos
    public function index(): void {
        $this->requireAuth();
        $modelo = new Gasto();
        $this->view('gastos/index', [
            'usuario' => $_SESSION['usuario'],
            'gastos'  => $modelo->obtenerTodos()
        ]);
    }

    // Mostrar formulario de registro
    public function registro(): void {
        $this->requireAuth();
        $this->view('gastos/registro', [
            'usuario' => $_SESSION['usuario']
        ]);
    }

    // Guardar nuevo gasto
    public function guardar(): void {
        $this->requireAuth();
        $modelo = new Gasto();
        $modelo->guardar([
            'concepto'    => trim($_POST['concepto'] ?? ''),
            'descripcion' => trim($_POST['descripcion'] ?? ''),
            'monto'       => (float) ($_POST['monto'] ?? 0),
            'fecha'       => $_POST['fecha'] ?? date('Y-m-d'),
            'id_usuario'  => $_SESSION['usuario']['id_usuario'],
        ]);
        header('Location: ' . BASE_URL . '/gastos');
        exit;
    }

    // Mostrar formulario de edición
    public function editar(): void {
        $this->requireAuth();
        $id = (int) ($_GET['id'] ?? 0);
        $modelo = new Gasto();
        $gasto = $modelo->obtenerPorId($id);
        if (!$gasto) {
            header('Location: ' . BASE_URL . '/gastos');
            exit;
        }
        $this->view('gastos/editar', [
            'usuario' => $_SESSION['usuario'],
            'gasto'   => $gasto
        ]);
    }

    // Actualizar gasto existente
    public function actualizar(): void {
        $this->requireAuth();
        $modelo = new Gasto();
        $modelo->actualizar([
            'id_gasto'    => (int) ($_POST['id_gasto'] ?? 0),
            'concepto'    => trim($_POST['concepto'] ?? ''),
            'descripcion' => trim($_POST['descripcion'] ?? ''),
            'monto'       => (float) ($_POST['monto'] ?? 0),
            'fecha'       => $_POST['fecha'] ?? date('Y-m-d'),
        ]);
        header('Location: ' . BASE_URL . '/gastos');
        exit;
    }

    // Eliminar gasto
    public function eliminar(): void {
        $this->requireAuth();
        $id = (int) ($_POST['id_gasto'] ?? 0);
        (new Gasto())->eliminar($id);
        header('Location: ' . BASE_URL . '/gastos');
        exit;
    }
}
