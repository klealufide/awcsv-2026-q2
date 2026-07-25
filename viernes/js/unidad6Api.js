$(function () {
    let btnBuscarPokemon = $("#btnBuscarPokemon");
    let btnBuscarFrase = $("#btnBuscarFrase");


    const urlBase = "https://pokeapi.co/api/v2/";
    const urlBaseFrase = "https://api.breakingbadquotes.xyz/v1/";

    btnBuscarPokemon.on("click", function () {
        let nombrePokemon = $("#nombrePokemon");
        let pokemonEncontrado = $("#pokemonEncontrado");
        let endpoint = "pokemon/";

        if (nombrePokemon.val().trim() === "") {
            nombrePokemon.addClass("error");
            pokemonEncontrado.html("");
        } else {
            nombrePokemon.removeClass("error");
            fetch(urlBase + endpoint + nombrePokemon.val(), {
                method: "update"
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    nombrePokemon.val("")
                    pokemonEncontrado.html("<b>Base de expiriencia:</b> " + data.base_experience + "<b>Nombre:</b> " + data.name + "<b>Imagen:</b> <img src='" + data.sprites.front_default + "'>");
                })
                .catch(error => console.log(error));
        }

    })

    btnBuscarFrase.on("click", function () {
        let numeroFrases = $("#numeroFrases");
        let fraseEncontrada = $("#fraseEncontrada");
        let endpoint = "quotes/";
        fraseEncontrada.html("");
        if (numeroFrases.val().trim() === "") {
            numeroFrases.addClass("error");

        } else {
            numeroFrases.removeClass("error");
            $.get(urlBaseFrase + endpoint + parseInt(numeroFrases.val()), function (data) {
                console.log(data)
                data.forEach(element => {
                    fraseEncontrada.append("<b>" + element.quote + "</b> Dicho por: " + element.author + "<br>");
                });
            });

        }
    })
});