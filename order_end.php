<?php
session_start();

if (empty($_SESSION['login']) && empty($_SESSION['password'])) {
    header('Location: connexion.php');

} else {

echo '<title>Chronoshirt - Order </title>';
echo "<br /><div>Thank you " .$_SESSION['login']. " for your order. You can see the details just above.</div><br />";
require('connect.php');

$order_price = $_POST['price'];
$order_name = $_SESSION['login'];
$order_date = date('jS \of F Y');

?>

<div>Name : <?php echo $order_name; ?></div><br />
<div>Price : <?php echo $order_price; ?></div><br />
<div>Date : <?php echo $order_date; ?></div><br />

<?php

		$order_query = $connect->prepare('INSERT INTO orders(name, price, datee) 
		VALUES (:name, :price, :datee)');

		$order_query->execute(array(
		'name' => $order_name,
		'price' => $order_price,
		'datee' => $order_date
		));

?>

<div>Merci pour vos achats, vous pouvez des maintenant retourner à la page principale !</div>
<a href="index.html">Retour à l'index</a>

<?php
}
?>