<?php
require_once "models/PublicacionesModel.php";
require_once "models/Validacion.php";
require_once "models/ACL.php";

class PublicacionesController {

	public function index() {
    	$modelo = new PublicacionesModel();
    	$publicaciones = $modelo->getAll();
    	require "views/publicaciones_listado.php";
	}

	public function crear() {
    	if (!ACL::puede('publicaciones.crear')) {
        	$_SESSION['error'] = "No tienes permisos para crear publicaciones";
        	header("Location: index.php");
        	exit;
    	}

    	if (isset($_POST['content'])) {
        	$datos = [
            	'idUsuario' => (int) $_SESSION['id'],
            	'contenido' => $_POST['content']
        	];

        	$errores = Validacion::validarPublicacion($datos);

        	if (!empty($errores)) {
            	$_SESSION['error'] = implode(', ', $errores);
            	header("Location: index.php?controller=Publicaciones&action=crear");
            	exit;
        	}

        	require_once 'models/Publicacion.php';
            $publicacion            = new Publicacion();
            $publicacion->idUnique  = uniqid('p', true);
            $publicacion->idUsuario = $datos['idUsuario'];
            $publicacion->contenido = $datos['contenido'];
            $publicacion->foto      = null;
            $publicacion->fecha     = date('Y-m-d H:i:s');
        	$modelo = new PublicacionesModel();
        	$modelo->save($publicacion);

        	$_SESSION['mensaje'] = "Publicación creada correctamente";
        	header("Location: index.php");
        	exit;
    	}

    	require "views/publicaciones_crear.php";
	}

	public function editar_publicacion() {
    	require "views/publicaciones_editar.php";
	}

	public function notificaciones() {
    	require "views/notifications.php";
	}

	public function mensages() {
    	require "views/messages.php";
	}

	public function eliminar() {
    	if (!ACL::puede('publicaciones.eliminar')) {
        	$_SESSION['error'] = "No tienes permisos para eliminar publicaciones";
        	header("Location: index.php");
        	exit;
    	}

    	if (!isset($_GET['id'])) {
        	header("Location: index.php");
        	exit;
    	}

    	$modelo = new PublicacionesModel();
    	$publicacion = $modelo->getById($_GET['id']);

    	if ($publicacion['idUsuario'] != $_SESSION['id'] && $_SESSION['rol'] != 'admin') {
        	$_SESSION['error'] = "No puedes eliminar publicaciones de otros usuarios";
        	header("Location: index.php");
        	exit;
    	}

    	$modelo->delete($_GET['id']);

    	$_SESSION['mensaje'] = "Publicación eliminada";
    	header("Location: index.php");
    	exit;
	}
}
?>
