<?php

require('connect.php');
session_start();

if(isset($_SESSION['login'])) {

	echo 'Hello ' .$_SESSION['login']. '';

} else {
	echo 'Hello Invité';
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

	</head>

<body>
		<div class="left">
				<a href="index.php" class="logo"></a>
			<nav id="navigation">
				<ul class="menu">
					<li><a href="index.php">Home</a></li>
					<li><a  class="active" href="products.php">Products</a></li>
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
		<h1 class="h1 center">Our products</h1>

		<div class="link_categories">

		<?php

		// Query which select all the categories and display them in order to be able to choose to show the categories you want and only it

			$reponse = $connect->query('SELECT * FROM categories'); // SQL Query

			while ($donnees = $reponse->fetch()) {

		?>
			<a href="#" class="option<?php echo $donnees['id'];?>"><?php echo $donnees['type'] ?></a>

		<?php
			}
			$reponse->closeCursor(); // End of the query
		?>

	</div>

	<ul class="list-tshirts">
		<?php 

			// The dynamic display of the t shirts. By an URL stored in the database, they are displayed.

			$reponse_shirt = $connect->query('SELECT * FROM article');

			while ($donnees_shirt = $reponse_shirt->fetch()) {

		?>
			<li class="tshirts tshirt_cat<?php echo $donnees_shirt['id_categories']?>">
				<a href="<?php echo $donnees_shirt['url'] ?>" target="_blank">
				<img src="<?php echo $donnees_shirt['url'] ?>" width="300" height="317" alt="" />
				</a>
				<div class="tshirt-name"><?php echo $donnees_shirt['name']; ?></div>
				<div><?php echo $donnees_shirt['price']; ?>,00 $</div>
				<form class="add_cart" method="post" action="add_cart.php">
					<input type="hidden" name="id" value="<?php echo $donnees_shirt['id']; ?>"/>
					<input type="hidden" name="name" value="<?php echo $donnees_shirt['name']; ?>"/>
					<input type="hidden" name="price" value="<?php echo $donnees_shirt['price']; ?>"/>
					<input type="submit" value="Add to cart"/>
				</form>
			</li>

			<!--$(this).find('').addClass();    pour changer la couleur a chaque fois. -->
		<?php

		}

		$reponse_shirt->closeCursor(); // Termine le traitement de la requête
	?>

	</ul>

	</section>

	<script type="text/javascript" src="js/jquery.js"></script>

	<script>

		$('.tshirts').hide();

	$(document).ready(function(){

		$('.option1').click(function(e) {

			e.preventDefault();

			$('.tshirt_cat1').show();
			$('.tshirt_cat2').hide();
			$('.tshirt_cat3').hide();
			$('.tshirt_cat4').hide();
			$('.tshirt_cat5').hide();

		});

		$('.option2').click(function(e) {

			e.preventDefault();

			$('.tshirt_cat2').show();
			$('.tshirt_cat1').hide();
			$('.tshirt_cat3').hide();
			$('.tshirt_cat4').hide();
			$('.tshirt_cat5').hide();

		});

		$('.option3').click(function(e) {

			e.preventDefault();

			$('.tshirt_cat3').show();
			$('.tshirt_cat2').hide();
			$('.tshirt_cat1').hide();
			$('.tshirt_cat4').hide();
			$('.tshirt_cat5').hide();

		});

		$('.option4').click(function(e) {

			e.preventDefault();

			$('.tshirt_cat4').show();
			$('.tshirt_cat2').hide();
			$('.tshirt_cat3').hide();
			$('.tshirt_cat1').hide();
			$('.tshirt_cat5').hide();

		});

		$('.option5').click(function(e) {

			e.preventDefault();

			$('.tshirt_cat5').show();
			$('.tshirt_cat2').hide();
			$('.tshirt_cat3').hide();
			$('.tshirt_cat4').hide();
			$('.tshirt_cat1').hide();

		});
	});

	</script>

	<!--<footer id="footer">

		Copyright
	</footer>-->

</body>
</html>