<?php
require_once __DIR__ . '/../core/Database.php';

class Gasto {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function obtenerTodos(): array {
        $sql = "SELECT g.id_gasto, g.concepto, g.descripcion, g.monto, g.fecha, u.nombre_usuario
                FROM gasto g
                INNER JOIN usuario u ON u.id_usuario = g.id_usuario
                ORDER BY g.fecha DESC, g.id_gasto DESC";
        return $this->db->query($sql)->fetchAll();
    }

    public function obtenerPorId(int $id): array|false {
        $stmt = $this->db->prepare("SELECT * FROM gasto WHERE id_gasto = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function guardar(array $datos): void {
        $sql = "INSERT INTO gasto (concepto, descripcion, monto, fecha, id_usuario)
                VALUES (:concepto, :descripcion, :monto, :fecha, :id_usuario)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'concepto'    => $datos['concepto'],
            'descripcion' => $datos['descripcion'],
            'monto'       => $datos['monto'],
            'fecha'       => $datos['fecha'],
            'id_usuario'  => $datos['id_usuario'],
        ]);
    }

    public function actualizar(array $datos): void {
        $sql = "UPDATE gasto SET concepto = :concepto, descripcion = :descripcion,
                monto = :monto, fecha = :fecha WHERE id_gasto = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'concepto'    => $datos['concepto'],
            'descripcion' => $datos['descripcion'],
            'monto'       => $datos['monto'],
            'fecha'       => $datos['fecha'],
            'id'          => $datos['id_gasto'],
        ]);
    }

    public function eliminar(int $id): void {
        $stmt = $this->db->prepare("DELETE FROM gasto WHERE id_gasto = ?");
        $stmt->execute([$id]);
    }

    public function totalDelMes(?string $mes = null): float {
        if ($mes) {
            $stmt = $this->db->prepare("SELECT COALESCE(SUM(monto), 0) FROM gasto WHERE DATE_FORMAT(fecha, '%Y-%m') = ?");
            $stmt->execute([$mes]);
            return (float) $stmt->fetchColumn();
        }
        return (float) $this->db->query("SELECT COALESCE(SUM(monto), 0) FROM gasto")->fetchColumn();
    }
}
