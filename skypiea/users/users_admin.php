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
	
		<title>Chronoshirt Backoffice - Users</title>

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
					<li><a href="../products/products_admin.php">Products</a></li>
					<li><a class="active" href="users_admin.php">Users</a></li>
					<li><a href="../orders_admin.php">Orders</a></li>
				</ul>
			</nav>
	</div>

	<section class="wrapper">
		<h1 class="h1 center">Welcome on Chronoshirt, the best online website to provide you amazing shirts</h1>

		<a class="add" href="#">Add an user</a>

		<div id="tableau">			
			<table class="footable">
				<thead>

					<th>Id</th>
					<th>Login</th>
					<th>Password</th>
					<th>Name</th>
					<th>Adress</th>
					<th>CB</th>
					<th>Admin</th>
					<th>Action</th>
				</thead>

				<tbody>

			<?php 
				require('connect.php');

				$reponse_users = $connect->query('SELECT * FROM users');

				while ($donnees_users = $reponse_users->fetch()) {
			?>

					<tr>
						<td><div class="text-td text-td1"><?php echo $donnees_users['id'] ?></div></td>
						<td><div class="text-td text-td2"><?php echo $donnees_users['login'] ?></div></td>
						<td><div class="text-td text-td3"><?php echo $donnees_users['password'] ?></div></td>
						<td><div class="text-td text-td4"><?php echo $donnees_users['name'] ?></div></td>
						<td><div class="text-td text-td5"><?php echo $donnees_users['adress'] ?></div></td>
						<td><div class="text-td text-td6"><?php echo $donnees_users['CB'] ?></div></td>
						<td><div class="text-td text-td7"><?php echo $donnees_users['admin'] ?></div></td>

						<!-- 
						Actions 
						-->
						<?php
							$reponse_users2 = $connect->query("SELECT * FROM action WHERE used = '1'");

							while ($donnees_users2 = $reponse_users2->fetch()) {
						?>

						<td><a href="users_<?php echo $donnees_users2['type'] ?>.php?id=<?php echo $donnees_users['id']; ?>" class="button-back button-back<?php echo $donnees_users2['id'] ?>"><?php echo $donnees_users2['type'] ?></a></td>
						<?php
							}

							$reponse_users2->closeCursor(); // Termine le traitement de la requête
						?>
						<!-- 
						Fin actions 
						-->
						
					</tr>

					<?php
						}
						$reponse_users->closeCursor(); // Termine le traitement de la requête
					?>

				</tbody>
			</table>
		</div>
		
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

			$text1_user = $tr.find('.text-td1').text();
			$text2_user = $tr.find('.text-td2').text();
			$text3_user = $tr.find('.text-td3').text();
			$text4_user = $tr.find('.text-td4').text();
			$text5_user = $tr.find('.text-td5').text();
			$text6_user = $tr.find('.text-td6').text();

			$('html').append('<div class="lightbox">' +
								"<form method='post' action='users_modify.php?id=" + $text1_user + "'>" +
									'<div class="label-input">id</div><input type="text" name="id_user" value="' + $text1_user + '"/>' +
									'<div class="label-input">login</div><input type="text" name="login_user" value="' + $text2_user + '"/>' +
									'<div class="label-input">password</div><input type="text" name="password_user" value="' + $text3_user + '"/>' +
									'<div class="label-input">name</div><input type="text" name="name_user" value="' + $text4_user + '"/>' +
									'<div class="label-input">adress</div><input type="text" name="adress_user" value="' + $text5_user + '"/>' +
									'<div class="label-input">CB</div><input type="text" name="CB_user" value="' + $text6_user + '"/>' +
									'<input type="submit" value="Valider"/>' +
								'</form>' + 
								'<button id="return">Return</button>' +
							'</div>');
		});

		$('#return').click(function() {
			$('.lightbox').remove();
		});

		var $add = $('.add');

		$add.click(function(e) {

			e.preventDefault();

			$('html').append('<div class="lightbox">' +
								"<form method='post' action='users_add.php'>" +
									'<div class="label-input">login</div><input type="text" name="login_users_add"/>' +
									'<div class="label-input">password</div><input type="text" name="password_users_add"/>' +
									'<div class="label-input">name</div><input type="text" name="name_users_add"/>' +
									'<div class="label-input">adress</div><input type="text" name="adress_users_add"/>' +
									'<div class="label-input">CB</div><input type="text" name="CB_users_add"/>' +
									'<input type="submit" value="Valider"/>' +
								'</form>' + 
								'<button id="return">Return</button>' +
							'</div>');
		});
	});
</script>

</body>
</html>