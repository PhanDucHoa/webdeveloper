<?php 

function postInput ($string)
{
	return isset($_POST[$string]) ? $_POST[$string] : '';
}

 ?>
