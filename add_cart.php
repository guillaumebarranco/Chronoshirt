<?php
session_start();

// We include the file containing all the functions of our cart

include 'functions_cart.php'; 

// We get the id, the name and the price of the product we sent by products.php in POST, because it was send by a form

$product_id = $_POST['id'];
$product_name = $_POST['name'];
$product_price = $_POST['price'];

// We put the quantity to 1, and the user will be able to modify it after if he want

$product_quantity = 1;

// We call the function "add()" we have created in "functions_cart.php", the page we included in the beginning. This will add the article.

add($product_id, $product_name, $product_quantity, $product_price);

// After the process, the visitor is redirected in the cart page

header('location:cart.php');
?>