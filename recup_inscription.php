<?php

	require('connect.php');

	$login = $_POST['login'];
	$password = $_POST['password'];
	$cfpassword = $_POST['cfpassword'];
	$name = $_POST['name'];
	$adress = $_POST['adress'];
	$CB = $_POST['CB'];

	if($password == $cfpassword) {


		$req = $connect->prepare('INSERT INTO users(login, password, name, adress, CB, admin) 
		VALUES (:login, :password, :name, :adress, :CB, :admin)');

		$req->execute(array(
		'login' => $login,
		'password' => $password,
		'name' => $name,
		'adress' => $adress,
		'CB' => $CB,
		'admin' => '0'
		));

		header('location:index.php');

	} else {

		header('location:inscription.php');
	}