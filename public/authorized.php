<?php 
	session_start();
	$session_Id = session_id();
	if($_SESSION["username"] != 'nightness' && $_SESSION["password"] != 'alrightalright'){
		header('Location: http://codeup.dev/login.php');
		exit(); 
	}

?>

<html>
<head>
	<title>YOU GOT AUTHORIZED!</title>
</head>
<body>
	<h1>Authorized <? echo $_SESSION["username"]; ?></h1>
	Session Id: <?php echo $session_Id; ?>
	<a href="http://codeup.dev/logout.php">Logout</a>
</body>
</html>