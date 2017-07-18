<?php


$mysqli = new mysqli("127.0.0.1", "enzo", "minino", "jade_sysdb");

if ($mysqli->connect_errno) {
    printf("Fallo la conexión: %s\n", $mysqli->connect_error);
    exit();
}


?>
