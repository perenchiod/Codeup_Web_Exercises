<?php
	session_start();
	require_once "functions.php";
	require_once "Auth.php";
	$Auth = new Auth();
	 if(inputHas("username") && inputHas("password")) { 
		$userVar = escape(inputGet("username"));
		$passVar = escape(inputGet("password"));
		$_SESSION["username"] = $userVar;
		$_SESSION["password"] = $passVar;
		Auth::attempt($userVar, $passVar);
	} 
	
?>
<html>
<head>
	<title>Login</title>
	<link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
	<script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/login.css">

</head>
<body>
	<h1>Enter your login info here</h1>
	<form method="POST">
		<div class="login">
	        <label>Username</label>
	        <input type="text" name="username"><br>
	        <label>Password</label>
	        <input type="password" name="password"><br>
	        <input type="submit" href="authorized.php">	
	    </div>
        <p>Username: <? if(inputHas("username")) { echo $userVar; } ?>  </p>	
        <p>Password: <? if(inputHas("password")) { echo $passVar; } ?>  </p>	
    </form>
</body>
</html>