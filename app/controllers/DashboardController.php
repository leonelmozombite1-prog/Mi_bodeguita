<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Ingreso.php';
require_once __DIR__ . '/../models/Gasto.php';
require_once __DIR__ . '/../models/Resumen.php';

class DashboardController extends Controller {
    public function index(): void {
        $this->requireAuth();

        $mesActual = date('Y-m');
        $ingresoModel = new Ingreso();
        $gastoModel = new Gasto();
        $resumenModel = new Resumen();

        $this->view('dashboard/index', [
            'usuario' => $_SESSION['usuario'],
            'mesActual' => $mesActual,
            'ingresosTotales' => $ingresoModel->totalDelMes($mesActual),
            'gastosTotales' => $gastoModel->totalDelMes($mesActual),
            'resumen' => $resumenModel->obtenerResumenMensual($mesActual),
            'ingresos' => array_slice($ingresoModel->obtenerTodos(), 0, 5),
            'gastos' => array_slice($gastoModel->obtenerTodos(), 0, 5)
        ]);
    }
}
