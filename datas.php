<?php

require('connect.php');

$login = array();
$password = array();

$answer_users = $connect->query("SELECT * FROM users");

			while ($datas_users = $answer_users->fetch()) {

				$login[] =  $datas_users['login'];
				$password[] =  $datas_users['password'];
		}

		$answer_users->closeCursor();