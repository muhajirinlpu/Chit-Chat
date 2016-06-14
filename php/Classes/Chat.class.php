<?php  

require_once '../ApiController/Api.php';

/**
* 
*/
class Chat extends Api
{
	public function read($id_user,$lastId){
		$stmt = $this->select('where','A.*,B.username,B.picture','`logchat` AS A , `userdata` AS B','A.author = B.id_user AND id_logchat > ? ORDER BY id_logchat ASC',array($lastId));
		$data = $this->fetchAll($stmt);
		if (isset($data)) return $this->response(200,$data);
		$this->setOn($id_user);
	}

	public function count(){
		$stmt = $this->select('all','id_logchat','logchat ORDER BY id_logchat DESC LIMIT 1');
		$data = $this->fetch($stmt);
		return $this->response(200,$data);
	}

	public function send($id_user,$text){
		$stmt = $this->insert('logchat',array('author','text'),array($id_user,$text));
		if ($stmt) return $this->response(200,'success');
	}

	public function whoOn(){
		$stmt = $this->select('where','username','userdata','status = ?',array(1));
		$data = $this->fetchAll($stmt);
		if (isset($data)) return $this->response(200,$data);
	}

	public function setOn($id_user){
		$stmt = $this->update('where','userdata',array('status'),array(1,$id_user),"id_user = ?");
		$data = $this->fetchAll($stmt);
		if (isset($data)) return $this->response(200,$data);
	}


}

?>