<?php
if(isset($_POST['deco'])) {
	 unset($_SESSION['pseudo_admin']);
	header ('Location: ../index.php');
}