


$(function () {

    let sectionPrincipal = $("#principal");
    console.log(sectionPrincipal);

    let tarea = $("#tarea");
    console.log(tarea);

    let grupoClase = $(".grupoClase");
    console.log(grupoClase);

    let etiquetaH2 = $("h2");
    console.log(etiquetaH2);

    etiquetaH2.text("Bienvenido a semana 10!");

    let descendencia = $("ul > li");
    console.log(descendencia);

    let multiples = $("#principal, li, .grupoClase");
    console.log(multiples);

    let contenido = $("#contenido");
    contenido.html("<h3>Nueva seccion</h3>");

    let contenido2 = $("#contenido2");
    contenido2.prepend("<p>Parrafo4</p>")

    let btnAgregar = $("#btnAgregar");

    let listaTareas = $("#listaTareas");

    let url = $("a");
    url.attr("href", "https://sam.ufidelitas.ac.cr")

    let contador = 2;
    btnAgregar.on("click", function () {
        let txtTarea = $("#tarea");
        console.log(txtTarea.val())
        etiquetaH2.css("font-size", "30px");
        if (txtTarea.val() != "") {
            // txtTarea.css("border-color", "black");
            txtTarea.removeClass("error");
            listaTareas.prepend("<li data-id='" + contador + "'>" + txtTarea.val() + "</li>");
            contador++;

            mostrarMensaje(2);
            txtTarea.val("");
        } else {
            mostrarMensaje(1);
            txtTarea.addClass("error");

            // txtTarea.css("border-color", "red");

        }



    })

    function mostrarMensaje(opcion) {
        let mensaje = $("#mensaje");
        switch (opcion) {
            case 1:
                mensaje.text("Campo obligatorio");
                break;
            case 2:
                mensaje.text("Tarea agregada correctamente!");
                break;
        }


        setTimeout(() => {
            mensaje.text("");
        }, 2000);

    }

    let cuadrado = $("#cuadrado");

    let btnMostrar = $("#btnMostrar");
    let btnOcultar = $("#btnOcultar");
    let btnAgrandar = $("#btnAgrandar");
    let btnOriginal = $("#btnOriginal");
    let btnRosado = $("#btnRosado");

    btnMostrar.on("click", function () {
        cuadrado.fadeIn(1000);
    });
    btnOcultar.on("click", function () {
        cuadrado.fadeOut(1000);
    });

    btnAgrandar.on("click", function () {
        cuadrado.animate({
            width: '500px',
            height: '500px',
            opacity: 0.5
        }, 1000);
    });

    btnOriginal.on("click", function () {
        cuadrado.animate({
            width: '200px',
            height: '200px',
            opacity: 1
        }, 1000);
    });

    btnRosado.on("click", function () {
        cuadrado.toggleClass("rosado");
    });

});
