<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Resumen.php';

class ResumenController extends Controller {
    public function index(): void {
        $this->requireAuth();

        $mes = trim($_GET['mes'] ?? date('Y-m'));
        $modelo = new Resumen();

        $this->view('resumen/index', [
            'usuario' => $_SESSION['usuario'],
            'meses' => $modelo->obtenerUltimosMeses(),
            'resumen' => $modelo->obtenerResumenMensual($mes),
            'mesSeleccionado' => $mes
        ]);
    }
}
