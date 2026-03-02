<?php

class Validacion {

	public static function validarPublicacion($datos) {

    	$errores = [];

    	if (empty($datos['contenido'])) {
        	$errores[] = "El contenido es obligatorio";
    	}

    	if (strlen($datos['contenido']) > 500) {
        	$errores[] = "El contenido no puede superar los 500 caracteres";
    	}

    	return $errores;
	}

	public static function validarUsuario($datos) {

    	$errores = [];

    	if (empty($datos['email'])) {
        	$errores[] = "El email es obligatorio";
    	}else{
			$dominio = strrchr($datos['email'], "@");
			if($dominio != "@institutmvm.cat"){
				$errores[] = "El email debe acabar con '@institutmvm.cat'";
			}
		}
		
		//if (!strrchr($datos['email'], "@") === "institutmvm.cat") {
		//	$errores[] = "El email debe acabar con '@institutmvm.cat'";
		//} 
		
		if (empty($datos['nickname'])) {
        	$errores[] = "El nickname es obligatorio";
    	}
		
		if (empty($datos['password'])) {
        	$errores[] = "La contraseña es obligatoria";
    	} elseif (!empty($datos['password'])) {
			if($datos['password'] != $datos['repeatPassword']){
				$errores[] = "las contraseñas no corresponden";
			}		
		} elseif (!empty($datos['password']) && strlen($datos['password']) < 6) {
        	$errores[] = "La contraseña debe tener al menos 6 caracteres";
    	}

    	return $errores;
	}
}
?>
