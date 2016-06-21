<?php  

require_once 'php/Classes/User.class.php';

$user = new User();
switch ($_GET['do']) {
	case 'login':
		$username = $_POST['username'];
		$password = $_POST['password'];
		$submit   = $_POST['submit'];

		if (isset($submit)) {
			$login = $user->DoLogin($username,$password);
			if ($login) {
				header("location:./?p=chat");
			}else{
				header("location:./?p=login&m=wrong");
			}
		}
		break;
	
	default:
		
		break;
}



?>