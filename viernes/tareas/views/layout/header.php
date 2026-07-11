<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $pageTitle ?? 'Mantenimiento de Tareas' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?= str_repeat('../', $depth ?? 0) ?>css/style.css" />
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php?controller=tareas&action=index">
      <i class="bi bi-check2-square me-2"></i>Gestor de Tareas
    </a>
    <div>
      <a href="index.php?controller=tareas&action=create" class="btn btn-light btn-sm">
        <i class="bi bi-plus-circle me-1"></i>Nueva Tarea
      </a>
    </div>
  </div>
</nav>

<div class="container my-4">
