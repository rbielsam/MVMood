<?php
require_once "db.php";
require_once "Publicacion.php";

class PublicacionesModel {

	public function getAll() {
    	    $db = conectar();
    	    $stmt = $db->query("
        	SELECT p.*, u.nickname, u.foto as usuario_foto
        	FROM publicacion p
        	INNER JOIN usuario u ON p.idUsuario = u.idUnique
        	ORDER BY p.fecha DESC
    	    ");
    	    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    	    $publicaciones = [];
    	    foreach ($resultado as $fila) {
        	$publicaciones[] = $fila;
    	    }
    	    return $publicaciones;
	}

	public function getById($id) {
    	    $db = conectar();
    	    $stmt = $db->prepare("
        	SELECT p.*, u.nickname, u.foto as usuario_foto
        	FROM publicacion p
        	INNER JOIN usuario u ON p.idUsuario = u.idUnique
        	WHERE p.idUnique = :id
    	    ");
    	    $stmt->execute([':id' => $id]);
    	    $fila = $stmt->fetch(PDO::FETCH_ASSOC);
    	    return $fila;
	}

	public function getByUsuario($idUsuario) {
    	    $db = conectar();
    	    $stmt = $db->prepare("
        	SELECT p.*, u.nickname, u.foto as usuario_foto
        	FROM publicacion p
        	INNER JOIN usuario u ON p.idUsuario = u.idUnique
        	WHERE p.idUsuario = :idUsuario
        	ORDER BY p.fecha DESC
    	    ");
    	    $stmt->execute([':idUsuario' => $idUsuario]);
    	    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    	    return $resultado;
	}

	public function save(Publicacion $publicacion) {
    	    $db = conectar();
    	    $stmt = $db->prepare("
        	INSERT INTO publicacion (idUnique, idUsuario, contenido, foto, fecha)
                VALUES (:idUnique, :idUsuario, :contenido, :foto, :fecha)
    	    ");
    	    $stmt->execute([
		':idUnique'  => $publicacion->idUnique,
                ':idUsuario' => $publicacion->idUsuario,
                ':contenido' => $publicacion->contenido,
                ':foto'      => $publicacion->foto,
                ':fecha'     => $publicacion->fecha
    	    ]);
	}

	public function update() {
    	
	}

	public function delete($id) {
    	    $db = conectar();
    	    $stmt = $db->prepare("DELETE FROM publicacion WHERE idUnique = :id");
    	    $stmt->execute([':id' => $id]);
	}
}
?>
