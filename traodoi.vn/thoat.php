<?php 
	session_start();
	unset($_SESSION['name_user']);	
	unset($_SESSION['name_id']);
	unset($_SESSION['admin_name']);	
	unset($_SESSION['admin_id']);		
	header("location: index.php")
 ?>