<?php  

require_once 'php/ApiController/Api.php';
session_start();
/**
* Userclass
*/
class User extends Api
{
	
	public function DoLogin($uname,$pass){
		$stmt = $this->select('where','id_user,username,picture','userdata','username = ? AND password = ?',array($uname,$pass));
		$data = $this->fetch($stmt);
		if ($stmt->rowCount()==1) {
			$_SESSION['id_user'] = $data['id_user'];
			return true;
		}
	}
}

?>