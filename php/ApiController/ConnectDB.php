<?php  

/**
* This file is for connection with msql database server
*/
class ConnectDB 
{
	private function connection($server,$dbname,$user,$pass){
		try {
			$conn = new PDO("mysql:host=$server;dbname=$dbname",$user,$pass);
			$conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			return $conn;
		} catch (PDOException $e) {
			echo 'Connection Error ' . $e->getMessage();
		}
	}
	
	public function connectDB($data=array())
	{
		$server = $data['server'];
		$dbname = $data['dbname'];
		$user   = $data['user'];
		$pass   = $data['pass'];
		return $this->connection($server,$dbname,$user,$pass);
	}


}

?>