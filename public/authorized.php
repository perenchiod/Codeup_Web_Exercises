<?php 
	require_once "functions.php";
	require_once "Auth.php";
	session_start();
	$Auth = new Auth();
	if(!Auth::check()) {
		echo "<script type='text/javascript'> alert('logging out'); </script>";
		Auth::logout();
	} 
	$session_Id = session_id();
	

?>

<html>
<head>
	<script src="js/bootstrap.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/login.css">

	<title>YOU GOT AUTHORIZED!</title>
</head>
<body>
	<h1>Authorized <? echo Auth::user(); ?></h1>
	Session Id: <? echo $session_Id; ?>
	<a href="http://codeup.dev/logout.php">Logout</a>
</body>
</html>