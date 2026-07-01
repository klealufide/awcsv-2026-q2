<?php
session_start();

if (!empty($_SESSION)) {
    if ($_SESSION["rol"] == "admin") {
        echo "Hola Admin!";
    } else {
        session_destroy();
    }
} else {
    echo "Hola Invitado!";
}
