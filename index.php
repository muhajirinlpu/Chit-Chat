<!DOCTYPE html>
<html>
<head>
	<title>Chat Box</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script type="text/javascript" src="assets/js/jquery-1.11.3.min.js"></script>
</head>
<body>

<?php  

	if (isset($_GET['p'])) {
		switch ($_GET['p']) {
			case 'login':
				require_once 'view/login.php';
				break;
			
			case 'chat':
				require_once 'view/chat.php';
				echo '<script type="text/javascript" src="assets/js/script.js"></script>';
				break;

			case 'user':
				require_once 'php/Process/UserProcess.php';
				break;

			case 'process':
				require_once 'php/Process/ChatProcess.php';
				break;

			default:
				header("location:handler.php");
				break;
		}
	}else{
		header("location:handler.php");
	}

?>
	
</body>
</html>