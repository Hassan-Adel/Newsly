<?php
	session_start();
	unset($_SESSION['id']);
	unset($_SESSION['username']);
	unset($_SESSION['privilege_add']);
	unset($_SESSION['privilege_edit']);
	unset($_SESSION['privilege_delete']);
	header("Location:login.php");

?>