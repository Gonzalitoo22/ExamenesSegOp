<?php 
	session_start();
	unset($_SESSION['activa']);
	unset($_SESSION['usuario']);
	session_destroy();
	header("Location:../../vista/login.html");
?>