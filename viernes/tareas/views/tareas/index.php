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

<?php if (empty($tareas)): ?>
  <div class="alert alert-info">
    <i class="bi bi-info-circle me-2"></i>No hay tareas registradas.
    <a href="index.php?controller=tareas&action=create">Crear la primera</a>.
  </div>
<?php else: ?>
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
      <tbody>
        <?php foreach ($tareas as $tarea): ?>
          <tr>
            <td><?= $tarea['id'] ?></td>
            <td><strong><?= htmlspecialchars($tarea['titulo']) ?></strong></td>
            <td><?= htmlspecialchars($tarea['descripcion']) ?></td>
            <td>
              <?php
                // Asignar clase de badge según el estado
                $badges = [
                  'pendiente'   => 'bg-warning text-dark',
                  'en progreso' => 'bg-info text-dark',
                  'completada'  => 'bg-success',
                ];
                $badge = $badges[$tarea['estado']] ?? 'bg-secondary';
              ?>
              <span class="badge <?= $badge ?>">
                <?= htmlspecialchars($tarea['estado']) ?>
              </span>
            </td>
            <td><?= htmlspecialchars($tarea['fecha_limite']) ?></td>
            <td class="text-center">
              <!-- Botón Editar — GET -->
              <a href="index.php?controller=tareas&action=edit&id=<?= $tarea['id'] ?>"
                 class="btn btn-sm btn-warning me-1">
                <i class="bi bi-pencil"></i> Editar
              </a>

              <!-- Botón Eliminar — POST mediante formulario -->
              <!-- Se usa un form con método POST porque DELETE nunca debe ser GET -->
              <form method="POST"
                    action="index.php?controller=tareas&action=delete&id=<?= $tarea['id'] ?>"
                    class="d-inline"
                    onsubmit="return confirm('¿Eliminar esta tarea?')">
                <button type="submit" class="btn btn-sm btn-danger">
                  <i class="bi bi-trash"></i> Eliminar
                </button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <p class="text-muted">Total: <?= count($tareas) ?> tarea(s) registrada(s).</p>
<?php endif; ?>

<?php require __DIR__ . '/../layout/footer.php'; ?>
