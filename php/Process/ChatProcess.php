<?php  

require_once '../Classes/Chat.class.php';

session_start();

$cmd = $_GET['do'];
$chat = new Chat();

switch ($cmd) {
	case 'readMessage':
		$chat->read($_POST['current']);
		break;

	case 'countChat':
		$chat->count();
		break;
	
	case 'sendMessage':
		$chat->send($_SESSION['id_user'],$_POST['isi']);
		break;

	case 'countOnline':
		$chat->countOn($_SESSION['id_user']);
		break;

	case 'showOn':
		$chat->whoOn();
		break;

	default:
		
		break;
}

?>