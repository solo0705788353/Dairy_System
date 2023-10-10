<?php
	session_start();
	 include("update_acc.php");
	if(!isset($_SESSION["username"]))
	{
		header("Location: login.php");
		exit();
	}
?>