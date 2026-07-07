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
