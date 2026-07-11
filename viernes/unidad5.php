<?php

$server = "db";
$database = "biblioteca_db";
$userDB = "root";
$passDB = "root";

try {
    $conexion = new PDO("mysql:host=" . $server . ";dbname=" . $database . ";charset=utf8mb4", $userDB, $passDB);
} catch (Exception $e) {
    die($e->getMessage());
}


// CRUD (Create - Read- Update -Delete)
/*
$sql = "INSERT INTO usuarios (usuario, clave, rol) VALUES (:usuario,:clave,:rol)";
$stmt = $conexion->prepare($sql);
$stmt->execute([
    "usuario" => "kleal",
    "clave" => "12345",
    "rol" => "admim"
]);
*/

$sql = "SELECT * FROM usuarios";
$stmt = $conexion->query($sql);
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
//print_r($usuarios);

foreach ($usuarios as $usuario) {
    echo $usuario["usuario"] . "<br>";
}

$sql = "UPDATE usuarios  SET  clave=:clave where id=:id";
$stmt = $conexion->prepare($sql);
$stmt->execute([
    "clave" => "1234567",
    "id" => 2
]);

$sql = "SELECT * FROM usuarios";
$stmt = $conexion->query($sql);
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
//print_r($usuarios);

foreach ($usuarios as $usuario) {
    echo $usuario["usuario"] . "- " . $usuario["clave"] . "<br>";
}


$sql = "DELETE FROM usuarios where id=:id";
$stmt = $conexion->prepare($sql);
$stmt->execute([
    "id" => 3
]);


//registro usuarios

$usuario = "trojas";
$clave = "12345";
/*
$clave_hash = password_hash($clave, PASSWORD_BCRYPT);
$sql = "INSERT INTO usuarios (usuario, clave, rol) VALUES (:usuario,:clave,:rol)";
$stmt = $conexion->prepare($sql);
$stmt->execute([
    "usuario" => $usuario,
    "clave" => $clave_hash,
    "rol" => "estudiante"
]);*/
//$2y$10$0fk1EDsL/ORVmiaS0WeZy.IKHuw.lyewQTpJucgDHDx8HByDKCLn6
//$2y$10$5/JsoYLDbG3LnAY/Ta5uhearB3XNIbHzU91rs7iMzqg4Ua3HPcTga
//$2y$10$1dxQG1flxngxzc7Q4DZ1WenQU2gGEcyBPzbr/mz1jYCgOc75LIq7G


//$2y$10$mKvmrnUDT6cAbnFcbui0mewZWaELGA5thlryMbilUmFk7Im83jj02

//loguear 1. verificar si el usuario

$sql = "SELECT * FROM usuarios where usuario=:usuario";
$stmt = $conexion->prepare($sql);
$stmt->execute([
    "usuario" => $usuario
]);

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if($usuario && password_verify($clave, $usuario["clave"])){
    echo "Usuario y clave OK!";
} else {
    echo "Usuario o clave incorrecto!";
}