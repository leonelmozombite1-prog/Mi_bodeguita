<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../core/Controller.php';

class LogoutController extends Controller {
    public function index(): void {
        $_SESSION = [];
        session_destroy();
        header('Location: ' . BASE_URL . '/login');
        exit;
    }
}
