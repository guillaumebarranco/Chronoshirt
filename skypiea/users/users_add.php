<?php
	require('connect.php');

	
session_start();

if (empty($_SESSION['pseudo_admin']) && empty($_SESSION['password_admin'])) {
    header('Location: http://www.webarranco.fr/Project_PHP/connexion_admin.php');

} else {
	echo 'Bienvenue admin ' .$_SESSION['pseudo_admin'];
}

	$login_users_add = $_POST['login_users_add'];
	$password_users_add = $_POST['password_users_add'];
	$name_users_add = $_POST['price_users_add'];
	$adress_users_add = $_POST['adress_users_add'];
	$CB_users_add = $_POST['CB_users_add'];
   
     $req_users = $connect->prepare('INSERT INTO users(login, password, name, adress, CB) 
		VALUES (:login_users_add, :password_users_add, :name_users_add, :adress_users_add, :CB_users_add)');

		$req_users->execute(array(
		'login_users_add' => $login_users_add,
		'password_users_add' => $password_users_add,
		'name_users_add' => $name_users_add,
		'adress_users_add' => $adress_users_add,
		'CB_users_add' => $CB_users_add
		));

	echo'Votre modification s\'est effectuee avec succes, cliquez sur le bouton Revenir pour retourner a la page precedente.';
    echo '<a href="users_admin.php">Revenir</a>';