<?php
	require('connect.php');
     $id2 = $_GET["id"];
     $req_delete_products= $connect->exec("DELETE FROM article WHERE id = ".$id2 );

     echo 'Votre requête a bien été effectuée. Vous allez être redirigé vers la page précédente.';
?>
<script>
	setTimeout(function() {
			<?php header('Location: products_admin.php'); ?>
		}, 3000);
</script>