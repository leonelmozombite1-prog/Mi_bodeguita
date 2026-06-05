<?php
require_once __DIR__ . '/../core/Database.php';

class Resumen {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function obtenerResumenMensual(string $mes): array {
        $stmtIngresos = $this->db->prepare("SELECT COALESCE(SUM(monto), 0) FROM ingreso WHERE DATE_FORMAT(fecha, '%Y-%m') = ?");
        $stmtGastos = $this->db->prepare("SELECT COALESCE(SUM(monto), 0) FROM gasto WHERE DATE_FORMAT(fecha, '%Y-%m') = ?");

        $stmtIngresos->execute([$mes]);
        $stmtGastos->execute([$mes]);

        $ingresos = (float) $stmtIngresos->fetchColumn();
        $gastos = (float) $stmtGastos->fetchColumn();

        return [
            'mes' => $mes,
            'ingresos' => $ingresos,
            'gastos' => $gastos,
            'ganancia' => $ingresos - $gastos
        ];
    }

    public function obtenerUltimosMeses(): array {
        $sql = "SELECT DISTINCT DATE_FORMAT(fecha, '%Y-%m') AS mes FROM (
                    SELECT fecha FROM ingreso
                    UNION
                    SELECT fecha FROM gasto
                ) movimientos
                ORDER BY mes DESC
                LIMIT 12";

        return $this->db->query($sql)->fetchAll();
    }
}
