<?php  

session_start();

if (isset($_SESSION['id_user'])) {
	header("location:./?p=chat");
}else{
	header("location:./?p=login");
}


?>