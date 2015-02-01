<?php
	require('connect.php');

	$id_user = $_POST['id_user'];
	$login_user = $_POST['login_user'];
	$password_user = $_POST['password_user'];
	$name_user = $_POST['name_user'];
	$adress_user = $_POST['adress_user'];
	$CB_user = $_POST['CB_user'];
    $id3 = $_GET["id"];

     $req_modify_products = $connect->exec("UPDATE users SET id='".$id_user."', login='".$login_user."', password='".$password_user."', name='".$name_user."', adress='".$adress_user."', CB='".$CB_user."' WHERE id = ".$id_user);
     echo'Votre modification s\'est effectuee avec succes, cliquez sur le bouton Revenir pour retourner a la page precedente.';
     echo '<a href="users_admin.php">Revenir</a>';