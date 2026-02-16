<?php
function connect() {
    $opciones = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ];

    return new PDO(
        "mysql:host=localhost;dbname=mvc;charset=utf8mb4",
        "deploy",
        "1234",
        $opciones
    );
}

?>
