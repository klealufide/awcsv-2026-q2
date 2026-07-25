
$(function () {
    let formCrearTarea = $("#formCrearTarea");
    let formEditarTarea = $("#formEditarTarea");
    let mensajeCantidadTareas = $("#mensajeCantidadTareas");

    let sectionEditMessage = $("#sectionEditMessage");
    let sectionCreateMessage = $("#sectionCreateMessage");

    let editMessage = $("#editMessage");
    let createMessage = $("#createMessage");

    sectionEditMessage.hide();
    sectionCreateMessage.hide();
    mensajeCantidadTareas.hide();

    formCrearTarea.on("submit", function (event) {

        let titulo = $("#titulo");
        let descripcion = $("#descripcion");
        let estado = $("#estado");
        let fecha_limite = $("#fecha_limite");

        let validar = true;
        let messageText = "Faltan los campos: ";


        if (titulo.val().trim() === "") {
            titulo.addClass("input-error");
            $("#errorTitulo").text("El titulo es obligatorio.");
            validar = false;
            messageText += " titulo,";
        }


        if (descripcion.val().trim() === "") {
            descripcion.addClass("input-error");
            $("#errorDescripcion").text("El descripcion es obligatorio.");
            validar = false;
            messageText += " descripcion,";
        }


        if (estado.val().trim() === "") {
            estado.addClass("input-error");
            $("#errorEstado").text("El estado es obligatorio.");
            validar = false;
            messageText += " estado,";
        }

        if (fecha_limite.val().trim() === "") {
            fecha_limite.addClass("input-error");
            $("#errorFechaLimite").text("El fecha limite es obligatorio.");
            validar = false;
            messageText += " fecha limite,";
        }


        if (!validar) {
            sectionCreateMessage.show();
            createMessage.text(messageText.slice(0, -1));
            event.preventDefault();
        } else {

        }
    })
    formEditarTarea.on("submit", function (event) {
        let titulo = $("#titulo");
        let descripcion = $("#descripcion");
        let estado = $("#estado");
        let fecha_limite = $("#fecha_limite");


        let messageText = "Faltan los campos: ";

        if (titulo.val().trim() === "") {
            titulo.addClass("input-error");
            $("#errorTitulo").text("El titulo es obligatorio.");
            validar = false;
            messageText += " titulo,";
        }


        if (descripcion.val().trim() === "") {
            descripcion.addClass("input-error");
            $("#errorDescripcion").text("El descripcion es obligatorio.");
            validar = false;
            messageText += " descripcion,";
        }


        if (estado.val().trim() === "") {
            estado.addClass("input-error");
            $("#errorEstado").text("El estado es obligatorio.");
            validar = false;
            messageText += " estado,";
        }

        if (fecha_limite.val().trim() === "") {
            fecha_limite.addClass("input-error");
            $("#errorFechaLimite").text("El fecha limite es obligatorio.");
            validar = false;
            messageText += " fecha_limite,";
        }

        if (!validar) {
            sectionEditMessage.show();
            editMessage.text(messageText.slice(0, -1));
            event.preventDefault();
        } else {

        }
    })


    function getTareas() {
        let listaTareas = $("#listaTareas");
        let totalTareas = $("#totalTareas");
        let url = "http://localhost:8080/awcsv-2026-q2/viernes/tareas/index.php?controller=tareas&action=getTareas";
        $.get(url, function (data) {
            data = JSON.parse(data);
            console.log(data);
            if (data.length < 1) {
                mensajeCantidadTareas.show();
            } else {
                mensajeCantidadTareas.hide();
                data.forEach(element => {
                    let claseBadges = '';
                    switch (element.estado) {
                        case 'pendiente':
                            claseBadges = 'bg-warning text-dark';
                            break;
                        case 'en progreso':
                            claseBadges = 'bg-info text-dark';
                            break;
                        case 'completada':
                            claseBadges = 'bg-success';
                            break;
                        default:
                            claseBadges = 'bg-secondary';
                            break;
                    }


                    let td = `<tr>
            <td> ${element.id}</td>
            <td><strong>${element.titulo}</strong></td>
            <td>${element.descripcion}</td>
            <td>
            
              <span class="badge ${claseBadges}">
                ${element.estado}
              </span>
            </td>
            <td>${element.fecha_limite}</td>
            <td class="text-center">
              <!-- Botón Editar — GET -->
              <a href="index.php?controller=tareas&action=edit&id=${element.id}"
                 class="btn btn-sm btn-warning me-1">
                <i class="bi bi-pencil"></i> Editar
              </a>

              <!-- Botón Eliminar — POST mediante formulario -->
              <!-- Se usa un form con método POST porque DELETE nunca debe ser GET -->
              <form method="POST" id="eliminarTarea"
                    action="index.php?controller=tareas&action=delete&id=${element.id}"
                    class="d-inline"
                    onsubmit="return confirm('¿Eliminar esta tarea?')">
                <button type="submit" class="btn btn-sm btn-danger">
                  <i class="bi bi-trash"></i> Eliminar
                </button>
              </form>
            </td>
          </tr>`;
                    listaTareas.append(td);

                });
                totalTareas.text(data.length)
            }


        })
    }

    getTareas();
})