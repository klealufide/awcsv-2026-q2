<!DOCTYPE html>
<html>

<head>
    <title>Unidad 3</title>
    <script src="./js/unidad3.js"></script>
</head>

<body>

    <?php
    session_start();
    echo "Hola mundo en PHP!";

    $nombre = "Karol";
    $edad = 36;
    $estatura = 1.6;
    $esProfesor = true;

    $edad = $edad + $estatura;

    const SALTO_LINEA = "<br>";

    const EDAD_MAYOR = 18;

    echo $nombre . " <b>" . $edad . "</b> " . $estatura . "<br> " . $esProfesor;


    /*
    function getNombre()
    {
        $nombre = "tatiana";
        echo $nombre . "local" . SALTO_LINEA;
    }

    getNombre();
    echo $nombre . "global" .    SALTO_LINEA;

    */

    $mensaje = ($edad >= EDAD_MAYOR) ? "Es Mayor de edad" : "Es menor de edad";
    echo $mensaje;
    echo SALTO_LINEA;


    if ($edad >= EDAD_MAYOR) {
        if ($esProfesor) {
            echo "Es Mayor de edad y profesor";
        } else {
            echo "Es Mayor de edad y no es profesor";
        }
    } else {
        if ($esProfesor) {
            echo "Es menor de edad y profesor";
        } else {
            echo "Es menor de edad y no es profesor";
        }
    }
    echo SALTO_LINEA;
    $semaforo = "verde";

    if ($semaforo == "verde") {
        echo "Siga!";
    } elseif ($semaforo == "amarillo") {
        echo "Cuidado!";
    } elseif ($semaforo == "rojo") {
        echo "Detengase!";
    } else {
        echo "Color no evaluado!";
    }
    echo SALTO_LINEA;
    $semaforo = "rojo";
    switch ($semaforo) {
        case "verde":
            echo "Siga!";
            break;
        case "amarillo":
            echo "Cuidado!";
            break;
        case "rojo":
            echo "Detengase!";
            break;
        default:
            echo "Color no evaluado!";
            break;
    }

    echo SALTO_LINEA;

    $a = 10;
    $b = "10";

    if ($a == $b) { // valor a es igual a b?  
        echo "a y b son de valor igual" . SALTO_LINEA;
    }

    if ($a === $b) { // valor y tipo a es igual a b?  
        echo "a y b son de valor y tipo igual" . SALTO_LINEA;
    }

    if ($a != $b) { //el valor de a es diferente b?
        echo "el valor de a es diferente a b" . SALTO_LINEA;
    }
    if ($a !== $b) { //el valor o el tipo de a es diferente b?
        echo "el valor o el tipo de a es diferente a b" . SALTO_LINEA;
    }


    if ($edad >= EDAD_MAYOR && $esProfesor) {
        echo "Es Mayor de edad y profesor";
    }
    echo SALTO_LINEA;

    if ($edad < EDAD_MAYOR || $esProfesor) {
        echo "Es menor de edad o es profesor";
    }

    echo SALTO_LINEA;

    if ($edad >= EDAD_MAYOR || !$esProfesor) {
        echo "Es mayor de edad o no es profesor";
    }

    echo SALTO_LINEA;


    // tabla del 5
    echo "TABLA DEL 5" . SALTO_LINEA;
    for ($i = 0; $i <= 10; $i++) {
        echo "5 x " . $i . " = " . ($i * 5) . SALTO_LINEA;
    }
    while ($edad < 40) {
        $edad++;
        echo $edad . SALTO_LINEA;
    }
    // do while 
    echo $edad . SALTO_LINEA;
    do {
        $edad++;
        echo $edad . SALTO_LINEA;
    } while ($edad < 10);


    $array = [
        "primera" => 2,
        "nombre" => "Karol",
        2 => 10,
        "edad" => 36,
        ["cocinar", "leer", "caminar"],
        15
    ];

    print_r($array);
    echo SALTO_LINEA;
    // INDEXADO
    $hobbies = ["leer", "cocinar", "bailar"];

    print_r($hobbies);

    echo $hobbies[2] . SALTO_LINEA;

    // ASOCIATIVO

    $persona = ["nombre" => "Karol", "apellido" => "Leal", "edad" => 36];
    print_r($persona);
    echo $persona["edad"];

    $persona["hobbies"] = $hobbies;
    echo SALTO_LINEA;
    print_r($persona);

    $frutas = array("banano", "fresa", "melon");


    echo SALTO_LINEA;
    print_r($frutas);


    $frutas1 = ["banano", "fresa", "melon"];


    echo SALTO_LINEA;
    print_r($frutas1);

    $persona2 = ["nombre" => "Ana", "apellido" => "Mora", "edad" => 20];

    $persona3 = ["nombre" => "Juan", "apellido" => "Perez", "edad" => 25];

    $estudiantes = [
        $persona,
        $persona2,
        $persona3
    ];

    echo SALTO_LINEA;
    print_r($estudiantes);

    foreach ($estudiantes as $estudiante) {
        if ($estudiante['edad'] > 20) {
            echo $estudiante["nombre"] . SALTO_LINEA;
        }
    }
    echo SALTO_LINEA;
    echo $estudiantes[2]['edad'];

    $array = [1, 2, 3, 4, 5];
    echo SALTO_LINEA;
    array_push($array, 6);
    print_r($array);
    echo SALTO_LINEA;
    $posicion = array_search(4, $array);
    echo $posicion;

    echo SALTO_LINEA;

    function sumar($a, $b)
    {
        return $a + $b;
    }
    echo SALTO_LINEA;
    echo sumar(5, 6);

    $sumar = function ($a, $b) {
        return $a + $b;
    };

    echo SALTO_LINEA;
    echo $sumar(10, 20);
    echo SALTO_LINEA;
    $duplicar = fn($n) => $n * 2;
    echo $duplicar(16);

    /// ARCHIVOS

    $archivo = fopen("archivo.txt", "w");
    $txt = "nuevo texto \n";
    fwrite($archivo, $txt);
    $txt = "nuevo texto 2\n";
    fwrite($archivo, $txt);
    fclose($archivo);

    $archivo = fopen("archivo.txt", "r");
    while (!feof($archivo)) {
        echo fgets($archivo) . SALTO_LINEA;
    }
    fclose($archivo);
    $_SESSION["username"] = "kleal";
    $_SESSION["rol"] = "admin";
    print_r($_SESSION); // arreglo asociativo;

    if($_SESSION["rol"] == "admin"){
        echo "el rol es admin";
    }

    echo $_SESSION["username"] ;

    //session_destroy();
    print_r($_SESSION);

    ?>
    <a href="session.php">Session</a>
</body>

</html>