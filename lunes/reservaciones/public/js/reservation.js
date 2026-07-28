$(function () {

  const rol = $('#appData').data('rol');

  // ── Cargar reservas (solo admin) ───────────────────────
  function cargarReservas() {
    console.log("entre")
    if (rol !== 'admin') return;

    $.get('index.php?option=reservations', function (res) {
      const $tbody = $('#listaReservaciones').empty();
      const lista = JSON.parse(res).reservations ?? [];

      $('#totalReservas').text(lista.length + ' reservas');

      if (!lista.length) {
        $tbody.html('<tr><td colspan="4" class="text-center text-muted">Sin reservas</td></tr>');
        return;
      }

      lista.forEach(r => {
        $tbody.append(`
          <tr>
            <td>${r.name}</td>
            <td>${r.reservation_date}</td>
            <td>${r.people}</td>
            <td>${r.comments ?? ''}</td>
          </tr>`);
      });
    });
  }

  cargarReservas();

  // ── Crear reserva ──────────────────────────────────────
  $('#formReservation').on('submit', function (e) {
    e.preventDefault();
    $('#reservaSuccess, #reservaError').addClass('d-none');

    $.post('index.php?action=store', {
      name: $('#name').val(),
      reservation_date: $('#date').val(),
      people: $('#people').val(),
      comments: $('#comments').val(),
      option: "store"
    }, function (res) {
      if (res.response === '00') {
        $('#reservaSuccess').removeClass('d-none').text('Reserva creada exitosamente');
        $('#formReservation')[0].reset();
        cargarReservas();
      } else {
        $('#reservaError').removeClass('d-none').text('Error al crear la reserva');
      }
    }, 'json');
  });

  // ── Logout ─────────────────────────────────────────────
  $('#btnLogout').on('click', function () {
    $.post('index.php?action=logout', function () {
      window.location.href = 'index.php';
    });
  });

});