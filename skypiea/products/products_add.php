<?php
	require('connect.php');

	$name_product_add = $_POST['name_product_add'];
	$cat_product_add = $_POST['cat_product_add'];
	$price_product_add = $_POST['price_product_add'];
	$size_product_add = $_POST['size_product_add'];
	$url_product_add = $_POST['url_product_add'];
	$color_product_add = $_POST['color_product_add'];
   
     $req = $connect->prepare('INSERT INTO article(name, id_categories, price, size, url, color) 
		VALUES (:name_product_add, :cat_product_add, :price_product_add, :size_product_add, :url_product_add, :color_product_add)');

		$req->execute(array(
		'name_product_add' => $name_product_add,
		'cat_product_add' => $cat_product_add,
		'price_product_add' => $price_product_add,
		'size_product_add' => $size_product_add,
		'url_product_add' => $url_product_add,
		'color_product_add' => $color_product_add
		));

	echo'Votre modification s\'est effectuee avec succes, cliquez sur le bouton Revenir pour retourner a la page precedente.';
    echo '<a href="products_admin.php">Revenir</a>';