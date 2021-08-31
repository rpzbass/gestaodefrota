<?php
	session_start();

	if(!isset($_SESSION['ID_usuario'])){

		header('Location: '.INCLUDE_PATH.'login');
		exit();
	}





?>


<br><br><h1>SEJA BEM VINDO <?php  echo $_SESSION['nome']; ?></h1>

