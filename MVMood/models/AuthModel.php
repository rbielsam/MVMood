<?php
require_once "db.php";

class AuthModel {

	public function login($email, $password) {

    	$db = conectar();

    	$stmt = $db->prepare(
        	"SELECT * FROM usuarios WHERE email = :email"
    	);
    	$stmt->execute([':email' => $email]);
    	$user = $stmt->fetch(PDO::FETCH_ASSOC);

    	if (isset($user) && password_verify($password, $user['password'])) {
        	return $user;
    	}
    	return false;
	}
}
?>
