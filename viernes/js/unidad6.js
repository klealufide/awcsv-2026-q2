

$(function () {
    let selectorID = $("#principal");
    let selectorClass = $(".grupoClase");
    let selectorEtiqueta = $("h2");

    console.log(selectorID);
    console.log(selectorClass);
    console.log(selectorEtiqueta);

    selectorID.css("border-color", "green");
    selectorEtiqueta.css("font-size", "30px")

    let descendientes = $("ul > li");
    console.log(descendientes);

    let multiSeleccionar = $("span, #tarea");
    console.log(multiSeleccionar);

    let btnAgregar = $("#btnAgregar");

    let contenido = $("#contenido");

    contenido.html("<h3>Nuevo contenido</h3>");

    selectorEtiqueta.text("Mantenimiento Tareas");

    let url = $("a");

    url.attr("href", "https://campus.ufidelitas.ac.cr/");
    url.attr("target", "_self");

    let contador = 3;


    btnAgregar.on("click", function () {
        let tareaInput = $("#tarea");
        let tarea = tareaInput.val();
        let mensaje = $("#mensaje");
        let listaTarea = $("#listaTareas");
        console.log(tarea);
        if (contador <= 5) {
            if (tarea == "") {
                tareaInput.addClass("error");
                mensaje.text("Campo obligatorio!");

            } else {
                tareaInput.removeClass("error");
                listaTarea.append("<li data-tarea='" + contador + "' >" + tarea + "</li>");

                tareaInput.val("");

                mensaje.text("Tarea agregada!");
                contador++;
            }
        } else {

            mensaje.text("Maximo 5");
        }


        setTimeout(() => {
            mensaje.text("");
        }, 2000);
    })

    let cuadrado = $("#cuadrado");
    let btnOcultar = $("#btnOcultar");
    btnOcultar.on("click", function () {
        cuadrado.fadeOut(1000);
    })

    let btnMostrar = $("#btnMostrar");
    btnMostrar.on("click", function () {
        cuadrado.fadeIn(1000);
    })

    let btnAgrandar = $("#btnAgrandar");
    btnAgrandar.on("click", function () {
        cuadrado.animate({
            width: "500px",
            height: "500px",
            opacity: "0.5"
        }, 1000);
    })

    let btnOriginal = $("#btnOriginal");
    btnOriginal.on("click", function () {
        cuadrado.animate({
            width: "200px",
            height: "200px",
            opacity: "1"
        }, 1000);
    })

    let btnRosado = $("#btnRosado");
    btnRosado.on("click", function () {
        cuadrado.toggleClass("rosado");
    })
});