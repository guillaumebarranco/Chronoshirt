<?php

require('connect.php');
session_start();

echo 'Hello ' .$_SESSION['login']. '';

include 'functions_cart.php';

if(isset($_POST['destroy_cart'])) {
	removeCart();
	header ('Location: cart.php');
}

?>

<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">			

		<title>Chronoshirt - Products</title>

		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/> 
		<link rel="icon" href="favicon.ico" type="image/x-icon"/>
		
	<link rel="stylesheet" type="text/css" href="stylesheets/index.css" />

	<style>

	table, td, tr {
		border: solid 1px black;
	}
	</style>

	</head>

<body>

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

	<section class="wrapper">
		<h1 class="h1 center">Our products</h1><br /><br />

		<table class="footable">
				<thead>
					<th>Id</th>
					<th>Name</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Delete</th>
				</thead>

				<tbody>
					<?php 
						for($n = 0; $n < count($_SESSION['cart']['id']); $n++) {
					?>

						<tr>
							<?php echo("<td>" .$_SESSION['cart']['id'][$n]. "</td>"); ?>
							<?php echo("<td>" .$_SESSION['cart']['name'][$n]. "</td>"); ?>
							<?php echo("<td>" .$_SESSION['cart']['quantity'][$n]. "</td>"); ?>
							<?php echo("<td>" .$_SESSION['cart']['price'][$n]. "</td>"); ?>
							<?php echo("<td><a href=\"remove_cart.php?id=" .$_SESSION['cart']['id'][$n]. "\">delete</a></td>"); ?>
						</tr>

					<?php
						}
					?>
					
				</tbody>
			</table>

			<?php echo "<br />Total : ".total(); ?>

			<br /><br />

			<a href="order_name.php" style="font-size: 18px;">Order now</a><br /><br />

			<form action="cart.php" method="post">
				<input name="destroy_cart" class="button" style="margin: 0; width:170px;" type="submit" value="Clear the cart" />
			</form>

	</section>

	<script type="text/javascript" src="js/jquery.js"></script>

</body>
</html>