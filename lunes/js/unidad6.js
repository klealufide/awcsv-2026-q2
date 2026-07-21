$(function () {
    let tarea = $("#tarea");
    console.log(tarea);

    let subtitulo = $(".subtitulo");
    console.log(subtitulo);

    let h2 = $("h2");
    console.log(h2);

    h2.css("color", "blue");

    h2.text("Unidad 6");

    let contenido = $("#contenido");
    contenido.html("<h3>Nuevo contenido</h3>");

    let descendencia = $("#listaTareas > li");
    console.log(descendencia);

    let multielementos = $("h2, #tarea, .subtitulo");
    console.log(multielementos);

    let btnAgregar = $("#btnAgregar");

    let url = $("a");
    url.attr("href", "https://campus.ufidelitas.ac.cr/");
    let contador = 2;
    contenido.append("<h2 id='nuevoTitulo'>Nuevo titulo</h2>");
    let nuevoTitulo = $("#nuevoTitulo");
    nuevoTitulo.addClass("alerta");

    btnAgregar.on("click", function () {
        // input
        let nuevaTarea = $("#tarea");
        let tarea = nuevaTarea.val();
        let listaTareas = $("#listaTareas");
        console.log(tarea);


        if (tarea == "") {

            // nuevaTarea.css("border-color", "red");
            nuevaTarea.addClass("error");
            mostrarMensaje(1);

        } else {
            // nuevaTarea.css("border-color","black");
            nuevaTarea.removeClass("error");
            mostrarMensaje(2);
            listaTareas.prepend("<li data-tarea='" + contador + "'>" + tarea + "</li>")
            nuevaTarea.val("");
        }

        function mostrarMensaje(opcion) {
            let mensaje_formulario = $("#mensaje");
            switch (opcion) {
                case 1:
                    mensaje_formulario.text("Campo tarea es requerido.");
                    break;
                case 2:
                    mensaje_formulario.text("Tarea agregada correctamente!");
                    break;
            }

            setTimeout(() => {
                mensaje_formulario.text("");
            }, 2000);
        }

    })

    let btnMostrar = $("#btnMostrar");
    let btnOcultar = $("#btnOcultar");
    let cuadrado = $("#cuadrado");

    let btnAgrandar = $("#btnAgrandar");
    let btnRestablecer = $("#btnRestablecer");
    let btnCambioColor = $("#btnCambioColor");

    btnMostrar.on("click", function () {
        cuadrado.fadeIn(1000);
    })

    btnOcultar.on("click", function () {
        cuadrado.fadeOut(1000);
    })

    btnCambioColor.on("click", function () {
        cuadrado.toggleClass("rosado");
    })


    btnAgrandar.on("click", function () {
        cuadrado.animate({
            width: '500px',
            height: '500px',
            opacity: 0.5
        }, 1000);
    })


    btnRestablecer.on("click", function () {
        cuadrado.animate({
            width: '200px',
            height: '200px',
            opacity: 1
        }, 1000);
    })
});