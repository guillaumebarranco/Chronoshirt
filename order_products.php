<?php
session_start();

if (empty($_SESSION['login']) && empty($_SESSION['password'])) {
    header('Location: connexion.php');

} else {

echo '<title>Chronoshirt - Order </title>';
echo "<br /><div>Welcome " .$_SESSION['login']. " to your order. Now you will finish the order.</div><br />";

require('connect.php');
include 'functions_cart.php';
?>

<style>

	table, td, tr {
		border: solid 1px black;
	}
	</style>

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

<?php

echo "<br />Total : ".total();

?>

<br /><br />

<form method="post" action="order_end.php">
	<input type="hidden" name="price" value="<?php echo ' ' .total(); ?>" />

	<input type="submit" class="button button-validation" value="It's all good, let's pass my order damn !" />

</form>

<?php
}
?>