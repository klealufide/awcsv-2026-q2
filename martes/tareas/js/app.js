$(function () {
    let formCreateTask = $("#formCreateTask");
    let formEditTask = $("#formEditTask");
    let sectionEditMessage = $("#sectionEditMessage");
    let editMessage = $("#editMessage");
    let sectionCreateMessage = $("#sectionCreateMessage");
    let createMessage = $("#createMessage");

    sectionEditMessage.hide();
    sectionCreateMessage.hide();

    formCreateTask.on("submit", function (event) {
        sectionCreateMessage.hide();
        let messageText = "Faltan los campos: ";

        let titulo = $("#titulo");
        let descripcion = $("#descripcion");
        let estado = $("#estado");
        let fecha_limite = $("#fecha_limite");

        let valid = true;

        if (titulo.val().trim() === "") {
            titulo.addClass("input-error");
            $("#errorTitulo").text("El titulo es obligatorio.");
            valid = false;
            messageText += " titulo,";
        }

        if (descripcion.val().trim() === "") {
            descripcion.addClass("input-error");
            $("#errorDescripcion").text("El descripcion es obligatorio.");
            valid = false;
            messageText += " descripcion,";
        }
        if (estado.val().trim() === "") {
            estado.addClass("input-error");
            $("#errorEstado").text("El estado es obligatorio.");
            valid = false;
            messageText += " estado,";
        }
        if (fecha_limite.val().trim() === "") {
            fecha_limite.addClass("input-error");
            $("#errorFechaLimite").text("El Fecha Limite es obligatorio.");
            valid = false;
            messageText += " fecha limite,";
        }

        if (!valid) {
            sectionCreateMessage.show();
            createMessage.text(messageText.slice(0, -1));
            event.preventDefault();
        } else {
            
        }
    })


    formEditTask.on("submit", function (event) {
        sectionEditMessage.hide();
        let messageText = "Faltan los campos: ";

        let titulo = $("#titulo");
        let descripcion = $("#descripcion");
        let estado = $("#estado");
        let fecha_limite = $("#fecha_limite");

        let valid = true;

        if (titulo.val().trim() === "") {
            titulo.addClass("input-error");
            $("#errorTitulo").text("El titulo es obligatorio.");
            valid = false;
            messageText += " titulo,";
        }

        if (descripcion.val().trim() === "") {
            descripcion.addClass("input-error");
            $("#errorDescripcion").text("El descripcion es obligatorio.");
            valid = false;
            messageText += " descripcion,";
        }
        if (estado.val().trim() === "") {
            estado.addClass("input-error");
            $("#errorEstado").text("El estado es obligatorio.");
            valid = false;
            messageText += " estado,";
        }
        if (fecha_limite.val().trim() === "") {
            fecha_limite.addClass("input-error");
            $("#errorFechaLimite").text("El Fecha Limite es obligatorio.");
            valid = false;
            messageText += " fecha limite,";
        }

        if (!valid) {
            sectionEditMessage.show();
            editMessage.text(messageText.slice(0, -1));
            event.preventDefault();
        }
    })
})