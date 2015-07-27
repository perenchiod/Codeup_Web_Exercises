<?php 
	class Auth 
	{
		public static $setPassword = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';

		public static function attempt($username, $password) 
		{
			if($username == "guest" && password_verify($password , self::$setPassword)){ 
				header("Location: http://codeup.dev/authorized.php");
				exit();      
			} else {
				$message = "Incorrect username or password";
				echo "<script type='text/javascript'> alert('$message'); </script>";
			}
		}

		public static function check() 
		{
			if(password_verify($_SESSION["password"] , self::$setPassword)){			
				return true;
			} else {
				return false;
			}
		}
		
		public static function user() 
		{
			return $_SESSION["username"];
		}

		public static function logout()
		{
			header("Location: http://codeup.dev/login.php");
			exit();
		}



	}




?>