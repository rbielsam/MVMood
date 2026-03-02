<?php
class ACL {

	private static $permisos = [
    	'admin' => [
        	'publicaciones.index',
        	'publicaciones.ver',
        	'publicaciones.eliminar',
        	'usuarios.crear',
        	'usuarios.editar',
        	'usuarios.ver',
			'usuarios.eliminar'
    	],
    	'user' => [
        	'publicaciones.index',
        	'publicaciones.ver',
        	'publicaciones.crear',
        	'publicaciones.editar',
        	'publicaciones.eliminar',
        	'usuarios.ver',
        	'usuarios.editar',
			'usuarios.eliminar'
    	]
	];

	public static function puede($accion) {

    	if (!isset($_SESSION['rol'])) {
        	return false;
    	}

    	$rol = $_SESSION['rol'];

    	return in_array($accion, self::$permisos[$rol]);
	}
}
?>
