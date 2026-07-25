<?php

$pageTitle = 'Listado de Tareas';
$depth = 0;
require __DIR__ . '/../layout/header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h2><i class="bi bi-list-task me-2"></i>Tareas</h2>
  <a href="index.php?controller=tareas&action=create" class="btn btn-primary">
    <i class="bi bi-plus-circle me-1"></i>Nueva Tarea
  </a>
</div>


  <div class="alert alert-info" id="mensajeCantidadTareas">
    <i class="bi bi-info-circle me-2"></i>No hay tareas registradas.
    <a href="index.php?controller=tareas&action=create">Crear la primera</a>.
  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Título</th>
          <th>Descripción</th>
          <th>Estado</th>
          <th>Fecha Límite</th>
          <th class="text-center">Acciones</th>
        </tr>
      </thead>
      <tbody id="listaTareas">
        
      </tbody>
    </table>
  </div>
  <p class="text-muted">Total: <span id="totalTareas"></span> tarea(s) registrada(s).</p>


<?php require __DIR__ . '/../layout/footer.php'; ?>
