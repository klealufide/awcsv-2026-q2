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
    url.attr("href","https://campus.ufidelitas.ac.cr/");


    btnAgregar.on("click", function () {
        // input
        let nuevaTarea = $("#tarea");
        let tarea = nuevaTarea.val();

        console.log(tarea);


        if (tarea == "") {

            // nuevaTarea.css("border-color", "red");
            nuevaTarea.addClass("error");
            mostrarMensaje(1);

        } else {
            // nuevaTarea.css("border-color","black");
            nuevaTarea.removeClass("error");
            mostrarMensaje(2);
            /*
    
            // la lista de tareas (ul)
            let nuevoLiTareas = document.createElement("li");
            nuevoLiTareas.innerText = tarea;
            nuevoLiTareas.dataset.tarea = contador++;
            listaTareas.appendChild(nuevoLiTareas);
            nuevaTarea.value = "";
            */
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
});