<?php
session_start();

// We include the file containing all the functions of our cart

include 'functions_cart.php';

$id = $_GET['id']; // We get the id of the product we want to delete by the URL

// We call the function "remove()" we have created in "functions_cart.php", the page we included in the beginning. This will delete the article.

remove($id);

// After the process, the visitor is redirected in the cart page

header('location:cart.php');
?>