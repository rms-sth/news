<?php

class User {
	public $id, $name, $username, $email, $password, $status, $gender, $address, $phone;

	public function login()
	{
		$this->password = md5($this->password);
		$sql = "SELECT * FROM tbl_user WHERE email = '$this->email' and password='$this->password' ";
		$conn = new mysqli('localhost','root','','db_newsportal');
		
		if($conn->connect_errno != 0){
			die("Database Connection error!!");
		}
		$res = $conn->query($sql);
		
		if($res->num_rows == 1 ){
			$data = $res->fetch_assoc();
			//print_r($data);	
			session_start();
			$_SESSION['email'] = $this->email;
			$_SESSION['name'] = $data['name'];
			$_SESSION['username'] = $data['username'];

			$_SESSION['message_login'] = 'Welcome, ' .$data['name']. '!! You are successfully logged in!!';
			header('location:dashboard.php');
		}else{
			return false;
		}
	}
}


?>