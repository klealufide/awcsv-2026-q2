


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


    let btnAgregar = $("#btnAgregar");

    let listaTareas = $("#listaTareas");

    let url = $("a");
    url.attr("href", "https://sam.ufidelitas.ac.cr")


    btnAgregar.on("click", function () {
        let txtTarea = $("#tarea");
        console.log(txtTarea.val())
        etiquetaH2.css("font-size", "30px");
        if (txtTarea.val() != "") {
            // txtTarea.css("border-color", "black");
            txtTarea.removeClass("error");
            /*
            

            let nuevoLi = document.createElement("li");
            nuevoLi.innerText = txtTarea.value;
            console.log(contador);
            nuevoLi.dataset.id = contador++;
            listaTareas.appendChild(nuevoLi);

            */

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



});
