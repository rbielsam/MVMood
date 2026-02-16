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
                        $usuarios[] = new Publicacion($fila);
                }
                return $usuarios;
	}
	
	public function getById($id) {
        	$db = connect();
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
		try {
			$db = connect();
			$stmt = $db->prepare("INSERT into publicacion (idUnique, idUsuario, contenido, foto, fecha) VALUES (:idUnique, :idUsuario, :contenido, :foto, NOW())");
			$stmt->execute([
				':idUnique'	=> $publicacion->idUnique,
				':idUsuario'     => $publicacion->idUsuario,
				':contenido'     => $publicacion->contenido,
				':foto'     => $publicacion->foto,
			]);
		
		} catch (PDOException $e) {
			throw new Exception("Error al guardar la publicación");
		}
	}
		

	public function editar($datos) {
		
	}
	
	public function delete($id) {
        	
	}

}
