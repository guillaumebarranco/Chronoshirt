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

		<title>Chronoshirt - About us</title>

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
					<li><a href="products.php">Products</a></li>
					<li><a h class="active" ref="about.php">About us</a></li>
				</ul>
			</nav>

			<br />
			<a class="button" href="register.php"><div class="button-register"></div>Register</a><br />
			<a class="button" href="connexion.php"><div class="button-connexion"></div>Sign in</a><br />
			<a class="button" href="connexion_admin.php"><div class="button-connexion"></div> Backoffice</a><br />
			<a class="button" href="cart.php"><div class="button-cart"></div>Your cart</a>
		</div>

	<section class="wrapper">
		<h1 class="h1 center">Presentation of the project</h1>

		<p>
			Chronoshirt is a project created by two students in SRC at Marne-La-Vallée. It's been created for a PHP Project in which we had to create 
			a functionnal e-commerce website. So we chose to sell fake fun t-shirts we have all designed in order to have a real project and no just
			articles took on the Internet. We hope you will be pleased to visit this website and you will like the way it's been realised.
		</p>

		<h1 class="h1 center">The creators</h1>

		<ul>
			<li class="creators anthony">
				<img src="" width="" height="" alt="" />
				<p class="pres-creators">
					Coming from a faraway island situated in the Carribean sea, we arrived to catch him for a year for being our garphic designer/ 
					illustrator. Give him a white paper, a pencil and his creativity will take care of the rest.
				</p>
				<div class="website">You can visit his website here : 
					<a href="#"></a>
				</div>
				<a href="mailto:anthony.nelzy@gmail.com" class="mail">anthony.nelzy@gmail.com</a>
			</li>

			<li class="creators guillaume">
				<img src="" width="" height="" alt="" />
				<p>
					Escaped of the Impel Down prison, he was diverting towards darker ways when he caught our crew up and dived in a ocean codes 
					of HTML, CSS, jquery, PHP and javascript to join the chrysalis (« chrysalide » in France) out it cocoon.
				</p>
				<div class="website">You can visit his website here : 
					<a href="http://www.webarranco.fr">http://www.webarranco.fr</a>
				</div>
				<a href="mailto:guillaume.barranco8@hotmail.fr" class="mail">guillaume.barranco8@hotmail.fr</a>
			</li>
		</ul>

	</section>

<script type="text/javascript" src="js/jquery.js"></script>

</body>
</html>