<?php

require_once 'db.php';
require_once 'Publicacion.php';

class PublicacionModel {
	public function getAll(){
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
        	$db = conectar();
                $stmt = $db->prepare("SELECT * FROM publicacion WHERE id = :id");
                $stmt->execute([':id' => $id]);
                $fila = $stmt->fetch(PDO::FETCH_ASSOC);
                if (!$fila) {
                        return null;
                }
                $publicacion = new Publicacion($fila);
                return $publicacion;
        }
	
	public function showUserPost(Usuario $usuario) {
        	
        }

	public function showPostDetails(Publicacion $publicacion) {
		
	}

	public function create(Publicacion $publicacion) {
        	
	}

	public function editar($datos) {
		
	}
	
	public function delete($id) {
        	
	}

}
