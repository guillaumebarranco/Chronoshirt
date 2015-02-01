<?php

	require('connect.php');
   
     // We get the id of the line we want to delete
     $id = $_GET["id"];
     // Here is the query in order to delete the user from the database

     $req_delete= $connect->exec("DELETE FROM users WHERE id = ".$id );

     echo '<a href="users_admin.php">Revenir</a>';