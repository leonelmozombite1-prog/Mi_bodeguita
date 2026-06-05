<?php
require_once __DIR__ . '/../core/Database.php';

class Ingreso {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function obtenerTodos(): array {
        $sql = "SELECT i.id_ingreso, i.concepto, i.descripcion, i.monto, i.fecha, u.nombre_usuario
                FROM ingreso i
                INNER JOIN usuario u ON u.id_usuario = i.id_usuario
                ORDER BY i.fecha DESC, i.id_ingreso DESC";
        return $this->db->query($sql)->fetchAll();
    }

    public function obtenerPorId(int $id): array|false {
        $stmt = $this->db->prepare("SELECT * FROM ingreso WHERE id_ingreso = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function guardar(array $datos): void {
        $sql = "INSERT INTO ingreso (concepto, descripcion, monto, fecha, id_usuario)
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
        $sql = "UPDATE ingreso SET concepto = :concepto, descripcion = :descripcion,
                monto = :monto, fecha = :fecha WHERE id_ingreso = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'concepto'    => $datos['concepto'],
            'descripcion' => $datos['descripcion'],
            'monto'       => $datos['monto'],
            'fecha'       => $datos['fecha'],
            'id'          => $datos['id_ingreso'],
        ]);
    }

    public function eliminar(int $id): void {
        $stmt = $this->db->prepare("DELETE FROM ingreso WHERE id_ingreso = ?");
        $stmt->execute([$id]);
    }

    public function totalDelMes(?string $mes = null): float {
        if ($mes) {
            $stmt = $this->db->prepare("SELECT COALESCE(SUM(monto), 0) FROM ingreso WHERE DATE_FORMAT(fecha, '%Y-%m') = ?");
            $stmt->execute([$mes]);
            return (float) $stmt->fetchColumn();
        }
        return (float) $this->db->query("SELECT COALESCE(SUM(monto), 0) FROM ingreso")->fetchColumn();
    }
}
