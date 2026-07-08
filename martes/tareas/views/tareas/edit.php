<?php

$pageTitle = 'Editar Tarea';
$depth = 0;
require __DIR__ . '/../layout/header.php';
?>

<div class="row justify-content-center">
  <div class="col-lg-7">

    <h2 class="mb-4"><i class="bi bi-pencil-square me-2"></i>Editar Tarea</h2>

    <?php if (!empty($error)): ?>
      <div class="alert alert-danger">
        <i class="bi bi-exclamation-triangle me-2"></i><?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="index.php?controller=tareas&action=update&id=<?= $tarea['id'] ?>">

      <div class="mb-3">
        <label for="titulo" class="form-label fw-semibold">Título <span class="text-danger">*</span></label>
        <input type="text"
               class="form-control"
               id="titulo"
               name="titulo"
               value="<?= htmlspecialchars($tarea['titulo']) ?>"
               required />
      </div>

      <div class="mb-3">
        <label for="descripcion" class="form-label fw-semibold">Descripción</label>
        <textarea class="form-control"
                  id="descripcion"
                  name="descripcion"
                  rows="3"><?= htmlspecialchars($tarea['descripcion']) ?></textarea>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="estado" class="form-label fw-semibold">Estado</label>
          <select class="form-select" id="estado" name="estado">
            <option value="pendiente"   <?= $tarea['estado'] === 'pendiente'   ? 'selected' : '' ?>>Pendiente</option>
            <option value="en progreso" <?= $tarea['estado'] === 'en progreso' ? 'selected' : '' ?>>En progreso</option>
            <option value="completada"  <?= $tarea['estado'] === 'completada'  ? 'selected' : '' ?>>Completada</option>
          </select>
        </div>
        <div class="col-md-6 mb-3">
          <label for="fecha_limite" class="form-label fw-semibold">Fecha Límite <span class="text-danger">*</span></label>
          <input type="date"
                 class="form-control"
                 id="fecha_limite"
                 name="fecha_limite"
                 value="<?= htmlspecialchars($tarea['fecha_limite']) ?>"
                 required />
        </div>
      </div>

      <div class="d-flex gap-2">
        <button type="submit" class="btn btn-warning">
          <i class="bi bi-save me-1"></i>Actualizar Tarea
        </button>
        <a href="index.php?controller=tareas&action=index" class="btn btn-secondary">
          <i class="bi bi-arrow-left me-1"></i>Cancelar
        </a>
      </div>

    </form>
  </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
