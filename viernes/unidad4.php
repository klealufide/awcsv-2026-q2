<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Unidad 4</title>

</head>

<body>
    <h1>Unidad 4:PHP</h1>

    <?php
    echo "<h2>Hola mundo!</h2><br>   ";

    const edadMayor = 18;

    const saltoLinea = "<br>";

    $edad = 36;
    $nombre = "Karol";
    $altura = 1.6;
    $esProfesor = true;

    $nombre = "Tatiana";

    echo $nombre . " " . $edad . saltoLinea . $altura;

    $global = "Global";

    function saludar()
    {
        $local = "Local";
        //echo $local .$global; no se puede usar una variable global dentro de un local solo variables locales

    }
    //echo $local; nno puedo usar una variable local de una funcion fuera de ella.
    saludar();
    echo $global;


    if ($esProfesor) {
        echo "es Profesor" . saltoLinea;
    } else {
        echo "no es profesor" . saltoLinea;
    }

    $mensaje = ($edad >= edadMayor) ? "Es mayor de edad" : "Es menor de edad";

    echo $mensaje . saltoLinea;

    if ($edad >= edadMayor) {
        if ($esProfesor) {
            echo "es mayor de edad y es profesor" . saltoLinea;
        } else {
            echo "es mayor de edad y no es profesor" . saltoLinea;
        }
    } else {
        if ($esProfesor) {
            echo "es menor de edad y es profesor" . saltoLinea;
        } else {
            echo "es menor de edad y no es profesor" . saltoLinea;
        }
    }

    $semaforo = "verde";

    switch ($semaforo) {
        case 'verde':
            echo "seguir" . saltoLinea;
            break;
        case 'amarillo':
            echo "precaucion" . saltoLinea;
            break;
        case 'rojo':
            echo "detengase" . saltoLinea;
            break;
        default:
            echo "color no definido" . saltoLinea;
            break;
    }

    $a = 10;
    $b = "10";

    //? tienen el mismo valor

    if ($a == $b) {
        echo "el valor de a es igual al valor de b" . saltoLinea;
    }

    //? tienen el mismo valor y el mismo tipo
    if ($a === $b) {
        echo "el valor y el tipo de a es igual al valor de b" . saltoLinea;
    }


    //? son diferentes el valor de a y b?
    if ($a != $b) {
        echo "el valor de a es diferente al valor de b" . saltoLinea;
    }

    //? son diferentes el valor o el tipo de a o b?
    if ($a !== $b) {
        echo "el valor o el tipo de a es diferente al valor o el tipo de b" . saltoLinea;
    }


    if ($edad >= edadMayor && $esProfesor) {
        echo "es mayor de edad y es profesor" . saltoLinea;
    } elseif ($edad >= edadMayor && !$esProfesor) {
        echo "es mayor de edad y no es profesor" . saltoLinea;
    } else {
        echo "es menor de edad" . saltoLinea;
    }


    if ($edad < edadMayor || $esProfesor) {
        echo "es menor de edad o es profesor" . saltoLinea;
    }

    echo "Tabla del 5" . saltoLinea;

    for ($i = 0; $i <= 10; $i++) {
        echo "5 * $i = " . (5 * $i) . saltoLinea;
    }

    while ($edad < 40) { //entra solo si cumple condicion
        echo $edad . "WHILE" . saltoLinea;
        $edad++;
    }

    do { // primero hace y luego pregunta
        echo $edad . "DOWHILE" . saltoLinea;
        $edad++;
    } while ($edad < 40);



    ?>

    <ul>
        <li><?php echo $nombre; ?></li>
        <li><?php echo $edad; ?></li>
        <li></li>
    </ul>

    <?php

    //indexado
    $hobbies = array(
        "leer",
        "escribir",
        "bailar"
    );

    $frutas = [
        "banano",
        "pera",
        "manzana"
    ];
    //asociativo
    $estudiante = [
        "nombre" => "Karol",
        "apellido" => "Leal",
        "edad" => 36,
        "esProfesor" => true,
        "hobbies" => [
            "cantar",
            "tejer",
            "caminar"
        ]
    ];


    $estudiante2 = [
        "nombre" => "Pedro",
        "apellido" => "Arias",
        "edad" => 20,
        "esProfesor" => false,
        "hobbies" => ["cocinar", "correr", "dormir"]
    ];


    $estudiante3 = [
        "nombre" => "Juan",
        "apellido" => "Mora",
        "edad" => 25,
        "esProfesor" => false
    ];

    print_r($estudiante);
    echo  saltoLinea;

    $estudiante3["hobbies"] = $hobbies;
    print_r($estudiante3);
    echo  saltoLinea;

    echo $estudiante["nombre"] . saltoLinea;
    echo $frutas[1] . saltoLinea;

    //multidimensional

    $listaEstudiantes = [
        $estudiante,
        $estudiante2,
        $estudiante3
    ];

    print_r($listaEstudiantes);


    foreach ($listaEstudiantes as $estudiante) {
        if ($estudiante["edad"]  >= 25) {
            echo $estudiante["nombre"] . saltoLinea;
        }
    }

    foreach ($listaEstudiantes as $estudiante) {
        foreach ($estudiante["hobbies"] as $hobbie) {
            echo $hobbie . saltoLinea;
        }
    }

    echo $listaEstudiantes[2]["apellido"] . saltoLinea;


    array_push($frutas, "melon");

    print_r($frutas);

    $index = array_search("melon", $frutas);
    echo $index . " = " . $frutas[$index] . saltoLinea;

    $arreglo_fusionado = array_merge($frutas, $estudiante);
    print_r($arreglo_fusionado);
    echo saltoLinea;

    function sumar($a, $b)
    {
        return $a + $b;
    }

    $resultado = sumar(7, 8);

    echo $resultado . saltoLinea;

    $sumar =  function ($a, $b) {
        return $a + $b;
    };

    echo $sumar(80, 90) . saltoLinea;

    $duplicar = fn($a) => $a * 2;

    echo $duplicar(8) . saltoLinea;

    $archivo = fopen("archivo.txt", "w"); //a
    $txt = "Hola a todos\n";
    fwrite($archivo, $txt);

    $txt = "Hola a todos otra vez\n";
    fwrite($archivo, $txt);

    fclose($archivo);


    $archivo = fopen("archivo.txt", "r");

    while (!feof($archivo)) {
        echo fgets($archivo) . saltoLinea;
    }

    fclose($archivo);

    $_SESSION["usuario"] = "kleal";
    $_SESSION["rol"] = "admin";


    print_r($_SESSION);


    echo $_SESSION["rol"];
    ?>
    <a href="sesion.php">Sesion</a>

</body>

</html>