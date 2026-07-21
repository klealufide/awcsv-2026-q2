$(function () {
    let formCreateTask = $("#formCreateTask");
    let formEditTask = $("#formEditTask");
    let messsageCreateTask = $("#messsageCreateTask");
    let messsageEditTask = $("#messsageEditTask");
    

    messsageCreateTask.hide();
    messsageEditTask.hide();

    formCreateTask.on("submit", function (event) {

        let titulo = $("#titulo");
        let descripcion = $("#descripcion");
        let estado = $("#estado");
        let fecha_limite = $("#fecha_limite");
        let valid = true;
        $(".error").text("");
        $("input").removeClass("input-error");
        messsageCreateTask.hide();

        if (titulo.val().trim() === "") {
            titulo.addClass("input-error");
            $("#errorTitulo").text("El titulo es obligatorio.");
            valid = false;
        }
        if (descripcion.val().trim() === "") {
            descripcion.addClass("input-error");
            $("#errorDescripcion").text("El descripcion es obligatorio.");
            valid = false;
        }
        if (estado.val().trim() === "") {
            estado.addClass("input-error");
            $("#errorEstado").text("El estado es obligatorio.");
            valid = false;
        }

        if (fecha_limite.val().trim() === "") {
            fecha_limite.addClass("input-error");
            $("#errorFechaLimite").text("El fecha limite es obligatorio.");
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
            messsageCreateTask.show();
        }

        // nos conectamos con el BE
    })

    formEditTask.on("submit", function (event) {

        let titulo = $("#titulo");
        let descripcion = $("#descripcion");
        let estado = $("#estado");
        let fecha_limite = $("#fecha_limite");
        let valid = true;
        $(".error").text("");
        $("input").removeClass("input-error");
        messsageEditTask.hide();

        if (titulo.val().trim() === "") {
            titulo.addClass("input-error");
            $("#errorTitulo").text("El titulo es obligatorio.");
            valid = false;
        }
        if (descripcion.val().trim() === "") {
            descripcion.addClass("input-error");
            $("#errorDescripcion").text("El descripcion es obligatorio.");
            valid = false;
        }
        if (estado.val().trim() === "") {
            estado.addClass("input-error");
            $("#errorEstado").text("El estado es obligatorio.");
            valid = false;
        }

        if (fecha_limite.val().trim() === "") {
            fecha_limite.addClass("input-error");
            $("#errorFechaLimite").text("El fecha limite es obligatorio.");
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
            messsageEditTask.show();
        }

        // nos conectamos con el BE
    })
})