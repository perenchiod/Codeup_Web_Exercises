<?php
	session_start();
	 if(isset($_POST['username']) && isset($_POST['password'])) { 
		
		$_POST['username'] = strtolower($_POST['username']);
		$_SESSION["username"] = ($_POST['username']);
		$_SESSION["password"] = $_POST['password'];
		
		if($_POST['username'] == 'nightness' && $_POST['password'] == 'alrightalright'){ 
			header('Location: http://codeup.dev/authorized.php');
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
        <p>Username: <? if(isset($_POST['username'])) { echo htmlspecialchars(strip_tags($_POST['username'])); } ?>  </p>	
        <p>Password: <? if(isset($_POST['password'])) { echo htmlspecialchars(strip_tags($_POST['password'])); } ?>  </p>	
    </form>
</body>
</html>