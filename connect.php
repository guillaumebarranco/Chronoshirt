<?php

$host = 'mysql51-75.perso';
$user = "webarranco8";
$pass = "dragonnoir8";

try {
	$connect = new PDO('mysql:host=mysql51-75.perso;dbname=webarranco8', $user, $pass); 
}
catch(Exception $e) {
	die('Impossible de se connecter à la BDD'.$e->getMessage());
}
?>