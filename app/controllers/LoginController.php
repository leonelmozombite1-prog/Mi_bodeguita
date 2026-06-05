<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Login.php';

class LoginController extends Controller {
    public function index(): void {
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = trim($_POST['user'] ?? '');
            $clave = trim($_POST['pass'] ?? '');

            if ($usuario === '' || $clave === '') {
                $error = 'Completa todos los campos.';
            } else {
                $resultado = (new Login())->login($usuario, $clave);

                if ($resultado) {
                    session_regenerate_id(true);
                    $_SESSION['usuario'] = $resultado;
                    header('Location: ' . BASE_URL . '/dashboard');
                    exit;
                }

                $error = 'Credenciales incorrectas.';
            }
        }

        $this->view('auth/login', ['error' => $error]);
    }
}
