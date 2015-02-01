<?php

session_start();

	require('connect.php');

	// We recup the login and the password given in the form

	$login_admin = $_POST['login_admin'];
	$password_admin = $_POST['password_admin'];

	// We recup in the database the login and the password of the admins

	$req_admin = $connect->query("SELECT * FROM users WHERE admin = '1'");

	while ($donnees_admin = $req_admin->fetch()) {

		if($login_admin == $donnees_admin['login'] && md5($password_admin) == md5($donnees_admin['password'])) {

			// if the information of the form match with the datas, we give the visitor a SESSION variable without it's impossible to get to the backoffice

			$_SESSION['pseudo_admin'] = $login_admin;
			$_SESSION['password_admin'] = md5($password_admin);

			// The user is redirected to the backoffice

			header('Location: skypiea/accueil_admin.php');

		} else {

			// If the datas don't match, the user is redirected in the connexion_admin page

			header('Location: connexion_admin.php');
		}
	}

	$req_admin->closeCursor();