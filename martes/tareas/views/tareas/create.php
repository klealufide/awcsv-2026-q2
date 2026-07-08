<?php
$pageTitle = 'Nueva Tarea';
$depth = 0;
require __DIR__ . '/../layout/header.php';
?>

<div class="row justify-content-center">
  <div class="col-lg-7">

    <h2 class="mb-4"><i class="bi bi-plus-circle me-2"></i>Nueva Tarea</h2>

    <?php if (!empty($error)): ?>
      <div class="alert alert-danger">
        <i class="bi bi-exclamation-triangle me-2"></i><?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="index.php?controller=tareas&action=store">

      <div class="mb-3">
        <label for="titulo" class="form-label fw-semibold">Título <span class="text-danger">*</span></label>
        <input type="text"
               class="form-control"
               id="titulo"
               name="titulo"
               placeholder="Ej: Diseñar la página de inicio"
               value="<?= htmlspecialchars($_POST['titulo'] ?? '') ?>"
               required />
      </div>

      <div class="mb-3">
        <label for="descripcion" class="form-label fw-semibold">Descripción</label>
        <textarea class="form-control"
                  id="descripcion"
                  name="descripcion"
                  rows="3"
                  placeholder="Detalle de la tarea..."><?= htmlspecialchars($_POST['descripcion'] ?? '') ?></textarea>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="estado" class="form-label fw-semibold">Estado</label>
          <select class="form-select" id="estado" name="estado">
            <option value="pendiente"   <?= (($_POST['estado'] ?? '') === 'pendiente')   ? 'selected' : '' ?>>Pendiente</option>
            <option value="en progreso" <?= (($_POST['estado'] ?? '') === 'en progreso') ? 'selected' : '' ?>>En progreso</option>
            <option value="completada"  <?= (($_POST['estado'] ?? '') === 'completada')  ? 'selected' : '' ?>>Completada</option>
          </select>
        </div>
        <div class="col-md-6 mb-3">
          <label for="fecha_limite" class="form-label fw-semibold">Fecha Límite <span class="text-danger">*</span></label>
          <input type="date"
                 class="form-control"
                 id="fecha_limite"
                 name="fecha_limite"
                 value="<?= htmlspecialchars($_POST['fecha_limite'] ?? '') ?>"
                 required />
        </div>
      </div>

      <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">
          <i class="bi bi-save me-1"></i>Guardar Tarea
        </button>
        <a href="index.php?controller=tareas&action=index" class="btn btn-secondary">
          <i class="bi bi-arrow-left me-1"></i>Cancelar
        </a>
      </div>

    </form>
  </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
