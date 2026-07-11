<?php

require_once 'config/database.php';

$controllerName = $_GET['controller'] ?? 'tareas';
$action         = $_GET['action']     ?? 'index';
$method         = $_SERVER['REQUEST_METHOD'];
$id             = isset($_GET['id']) ? (int) $_GET['id'] : null;



$controllerFile  = __DIR__ . '/controllers/' . ucfirst($controllerName) . 'Controller.php';

if (!file_exists($controllerFile)) {
    http_response_code(404);
    die('<h2>404 — Controlador no encontrado</h2>');
}

require_once $controllerFile;
$controllerClass = ucfirst($controllerName) . 'Controller';
$controller      = new $controllerClass();

switch ($action) {

    case 'index':
        // GET — Listar todos los registros
        $controller->index();
        break;

    case 'create':
        // GET — Mostrar formulario de creación
        if ($method === 'GET') {
            $controller->create();
        }
        break;

    case 'store':
        // POST — Guardar nuevo registro
        if ($method === 'POST') {
            $controller->store();
        }
        break;

    case 'edit':
        // GET — Mostrar formulario de edición
        if ($method === 'GET' && $id) {
            $controller->edit($id);
        }
        break;

    case 'update':
        // POST — Actualizar registro existente
        if ($method === 'POST' && $id) {
            $controller->update($id);
        }
        break;

    case 'delete':
        // POST — Eliminar registro (nunca GET para evitar borrados accidentales)
        if ($method === 'POST' && $id) {
            $controller->delete($id);
        }
        break;

    default:
        http_response_code(404);
        die('<h2>404 — Acción no encontrada</h2>');
}
