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

	public function getById($id) {
		
	}

	public function anadir(Usuario $usuario) {
		
	}

	public function perfil(Usuario $usuario) {
		
	}

	public function update($datos = []) {
	
	}

	public function cambiarNickname(Usuario $usuario) {
		
	}

	public function buscarPorUUID(string $idUnique): {
    		$sql = "SELECT * FROM usuarios WHERE uuid = :uuid LIMIT 1";
    		$stmt = $this->db->prepare($sql);
    		$stmt->execute([':uuid' => $uuid]);

    		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
}
