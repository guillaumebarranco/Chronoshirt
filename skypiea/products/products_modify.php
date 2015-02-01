<?php
	require('connect.php');

	$id_product = $_POST['id_product'];
	$name_product = $_POST['name_product'];
	$cat_product = $_POST['cat_product'];
	$price_product = $_POST['price_product'];
	$size_product = $_POST['size_product'];
	$color_product = $_POST['color_product'];
	$url_product = $_POST['url_product'];
   
     //Tu recuperes l'id du contact
     $id3 = $_GET["id"];

     $req_modify_products = $connect->exec("UPDATE article SET id='".$id_product."', name='".$name_product."', id_categories='".$cat_product."', price='".$price_product."', size='".$size_product."', url ='".$url_product."', color='".$color_product."' WHERE id = ".$id_product);
     
	echo'Votre modification s\'est effectuee avec succes, cliquez sur le bouton Revenir pour retourner a la page precedente.';
    echo '<a href="products_admin.php">Revenir</a>';