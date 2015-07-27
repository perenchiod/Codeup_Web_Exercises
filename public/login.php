<?php
	require_once "functions.php";
	require_once "Auth.php";
	session_start();
	$Auth = new Auth();
	 if(inputHas("username") && inputHas("password")) { 
		$userVar = escape(inputGet("username"));
		$passVar = escape(inputGet("password"));
		Auth::attempt($userVar, $passVar);
		$_SESSION["username"] = $userVar;
		$_SESSION["password"] = $passVar;
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