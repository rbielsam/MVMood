<?php

function conectar() {
	$opciones = [
    	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
	];

	return new PDO(
    	"mysql:host=localhost;dbname=mvmood;charset=utf8mb4",
    	"mymvmoodca",
    	"123Institut456$",
    	$opciones
	);
}
