$(function () {
    let urlBasePokemon = "https://pokeapi.co/api/v2/";
    let urlBaseFrases = "https://api.breakingbadquotes.xyz/v1/";


    let btBuscarPokemon = $("#btnBuscarPokemon");
    let btnBuscarFrases = $("#btnBuscarFrases");

    btBuscarPokemon.on("click", function () {
        let pokemon = $("#pokemon");
        let endpoint = "pokemon/";

        let nombrePokemon = $("#nombrePokemon");
        let fotoPokemon = $("#fotoPokemon");

        if (pokemon.val().trim() === "") {
            pokemon.addClass("error");
            nombrePokemon.text("");
            fotoPokemon.attr("src", "")
        } else {
            pokemon.removeClass("error");

            fetch(urlBasePokemon + endpoint + pokemon.val())
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    nombrePokemon.text(data.name);
                    fotoPokemon.attr("src", data.sprites.front_default)
                    pokemon.val("")
                })
                .catch(error => console.log(error))
        }
    })


    btnBuscarFrases.on("click", function () {
        let numero = $("#numero");
        let endpoint = "quotes/";

        let listadoFrases = $("#listadoFrases");

        if (numero.val().trim() === "") {
            numero.addClass("error");
            listadoFrases.html("")
        } else {
            numero.removeClass("error");

            $.get(urlBaseFrases + endpoint + parseInt(numero.val()), function (data) {

                data.forEach(element => {
                    listadoFrases.append(`<li><b>Autor:</b>${element.author}, frase: ${element.quote}</li>`)
                });
            })

        }
    })

})