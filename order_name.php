<?php
session_start();

if (empty($_SESSION['login']) && empty($_SESSION['password'])) {
    header('Location: connexion.php');

} else {

echo '<title>Chronoshirt - Order </title>';
echo "<br /><div>Welcome " .$_SESSION['login']. " to your order. You will check some points before buy the amazing t-shirts you have taken in your cart</div>";

require('connect.php');

$the = $_SESSION['login'];

echo "<br />Your information<br /><br />";

			$answer_user_order = $connect->query("SELECT * FROM users WHERE login ='$the'"); // SQL Query

			while ($donnees_user_order = $answer_user_order->fetch()) {

		?>
			<div>Name</div><input type="text" name="name" value="<?php echo $donnees_user_order['name']; ?>" /><br /><br />
			<div>Adress</div><input type="text" name="adress" value="<?php echo $donnees_user_order['adress']; ?>" /><br /><br />
			<div>CB Cart</div><input type="text" name="CB" value="<?php echo $donnees_user_order['CB']; ?>" /><br /><br />
		<?php
			}
			$answer_user_order->closeCursor(); // End of the query

	echo 'Clik right here to validate the informations and pass the order of your products.<br /><br />';
	echo '<a href="order_products.php">Continue the order</a>';
}
?>