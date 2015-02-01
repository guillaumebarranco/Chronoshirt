<?php
session_start();

if (empty($_SESSION['pseudo_admin']) && empty($_SESSION['password_admin'])) {
    header('Location: http://www.webarranco.fr/Project_PHP/connexion_admin.php');

} else {
	echo 'Bienvenue admin ' .$_SESSION['pseudo_admin'];
}
?>

<form action="deco.php" method="post">
<input name="deco" type="submit" value="Log out" />
</form>

<!doctype html>
<html lang="fr" rel="noindex, nofollow">
	<head>
		<meta charset="utf-8">

		<title>Chronoshirt - Backoffice</title>

		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/> 
		<link rel="icon" href="favicon.ico" type="image/x-icon"/>
		
	<link rel="stylesheet" type="text/css" href="../stylesheets/index.css" />

	</head>

<body class="page_admin">

	<div class="left">
			<a href="index.php" class="logo"></a>
			<nav id="navigation">
				<ul class="menu">
					<li><a class="active" href="index.php">Home</a></li>
					<li><a href="products/products_admin.php">Products</a></li>
					<li><a href="users/users_admin.php">Users</a></li>
					<li><a href="orders_admin.php">Orders</a></li>
				</ul>
			</nav>
	</div>

	<section class="wrapper">
		<h1 class="h1 center">Welcome on Chronoshirt Backoffice.</h1>
		
	</section>

<script type="text/javascript" src="js/jquery.js"></script>

</body>
</html>