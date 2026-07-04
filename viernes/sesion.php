<?php
session_start();
if (!empty($_SESSION)) {
    if ($_SESSION["rol"] == "admin") {
        echo "Hola admin!!";
    } else {
        session_destroy();
    }
} else {
    echo "Eres invitado";
}
