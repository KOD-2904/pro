<?php
	$filepath = realpath(dirname(__FILE__));
	include ($filepath.'/../lib/session.php');
	Session::checkLogin(); // gọi hàm check login để ktra session
	include_once($filepath.'/../lib/database.php');
	include_once($filepath.'/../helpers/format.php');
?>



<?php 
	/**
	* 
	*/
	class adminlogin
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function login_admin($adminUser,$adminPass){
			$adminUser = $this->fm->validation($adminUser); //gọi ham validation từ file Format để ktra
			$adminPass = $this->fm->validation($adminPass);

			$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
			$adminPass = mysqli_real_escape_string($this->db->link, $adminPass); //mysqli gọi 2 biến. (adminUser and link) biến link -> gọi conect db từ file db
			
			if(empty($adminUser) || empty($adminPass)){
				$alert = "CAN'T EMPTY";
				return $alert;
			}else{
				$query = "SELECT * FROM user WHERE username = '$adminUser' AND password = '$adminPass' LIMIT 1 ";
				$result = $this->db->select($query);

				if($result != false){
					$value = $result->fetch_assoc();
					Session::set('adminlogin', true);
		
					Session::set('id', $value['id']);
					Session::set('username', $value['username']);
					Session::set('password', $value['password']);
					header("Location:index.php");
				}else {
					$alert = "User and Pass not match";
					return $alert;
				}
			}


		}
		
	}
 ?>