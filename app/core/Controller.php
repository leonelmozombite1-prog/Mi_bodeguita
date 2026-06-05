<?php

class Controller {
    protected function view(string $vista, array $datos = []): void {
        extract($datos);
        require_once __DIR__ . '/../views/' . $vista . '.php';
    }

    protected function requireAuth(): void {
        if (!isset($_SESSION['usuario'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }
    }
}
