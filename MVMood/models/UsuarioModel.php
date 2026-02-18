<?php
require_once "db.php";
require_once "Usuario.php";

class UsuarioModel {
	
	public function getAll() {
		$db = connect();
		$stmt = $db->prepare("SELECT * FROM publicacion");
		$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$usuarios = [];
		foreach ($resultado as $fila) {
			$usuarios[] = new Usuario($fila);
		}
		return $usuarios;
	}

	public function getById($idUnique) {
		
	}

	public function anadir(Usuario $usuario) {
		 $db = conectar();
                $stmt = $db->prepare("
                        INSERT INTO usuarios (usuario, password, rol)
                        VALUES (:usuario, :password, :rol)
                ");
                $contrasena = $usuario->password;
                $encriptado = password_hash($contrasena, PASSWORD_DEFAULT);
                $stmt->execute([
                        ':usuario'        => $usuario->usuario,
                        ':password'       => $encriptado,
                        ':rol'        => $usuario->rol
                ]);
	}

	public function perfil(Usuario $usuario) {
		
	}

	public function update($datos = []) {
		
	}

	public function cambiarNickname($datos = []) {
		$db = conectar();
		$stmt = $db->prepare("UPDATE usuario SET nickname = :nickname WHERE idUnique = :idUnique");
		$stmt->execute([
			':nickname'	=> $datos['nickname'],
			':idUnique'	=> $datos['idUnique']
		]);
	}
	
	public function buscarPorIdUnique() {
		$db = connect();
    	$stmt = $db->prepare("SELECT * FROM usuarios WHERE idUnique = :idUnique LIMIT 1");
    	$stmt->execute([':idUnique' => $idUnique]);
		$resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    	return $resultado;
	}
}