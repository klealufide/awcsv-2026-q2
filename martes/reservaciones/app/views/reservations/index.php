<!DOCTYPE html>
<html>

<head>
    <title>Reservas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="public/js/jquery-4.0.0.min.js"></script>
    <script src="public/js/reservation.js"></script>
</head>

<body class="container mt-5">
    <div id="appData" data-rol="<?php echo htmlspecialchars($_SESSION['rol']) ?>"></div>
    <!-- Navbar superior -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">
            <?php if ($_SESSION['rol'] === 'admin'): ?>
                <span class="badge bg-danger me-2">Admin</span>
            <?php else: ?>
                <span class="badge bg-primary me-2">Usuario</span>
            <?php endif; ?>
            Bienvenido, <?= htmlspecialchars($_SESSION['user']) ?>
        </h2>
        <button id="btnLogout" class="btn btn-outline-danger btn-sm">
            <i class="bi bi-box-arrow-right"></i> Salir
        </button>
    </div>

    <!-- Formulario — visible para todos -->
    <h4>Crear Reserva</h4>

    <div class="alert alert-success d-none" id="reservaSuccess"></div>
    <div class="alert alert-danger d-none" id="reservaError"></div>

    <form id="formReservation">
        <input class="form-control mb-2" name="name" id="name" placeholder="Nombre">
        <input type="date" class="form-control mb-2" name="reservation_date" id="date">
        <input type="number" class="form-control mb-2" name="people" id="people" placeholder="Cantidad de personas">
        <textarea class="form-control mb-2" name="comments" id="comments" placeholder="Comentarios"></textarea>
        <button type="submit" class="btn btn-primary">Reservar</button>
    </form>

    <hr>

    <!-- Tabla — solo admin ve todas las reservas -->
    <?php if ($_SESSION['rol'] === 'admin'): ?>
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h4 class="mb-0">Todas las Reservas</h4>
            <span class="badge bg-secondary" id="totalReservas"></span>
        </div>

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Personas</th>
                    <th>Comentarios</th>
                </tr>
            </thead>
            <tbody id="listaReservaciones"></tbody>
        </table>

    <?php else: ?>
        <div class="alert alert-info">
            <i class="bi bi-info-circle me-1"></i>
            Solo los administradores pueden ver el listado completo de reservas.
        </div>
    <?php endif; ?>

</body>

</html>