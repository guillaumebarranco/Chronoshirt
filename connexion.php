<?php

require('connect.php');
session_start();

echo 'Hello ' .$_SESSION['login']. '';

?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
	
		<title>Chronoshirt - Inscription</title>

		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/> 
		<link rel="icon" href="favicon.ico" type="image/x-icon"/>
		
	<link rel="stylesheet" type="text/css" href="stylesheets/index.css" />

	</head>

<body class="inscription">

	<div class="left">
				<a href="index.php" class="logo"></a>
			<nav id="navigation">
				<ul class="menu">
					<li><a  class="active" href="index.php">Home</a></li>
					<li><a href="products.php">Products</a></li>
					<li><a href="about.php">About us</a></li>
				</ul>
			</nav>

			<br />
			<a class="button" href="register.php"><div class="button-register"></div>Register</a><br />
			<a class="button" href="connexion.php"><div class="button-connexion"></div>Sign in</a><br />
			<a class="button" href="connexion_admin.php"><div class="button-connexion"></div> Backoffice</a><br />
			<a class="button" href="cart.php"><div class="button-cart"></div>Your cart</a>
		</div>

<form method="post" action="index.php">

	<label for="login">Login</label>

		<input type="text" name="login" required/>

	<label for="password">Password</label>

		<input type="password" name="password" required/>

		<input type="submit" class="button button-validation" value="Valider" />

</form>

<a href="index.php">Retour à l'index</a>

<script type="text/javascript" src="js/jquery.js"></script>

</body>
</html>