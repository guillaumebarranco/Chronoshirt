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
		
		<link rel="stylesheet" type="text/css" href="../../stylesheets/index.css" />
		<link rel="stylesheet" type="text/css" href="../Footable/css/footable-0.1.css" />

	</head>

<body class="page_admin">

	<div class="left">
			<a href="index.php" class="logo"></a>
			<nav id="navigation">
				<ul class="menu">
					<li><a href="../index.php">Home</a></li>
					<li><a class="active" href="products_admin.php">Products</a></li>
					<li><a href="../users/users_admin.php">Users</a></li>
					<li><a href="../orders_admin.php">Orders</a></li>
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
					<th>Catégorie</th>
					<th>Price</th>
					<th>Size</th>
					<th>URL</th>
					<th>Color</th>
					<th>Action</th>
				</thead>

				<tbody>

			<?php 
				require('connect.php');
				$reponse_products = $connect->query('SELECT * FROM article ORDER BY id');

				while ($donnees_products = $reponse_products->fetch()) {
			?>
					<tr>
							<td class="first-td first-td1"><div class="text-td text-td1"><?php echo $donnees_products['id'] ?></div></td>
							<td class="first-td first-td2"><div class="text-td text-td2"><?php echo $donnees_products['name'] ?></div></td>
							<td class="first-td first-td3"><div class="text-td text-td3"><?php echo $donnees_products['id_categories'] ?></div></td>
							<td class="first-td first-td4"><div class="text-td text-td4"><?php echo $donnees_products['price'] ?></div> €</td>
							<td class="first-td first-td5"><div class="text-td text-td5"><?php echo $donnees_products['size'] ?></div></td>
							<td class="first-td first-td6" style="width: 150px; max-width: 150px; overflow-x: scroll;"><div class="text-td text-td6"><?php echo $donnees_products['url'] ?></div></td>
							<td class="first-td first-td7"><div class="text-td text-td7"><?php echo $donnees_products['color'] ?></div></td>

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
						$reponse_products->closeCursor(); // Termine le traitement de la requête
					?>

				</tbody>
			</table>
		</div><!-- end #tableau-->

	</section>

<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../Footable/js/footable.js"></script>

<script>

	$(document).ready(function(){

		var $modify = $('.button-back1');
		$modify.attr('href', '#');

		$modify.click(function(e) {

			e.preventDefault();

			$tr = $(this).closest('tr');

			$tds = $tr.find('.text-td');

			$text1 = $tr.find('.text-td1').text();
			$text2 = $tr.find('.text-td2').text();
			$text3 = $tr.find('.text-td3').text();
			$text4 = $tr.find('.text-td4').text();
			$text5 = $tr.find('.text-td5').text();
			$text6 = $tr.find('.text-td6').text();
			$text7 = $tr.find('.text-td7').text();

			$('html').append('<div class="lightbox">' +
								"<form method='post' action='products_modify.php?id=" + $text1 + "'>" +
									'<div class="label-input">id</div><input type="text" name="id_product" value="' + $text1 + '"/>' +
									'<div class="label-input">name</div><input type="text" name="name_product" value="' + $text2 + '"/>' +
									'<div class="label-input">categorie</div><input type="text" name="cat_product" value="' + $text3 + '"/>' +
									'<div class="label-input">price</div><input type="text" name="price_product" value="' + $text4 + '"/>' +
									'<div class="label-input">size</div><input type="text" name="size_product" value="' + $text5 + '"/>' +
									'<div class="label-input">url</div><input type="text" name="url_product" value="' + $text6 + '"/>' +
									'<div class="label-input">color</div><input type="text" name="color_product" value="' + $text7 + '"/>' +
									'<input type="submit" value="Valider"/>' +
								'</form>' + 
								'<a href="#" class="return">Return</a>' +
							'</div>');
		});

		$('.return').click(function() {
			$('.lightbox').remove();
		});

//
//
//
//
//
		var $add = $('.add');

		$add.click(function(e) {

			e.preventDefault();

			$('html').append('<div class="lightbox">' +
								"<form method='post' action='products_add.php'>" +
									'<div class="label-input">name</div><input type="text" name="name_product_add"/>' +
									'<div class="label-input">categorie</div><input type="text" name="cat_product_add"/>' +
									'<div class="label-input">price</div><input type="text" name="price_product_add"/>' +
									'<div class="label-input">size</div><input type="text" name="size_product_add"/>' +
									'<div class="label-input">url</div><input type="text" name="url_product_add"/>' +
									'<div class="label-input">color</div><input type="text" name="color_product_add"/>' +
									'<input type="submit" value="Valider"/>' +
								'</form>' + 
								'<a  href="#" class="return">Return</a>' +
							'</div>');
		});

	});
</script>

</body>
</html>