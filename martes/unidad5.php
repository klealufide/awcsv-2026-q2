<?php

$server = "db";
$user = "root";
$pass = "root";
$database = "tienda_db";

try {
    $conexion = new PDO("mysql:host=" . $server . ";dbname=" . $database . ";charset=utf8mb4", $user, $pass);
} catch (Exception $e) {
    die($e->getMessage());
}


//CRUD Create(insert) - read (select) -update -delete
/*
$usuario = "trojas";
$clave = '$2y$10$E.9DZj8ymMfpMimZIr819uWVDy/B2zYyTuLEEdScy2dturV2rCz3u';
$rol = "admin";
try {
    $sql = "INSERT INTO usuarios (usuario, clave, rol) VALUES (:usuario, :clave, :rol)";

    $stmt = $conexion->prepare($sql);
    $stmt->execute([
        ":usuario" => $usuario,
        ":clave" => $clave,
        ":rol" => $rol
    ]);
    echo "Usuario agregado!";
} catch (Exception $e) {
    die($e->getMessage());
}
    */

//select

$sql = "SELECT * FROM usuarios";
$stmt = $conexion->query($sql);
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios as $usuario) {
    echo $usuario["id"] . "-" . $usuario["usuario"] . "-" . $usuario["clave"] . "<br>";
}

$sql = "UPDATE usuarios set clave=:clave where id=:id";
$stmt = $conexion->prepare($sql);
$stmt->execute([
    ":clave" => "123456",
    ":id" => 2
]);


$sql = "DELETE FROM usuarios where id=:id";
$stmt = $conexion->prepare($sql);
$stmt->execute([
    ":id" => 2
]);

//registro
$clave = "12345";
// encriptar guardo
$clave = password_hash($clave, PASSWORD_BCRYPT);

// loguearme
$clave = "12345";
$usuario = "trojas";

$sql = "SELECT * FROM usuarios where usuario=:usuario";
$stmt = $conexion->prepare($sql);
$stmt->execute([
    ":usuario" => $usuario
]);

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario && password_verify($clave, $usuario["clave"])) {
    echo "Login es correcto!";
} else {
    echo "El usuario o clave es incorrecta!";
}
