<?php  

require_once '../Classes/Chat.class.php';

session_start();

$id_user = $_SESSION['id_user'];
$cmd = $_GET['do'];
$chat = new Chat();

switch ($cmd) {
	case 'readMessage':
		$chat->read($id_user,$_POST['current']);
		break;

	case 'countChat':
		$chat->count();
		break;
	
	case 'sendMessage':
		$chat->send($id_user,$_POST['isi']);
		break;
	default:
		
		break;
}

?>