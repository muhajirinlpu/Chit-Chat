<?php  

require_once '../ApiController/Api.php';

/**
* Userclass
*/
class User extends Api
{
	
	public function userLogin($uname,$pass){
		$stmt = $this->select('where','id_user','username','status','picture','userdata','username = ? AND password = ?',array($uname,$pass));
		if ($stmt->rowCount()==1) return true ;
	}
}

?>