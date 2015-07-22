<?php
	
	 if(isset($_POST['username']) && isset($_POST['password'])) { 
		if($_POST['username'] == 'nightness' && $_POST['password'] == 'alrightalright'){ 
			header('Location: http://codeup.dev/authorized.php');      
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
    </form>
</body>
</html>