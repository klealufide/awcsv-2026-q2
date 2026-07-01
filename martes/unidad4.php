<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Unidad 4</title>
</head>

<body>

    <?php
    $nombre = "Karol"; // global
    $apellido = "Leal";

    $edad = 36;
    $altura = 1.6;
    $esProfesor = true;

    const SALTO_LINEA = "<br>";
    const EDAD_MAYOR = 18;

    echo $nombre . " " . $apellido . SALTO_LINEA;
    echo $edad . SALTO_LINEA;



    function saludar()
    {
        $nombre = "Tatiana"; //local de la funcion
        echo $nombre . SALTO_LINEA;
    }

    saludar();

    if ($edad >= EDAD_MAYOR) {
        echo "Es mayor de edad" . SALTO_LINEA;
    } else {
        echo "Es menor de edad" . SALTO_LINEA;
    }


    if ($edad >= EDAD_MAYOR) {
        if ($esProfesor) {
            echo "Es mayor de edad y profesor" . SALTO_LINEA;
        } else {
            echo "Es mayor de edad y no es profesor" . SALTO_LINEA;
        }
    } else {
        if ($esProfesor) {
            echo "Es menor de edad y profesor" . SALTO_LINEA;
        } else {
            echo "Es menor de edad y no es profesor" . SALTO_LINEA;
        }
    }

    $semaforo = "verde";

    switch ($semaforo) {
        case 'verde':
            echo "Siga" . SALTO_LINEA;
            break;
        case 'amarillo':
            echo "Cuidado!" . SALTO_LINEA;
            break;
        case 'rojo':
            echo "Detengase!" . SALTO_LINEA;
            break;
        default;
            echo "Color no definido !" . SALTO_LINEA;
            break;
    }


    $mensaje = ($esProfesor) ? "Es profesor" : "No es profesor";
    echo $mensaje . SALTO_LINEA;

    $a = "10";
    $b = 10;

    //?? Es el mismo valor?

    if ($a == $b) {
        echo $a . " es el mismo valor que " . $b . SALTO_LINEA;
    }

    //?? Es el mismo valor Y tipo de dato?

    if ($a === $b) {
        echo $a . " es el mismo valor y tipo que " . $b . SALTO_LINEA;
    }


    //?? Son diferentes valores

    if ($a != $b) {
        echo $a . " es diferente valor que " . $b . SALTO_LINEA;
    }

    //?? Es diferente valor O tipo de dato?

    if ($a !== $b) {
        echo $a . " es diferente valor O tipo que " . $b . SALTO_LINEA;
    }


    if ($edad < EDAD_MAYOR) {
        echo "edad es menor que 18";
    }


    if ($edad >= EDAD_MAYOR && $esProfesor) {
        echo "Es mayor de edad y profesor" . SALTO_LINEA;
    }


    if ($edad < EDAD_MAYOR || $esProfesor) {
        echo "Es menor de edad o profesor" . SALTO_LINEA;
    }

    if ($edad >= EDAD_MAYOR && !$esProfesor) {
        echo "Es mayor de edad y no profesor" . SALTO_LINEA;
    }

    // hasta  un numero definido for
    //tabla del 5
    echo "Tabla del 5" . SALTO_LINEA;
    for ($i = 0; $i <= 10; $i++) {
        echo "5 X " . $i . " = " . ($i * 5) . SALTO_LINEA;
    }

    $edad = 28;
    while ($edad < 30) {
        $edad++;
        echo $edad . SALTO_LINEA;
    }
    //$edad = 28;
    do {
        $edad++;
        echo $edad . SALTO_LINEA;
    } while ($edad < 30);

    // declaro array

    $arrayFrutas = array("manzana", "pera", "mora");
    $arrayHobbies = [
        "leer",
        "cocinar",
        "tejer"
    ];

    print_r($arrayFrutas); //imprimir arreglos

    echo $arrayFrutas[1] . SALTO_LINEA;

    foreach ($arrayFrutas as $fruta) {
        echo $fruta . SALTO_LINEA;
    }

    $arrayElement = [
        "nombre" => "Karol",
        "edad" => 36,
        2 => 10,
        "esProfesor" => true,
        4 => 15,
        5 => 3

    ];
    print_r($arrayElement);
    echo SALTO_LINEA;

    $estudiante  = [
        "nombre" => "Pedro",
        "edad" => 20,
        "hobbies" => [
            "caminar",
            "GYM"
        ]
    ];

    $estudiante2  = [
        "nombre" => "Ana",
        "edad" => 25,
        "hobbies" => [
            "Leer",
            "Trotar"
        ]
    ];

    $estudiante3  = [
        "nombre" => "Laura",
        "edad" => 30,
        "hobbies" => [
            "Videos  Juegos",
            "Jugar perro"
        ]
    ];

    print_r($estudiante3);
    echo SALTO_LINEA;
    $listaEstudiante = [$estudiante, $estudiante2, $estudiante3];
    print_r($listaEstudiante);
    echo SALTO_LINEA;
    echo SALTO_LINEA;
    foreach ($listaEstudiante as $estudiante) {
        if ($estudiante["edad"] >= 25) {
            echo $estudiante["nombre"];
            echo SALTO_LINEA;
        }
    }

    foreach ($listaEstudiante as $estudiante) {
        echo "<ul>";
        foreach ($estudiante["hobbies"] as $hobbie) {
            echo "<li>" . $hobbie . "</li>";
        }
        echo "</ul>";
    }

    $listaEstudiante[2] = [
        "nombre" => "Juan",
        "edad" => 23,
        "hobbies" => [
            "Bailar",
            "Dormir"
        ]
    ];

    print_r($listaEstudiante);
    echo SALTO_LINEA;

    $array = [1, 2, 3, 4, 5];
    array_push($array, 6);
    print_r($array);
    echo SALTO_LINEA;

    $index = array_search(6, $array);
    echo $index . SALTO_LINEA;

    function sumar($num, $num1)
    {
        return $num + $num1;
    }

    echo sumar(6, 7);
    echo SALTO_LINEA;
    $sumar = function ($a, $b) {
        return $a + $b;
    };

    echo $sumar(5, 5);
    echo SALTO_LINEA;

    $duplicar = fn($a) => $a * 2;
    echo $duplicar(2);
    echo SALTO_LINEA;
    /*
    $archivo = fopen("archivo.txt", "a");
    $txt = "Hola mundo! \n";
    fwrite($archivo, $txt);
    $txt = "Hola mundo otra vez! \n";
    fwrite($archivo, $txt);
    fclose($archivo);
*/

    $archivo = fopen("archivo.txt", "r");
    while (!feof($archivo)) {
        echo fgets($archivo) . SALTO_LINEA;
    }
    fclose($archivo);

    $_SESSION["usuario"] = "kleal";
    $_SESSION["rol"] = "estudiante";

    echo $_SESSION["usuario"];

    ?>
    <a href="session.php">Ir a otra pagina</a>
</body>

</html>