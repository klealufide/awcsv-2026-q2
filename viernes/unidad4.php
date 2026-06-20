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
        echo $edad ."WHILE". saltoLinea;
        $edad++;
    }

    do {// primero hace y luego pregunta
        echo $edad ."DOWHILE". saltoLinea;
        $edad++;
    } while ($edad < 40);
    ?>

</body>

</html>