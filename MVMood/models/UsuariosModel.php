<?php
require_once "db.php";
require_once "Usuarios.php";

class UsuariosModel {

	public function getAll() {
    	$db = conectar();
    	$stmt = $db->query("SELECT * FROM usuarios ORDER BY id DESC");
    	$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    	$usuarios = [];
    	foreach ($resultado as $fila) {
        	$usuarios[] = new Usuario($fila);
    	}
    	return $usuarios;
	}

	public function getById($id) {
    	$db = conectar();
    	$stmt = $db->prepare("SELECT * FROM usuario WHERE idUnique = :idUnique");
    	$stmt->execute([':idUnique' => $id]);
    	$fila = $stmt->fetch(PDO::FETCH_ASSOC);
    	if ($fila) {
        	return new Usuario($fila);
    	}
    	return null;
	}

	public function save(Usuario $usuario) {
    	$db = conectar();
    	$stmt = $db->prepare("
        	INSERT INTO usuario (idUnique, email, nickname, foto, password, rol)
        	VALUES (:idUnique, :email, :nickname, :foto, :password, :rol)
    	");
    	$stmt->execute([
		':idUnique' => $usuario->idUnique, 
        	':email'    => $usuario->email,
        	':nickname' => $usuario->nickname,
        	':foto'     => $usuario->foto,
        	':password' => $usuario->password,
        	':rol'      => $usuario->rol
    	]);
	}

	public function update(Usuario $usuario) {
    	
	}

	public function cambiarPassword(Usuario $usuario) {
    	
	}

	public function delete($id) {
    	$db = conectar();
    	$stmt = $db->prepare("DELETE FROM usuario WHERE idUnique = :idUnique");
    	$stmt->execute([':idUnique' => $id]);
	}
}
?>
