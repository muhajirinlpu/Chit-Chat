<?php  

require_once '../Classes/Chat.class.php';

session_start();

$cmd = $_GET['do'];
$chat = new Chat();

switch ($cmd) {
	case 'readMessage':
		$chat->read($_SESSION['id_user'],$_POST['current']);
		break;

	case 'countChat':
		$chat->count();
		break;
	
	case 'sendMessage':
		$chat->send($_SESSION['id_user'],$_POST['isi']);
		break;

	default:
		
		break;
}

?>