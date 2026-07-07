<?php


$host = "db";
$database = "restaurante_db";
$user = "root";
$password = "root";


try {
    $conexion = new PDO("mysql:host=" . $host . ";dbname=" . $database . ";charset=utf8mb4", $user, $password);
} catch (Exception $e) {
    die($e->getMessage());
}




// CRUD

// Create (insert) - read (select) - update - delete

/*
$usuario = "trojas";
$clave = password_hash("12345",PASSWORD_BCRYPT);

echo $clave;
$2y$10$tYnsTe135p4.rrlWMJXci.sg0qH9Pd4NS00Nxzlkk0YH8M4/.BykK
$2y$10$UcwGHYntdhK5B5Oo81eUnuyHJPHvZafXEaJQYjCOLr1z00zmvVNLi
$2y$10$o34iclSWJ34QJXK0fdpjVuiU/aGPfRmQfBpdmfO4GT7quSl1O8XQi
die();
$rol = "admin";
try {
    $sql = "INSERT INTO usuarios (usuario, clave,rol) VALUES (:usuario, :clave, :rol);";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([
        ':usuario' => $usuario,
        ':clave' => $clave,
        ':rol' => $rol
    ]);
    echo "Usuario agregado!";
} catch (Exception $e) {
    die($e->getMessage());
}
/*
/*
$sql = "SELECT * FROM usuarios";
$stmt = $conexion->query($sql);
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($resultado);

//update

$sql = "UPDATE usuarios SET clave = :clave where id=:id";
$stmt = $conexion->prepare($sql);
$stmt->execute([
    ':clave' => "123456",
    ':id' => 2
]);

//delete

$sql = "DELETE FROM usuarios where id=:id";
$stmt = $conexion->prepare($sql);
$stmt->execute([
    ':id' => 2
]);
*/

//logica de login

$usuario = "trojas";
$clave = "123456";

$sql = "SELECT * FROM usuarios WHERE usuario = :usuario";
$stmt = $conexion->prepare($sql);
$stmt->execute([
    "usuario" => $usuario
]);

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

print_r($usuario);

if ($usuario && password_verify($clave, $usuario["clave"])) {
    echo "Login correcto!";
} else {
    echo "Usuario o clave incorrecto!";
}
