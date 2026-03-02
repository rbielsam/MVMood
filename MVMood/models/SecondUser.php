<?php
require '../models/db.php';

//$passwordAdmin = password_hash("admin123", PASSWORD_DEFAULT);
$passwordUser  = password_hash("ejemplo", PASSWORD_DEFAULT);

$db = conectar();
//$idadmin = uniqid('', true);
$iduser = uniqid('', true);
$stmt = $db->prepare("
	INSERT INTO usuario (idUnique, email, nickname, foto, password, rol)
	VALUES (:idUnique, :email, :nickname, :foto, :password, :rol)
");

//$stmt->execute([
//    ':idUnique' => $idadmin,
//	':email'    => 'admin@institutmvm.cat',
//	':nickname' => 'Admin',
//	':foto'     => 'user.png',
//	':password' => $passwordAdmin,
//	':rol'      => 'admin'
//]);

$stmt->execute([
    'idUnique'  => $iduser,
	':email'    => 'ejemplo@institutmvm.cat',
	':nickname' => 'Ejemplo',
	':foto'     => 'user.png',
	':password' => $passwordUser,
	':rol'      => 'user'
]);

echo "Usuario 'Ejemplo' creado correctamente:<br>";
//echo "Admin: admin@institutmvm.cat / admin123<br>";
//echo "User: user@institutmvm.cat / user123<br>";
?>
