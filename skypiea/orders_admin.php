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

		<title>Chronoshirt Backoffice - Products</title>

		<link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon"/> 
		<link rel="icon" href="../../favicon.ico" type="image/x-icon"/>
		
		<link rel="stylesheet" type="text/css" href="../stylesheets/index.css" />
		<link rel="stylesheet" type="text/css" href="Footable/css/footable-0.1.css" />

	</head>

<body class="page_admin">

	<div class="left">
			<a href="index.php" class="logo"></a>
			<nav id="navigation">
				<ul class="menu">
					<li><a href="index.php">Home</a></li>
					<li><a href="products/products_admin.php">Products</a></li>
					<li><a href="users/users_admin.php">Users</a></li>
					<li><a class="active" href="orders_admin.php">Orders</a></li>
				</ul>
			</nav>
	</div>

	<section class="wrapper">
		<h1 class="h1 center">Welcome on Chronoshirt, the best online website to provide you amazing shirts</h1>



		<a class="add" href="#">Ajouter un produit</a>

		<div id="tableau">			
			<table class="footable">
				<thead>

					<th>Id</th>
					<th>Name</th>
					<th>Price</th>
					<th>Date</th>
				</thead>

				<tbody>

			<?php 
				require('connect.php');
				$reponse_orders = $connect->query('SELECT * FROM orders');

				while ($donnees_orders = $reponse_orders->fetch()) {
			?>
					<tr>
							<td class="first-td first-td1"><div class="text-td text-td1"><?php echo $donnees_orders['id'] ?></div></td>
							<td class="first-td first-td2"><div class="text-td text-td2"><?php echo $donnees_orders['name'] ?></div></td>
							<td class="first-td first-td4"><div class="text-td text-td4"><?php echo $donnees_orders['price'] ?></div> €</td>
							<td class="first-td first-td5"><div class="text-td text-td5"><?php echo $donnees_orders['datee'] ?></div></td>

						<!-- 
						Actions 
						-->
						<?php
							$reponse_action2 = $connect->query("SELECT * FROM action WHERE used = '1'");

							while ($donnees_action2 = $reponse_action2->fetch()) {
						?>

						<td><a href="products_<?php echo $donnees_action2['type'] ?>.php?id=<?php echo $donnees_products['id']; ?>" class="button-back button-back<?php echo $donnees_action2['id'] ?>"><?php echo $donnees_action2['type'] ?></a></td>
						<?php
							}

							$reponse_action2->closeCursor(); // Termine le traitement de la requête
						?>
						<!-- 
						Fin actions 
						-->

					</tr>

					<?php
						}
						$reponse_orders->closeCursor(); // Termine le traitement de la requête
					?>

				</tbody>
			</table>
		</div><!-- end #tableau-->

	</section>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="Footable/js/footable.js"></script>

</body>
</html>