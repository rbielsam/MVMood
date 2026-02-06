<?php
require '../models/db.php';
$passwordAdmin = password_hash("adminpassword", PASSWORD_DEFAULT);
$passwordUser  = password_hash("userpassword", PASSWORD_DEFAULT);

$db = conectar();
    	$stmt = $db->prepare("
    	INSERT INTO usuario (.......)
    	VALUES (......)");

$stmt->execute([
        	'......'    	=> '........'
    	]);

$stmt->execute([
        	'......'    	=> '........'
    	]);

?>
