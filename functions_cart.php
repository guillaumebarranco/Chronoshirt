<?php 

  /* Welcome in the page which will contain all the functions of the cart

  First, we create the cart by sessions variables. Like that, the visitor is given is own variables and don't interfere with the others.
  Two visitors can make a cart at the same time, but they will be given two different variables. 
  As long as they will stay on the website, the will keep their cart

  */

   if(!isset($_SESSION['cart'])) { // We create the cart, by veryfing that it doesn't exist. Else, we don't create it.

       $_SESSION['cart'] = array();  // The first variable is the cart which is an array containing arrays
       $_SESSION['cart']['id'] = array(); // This array will store all the id's of the products which will be added to the cart
       $_SESSION['cart']['name'] = array(); // The same, but with the names
       $_SESSION['cart']['quantity'] = array(); // Idem, but for the quantity of each article
       $_SESSION['cart']['price'] = array(); // Idem again, for the prices
   } 

   /* 
   Function to add some products to the cart. It will be called in the page "add_cart.php" and take in entry 3 variables which will
   be given by the product we will add 
   */

  function add($product_id, $product_name, $product_quantity, $product_price) {

      array_push($_SESSION['cart']['id'],$product_id); 
      array_push($_SESSION['cart']['name'],$product_name); 
      array_push($_SESSION['cart']['quantity'],$product_quantity); 
      array_push($_SESSION['cart']['price'],$product_price); 
  }

  function remove($id) { // Function to remove an article which will be called in the page "cart.php"
  
      // We will create a temporary substitute cart. Like that, it won't contain the removed articles

      $temporary_cart = array();
      $temporary_cart['id'] = array();
      $temporary_cart['name'] = array();
      $temporary_cart['quantity'] = array();
      $temporary_cart['price'] = array();

      // The temporary cart will be given everything in the cart, except the article we want to remove

      for($i = 0; $i < count($_SESSION['cart']['id']); $i++) {

         if ($_SESSION['cart']['id'][$i] !== $id) {

            array_push($temporary_cart['id'],$_SESSION['cart']['id'][$i]);
            array_push($temporary_cart['name'],$_SESSION['cart']['name'][$i]);
            array_push($temporary_cart['quantity'],$_SESSION['cart']['quantity'][$i]);
            array_push($temporary_cart['price'],$_SESSION['cart']['price'][$i]);
         }
      }

      // The process finished, we replace the cart by the temporary cart, without the deleted article

      $_SESSION['cart'] =  $temporary_cart;

      //At the end, we delete the temporary cart which has became useless

      unset($temporary_cart);
}

  function total() { // Function to count the total of the command's price, which will be called at the page "cart.php"

     $total = 0; // We create the variable we will return at the end and init it to 0

     // For the number of the products in the cart, we will multiply the price by the quantity

     for($t = 0; $t < count($_SESSION['cart']['id']); $t++) {
        $total += $_SESSION['cart']['quantity'][$t] * $_SESSION['cart']['price'][$t];
     }

     return $total; // We return the variable which contains the total of the price
  }

  function removeCart(){  // Function to remove entirely the cart, which will be called in the page "cart.php"
    unset($_SESSION['cart']);
  }

?>