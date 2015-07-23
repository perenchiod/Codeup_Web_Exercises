<?php
	require "functions.php";
	session_start();
	 if(inputHas("username") && inputHas("password")) { 
		$userVar = escape(inputGet("username"));
		$passVar = escape(inputGet("password"));
		$_SESSION["username"] = $userVar;
		$_SESSION["password"] = $passVar;
		
		if($userVar == "night" && $passVar == "pass"){ 
			header("Location: http://codeup.dev/authorized.php");
			exit();      
		} else {
			$message = "Incorrect username or password";
			echo "<script type='text/javascript'> alert('$message'); </script>";
		}
	} 
	
?>
<script src="js/bootstrap.min.js"></script>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<form method="POST">
        <label>Username</label>
        <input type="text" name="username"><br>
        <label>Password</label>
        <input type="password" name="password"><br>
        <input type="submit" href="authorized.php">	
        <p>Username: <? if(inputHas("username")) { echo $userVar; } ?>  </p>	
        <p>Password: <? if(inputHas("password")) { echo $passVar; } ?>  </p>	
    </form>
</body>
</html>