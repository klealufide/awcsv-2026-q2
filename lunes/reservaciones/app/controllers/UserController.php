<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../models/User.php';

class UserController
{
    private User $model;

    public function __construct()
    {
        $database = new Database();
        $this->model = new User($database->connect());
    }

    public function showLogin(): void
    {
        require __DIR__ . '/../views/login.php';
    }

    public function showRegister(): void
    {
        require __DIR__ . '/../views/register.php';
    }

    public function login(): void
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $this->model->login($username);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['id']   = $user['id'];
            $_SESSION['user'] = $user['username'];
            $_SESSION['rol']  = $user['rol'];
            echo json_encode(['response' => '00', 'message' => 'Login exitoso']);
        } else {
            echo json_encode(['response' => '01', 'message' => 'Error de autenticación']);
        }
    }

    public function register(): void
    {
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirm  = $_POST['confirm_password'] ?? '';
        $rol      = in_array($_POST['rol'] ?? '', ['admin', 'user']) ? $_POST['rol'] : 'user';

        if (empty($username) || empty($password)) {
            echo json_encode(['response' => '01', 'message' => 'Usuario y contraseña son obligatorios']);
            return;
        }

        if ($password !== $confirm) {
            echo json_encode(['response' => '02', 'message' => 'Las contraseñas no coinciden']);
            return;
        }

        if ($this->model->usernameExists($username)) {
            echo json_encode(['response' => '03', 'message' => 'El usuario ya existe']);
            return;
        }

        $this->model->register($username, $password, $rol);
        echo json_encode(['response' => '00', 'message' => 'Registro exitoso']);
    }

    public function logout(): void
    {
        session_destroy();
        echo json_encode(['response' => '00', 'message' => 'Sesión cerrada']);
    }
}