<?php


require_once __DIR__ . '/../models/TareaModel.php';

class TareasController
{
    private TareaModel $model;

    public function __construct()
    {
        $this->model = new TareaModel();
    }

    // ────────────────────────────────────────────────────────
    //  GET ?action=index
    //  Obtiene todas las tareas y las muestra en la vista
    // ────────────────────────────────────────────────────────
    public function index(): void
    {
        $tareas = $this->model->getAll();
        require __DIR__ . '/../views/tareas/index.php';
    }

    // ────────────────────────────────────────────────────────
    //  GET ?action=create
    //  Muestra el formulario de creación vacío
    // ────────────────────────────────────────────────────────
    public function create(): void
    {
        require __DIR__ . '/../views/tareas/create.php';
    }

    // ────────────────────────────────────────────────────────
    //  POST ?action=store
    //  Valida y guarda una nueva tarea
    // ────────────────────────────────────────────────────────
    public function store(): void
    {
        $data = $this->sanitizeInput($_POST);

        if (empty($data['titulo']) || empty($data['fecha_limite'])) {
            $error = 'El título y la fecha límite son obligatorios.';
            require __DIR__ . '/../views/tareas/create.php';
            return;
        }

        $this->model->create($data);

        header('Location: index.php?controller=tareas&action=index');
        exit;
    }

    // ────────────────────────────────────────────────────────
    //  GET ?action=edit&id=X
    //  Obtiene una tarea por ID y muestra el formulario de edición
    // ────────────────────────────────────────────────────────
    public function edit(int $id): void
    {
        $tarea = $this->model->getById($id);
        if (!$tarea) {
            http_response_code(404);
            die('<h2>Tarea no encontrada.</h2>');
        }

        require __DIR__ . '/../views/tareas/edit.php';
    }

    // ────────────────────────────────────────────────────────
    //  POST ?action=update&id=X
    //  Valida y actualiza una tarea existente
    // ────────────────────────────────────────────────────────
    public function update(int $id): void
    {
        $data = $this->sanitizeInput($_POST);

        if (empty($data['titulo']) || empty($data['fecha_limite'])) {
            $error = 'El título y la fecha límite son obligatorios.';
            $tarea = $data; 
            $tarea['id'] = $id;
            require __DIR__ . '/../views/tareas/edit.php';
            return;
        }

        $this->model->update($id, $data);

        header('Location: index.php?controller=tareas&action=index');
        exit;
    }

    // ────────────────────────────────────────────────────────
    //  POST ?action=delete&id=X
    //  Elimina una tarea y redirige al listado
    // ────────────────────────────────────────────────────────
    public function delete(int $id): void
    {
        $this->model->delete($id);

        header('Location: index.php?controller=tareas&action=index');
        exit;
    }

    // ────────────────────────────────────────────────────────
    //  HELPER — Limpiar datos del formulario
    //  htmlspecialchars evita XSS, trim elimina espacios
    // ────────────────────────────────────────────────────────
    private function sanitizeInput(array $input): array
    {
        return array_map(function ($value) {
            return htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
        }, $input);
    }
}
