$(function () {

    const urlBasePokemon = "https://pokeapi.co/api/v2/";
    const urlBaseBreakingad = "https://api.breakingbadquotes.xyz/v1/";
    let btnBuscarPokemon = $("#btnBuscarPokemon");
    let btnBuscarFrase = $("#btnBuscarFrase");

    btnBuscarPokemon.on("click", function () {
        let pokemon = $("#pokemon");
        let endpoint = "pokemon/";

        let nombrePokemon = $("#nombrePokemon");
        let fotoPokemon = $("#fotoPokemon");
        let detallePokemon = $("#detallePokemon");

        if (pokemon.val().trim() === "") {
            pokemon.addClass("error");
            nombrePokemon.text("")
            fotoPokemon.attr("src", "")
            detallePokemon.text(``)
        } else {
            pokemon.removeClass("error");
            fetch(urlBasePokemon + endpoint + pokemon.val())
                .then(response => response.json())
                .then(data => {
                    nombrePokemon.text(data.name)
                    fotoPokemon.attr("src", data.sprites.front_default)
                    detallePokemon.text(`La altura del pokemon es: ${data.height}`)
                    console.log(data);
                    pokemon.val("");
                })
                .catch(error => console.log(error))
        }
    })


    btnBuscarFrase.on("click", function () {
        let numeroFrase = $("#numeroFrase");
        let endpoint = "quotes/";

        let listaFrases = $("#listaFrases");

        if (numeroFrase.val().trim() === "") {
            numeroFrase.addClass("error");
            listaFrases.html("")
        } else {
            numeroFrase.removeClass("error");
            $.get(urlBaseBreakingad + endpoint + parseInt(numeroFrase.val()), function (data) {
                console.log(data)
                if (data.length > 0) {
                    if (data != "0") {
                        data.forEach(element => {
                            listaFrases.append(`<li>Actor: ${element.author}. Frase: ${element.quote}</li>`)
                        });
                    } else {
                        listaFrases.html("")
                    }

                } else {
                    listaFrases.html("")
                }
            })
        }
    })
});