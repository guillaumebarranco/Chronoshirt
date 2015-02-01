<?php 

session_start();

$login_connexion = $_POST['login'];
$password_connexion = $_POST['password'];

  if((isset($login_connexion)) && (isset($password_connexion))) {

	include('datas.php');

		if ((in_array($login_connexion, $login)) && (in_array($password_connexion, $password))) {

		$_SESSION['login'] = $login_connexion;
		$_SESSION['password'] = $password_connexion;

	} else {

	}
}

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

		<title>Chronoshirt - Online sale website</title>

		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/> 
		<link rel="icon" href="favicon.ico" type="image/x-icon"/>
		
	<link rel="stylesheet" type="text/css" href="stylesheets/index.css" />
	<link rel="stylesheet" type="text/css" href="stylesheets/jquery.bxslider.css" />

	

	</head>

<body class="home">

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
		<h1 class="h1 center">Welcome on Chronoshirt, the best online website to provide you amazing shirts</h1>

		<div class="swaggy">HEY SWAGGY, HERE OUR top 3 SELL OF THE MONTH :</div>

		<div class="slider-container">

			<ul class="bxslider">
			<?php 

				require('connect.php');

				$reponse_best_shirt = $connect->query("SELECT * FROM article WHERE best = '1'");

				$z = 1;

				while ($donnees_best_shirt = $reponse_best_shirt->fetch()) {

					

			?>
				<li class="tshirts tshirt_cat<?php echo $donnees_best_shirt['id_categories']?> item">
					<div class="number">#<?php echo $z; ?></div>
					<img src="<?php echo $donnees_best_shirt['url'] ?>" width="200" height="215" alt="" />
					<form class="add_cart" method="post" action="add_cart.php">
					<input type="hidden" name="id" value="<?php echo $donnees_best_shirt['id']; ?>"/>
					<input type="hidden" name="name" value="<?php echo $donnees_best_shirt['name']; ?>"/>
					<input type="hidden" name="price" value="<?php echo $donnees_best_shirt['price']; ?>"/>
					<input type="submit" value="Add to cart"/>
				</form>
				</li>

				<!--$(this).find('').addClass();    pour changer la couleur a chaque fois. -->
			<?php

				
			}

			$reponse_best_shirt->closeCursor(); // Termine le traitement de la requête
		?>

		</ul>
	</div> <!-- slider container -->


	<div class="chronos"></div>
		
	</section>

	<!--<footer id="footer">
		Copyright
	</footer>-->

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.bxslider.js"></script>

<script>
$(document).ready(function(){
  $('.bxslider').bxSlider();
});
</script>

<script>
/*
$t1 = $('.tshirt1');
$t2 = $('.tshirt2');
$t3 = $('.tshirt3');

$t2.hide();
$t3.hide();
*/
</script>

</body>
</html>