<?php 
	require_once "functions.php";
	require_once "Auth.php";
	session_start();
	$Auth = new Auth();
	if(Auth::check()) {
		Auth::logout();
	} 
	$session_Id = session_id();
	

?>

<html>
<head>
	<title>YOU GOT AUTHORIZED!</title>
</head>
<body>
	<h1>Authorized <? echo $Auth::user(); ?></h1>
	Session Id: <? echo $session_Id; ?>
	<a href="http://codeup.dev/logout.php">Logout</a>
</body>
</html>