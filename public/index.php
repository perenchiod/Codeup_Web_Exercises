<?php
	session_start();
	if(isset($_POST["game_name"]) && isset($_POST["rating"]) && isset($_POST["ign_rating"])) {
		$_SESSION["game_name"] = ucfirst($_POST["game_name"]);
		$_SESSION["rating"] = strtoupper($_POST["rating"]);
		$_SESSION["ign_rating"] = $_POST["ign_rating"];
	}

	function endSession()
	{
	    // Unset all of the session variables.
	    $_SESSION = array();

	    // If it's desired to kill the session, also delete the session cookie.
	    // Note: This will destroy the session, and not just the session data!
	    if (ini_get("session.use_cookies")) {
	        $params = session_get_cookie_params();
	        setcookie(session_name(), '', time() - 42000,
	            $params["path"], $params["domain"],
	            $params["secure"], $params["httponly"]
	        );
	    }

	    // Finally, destroy the session.
	    session_destroy();
	    header("Location: http://codeup.dev/index.php");
		exit(); 
	}

?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<html>
<head>
	<title>Videogame list</title>
</head>
<body>
	<h1>Video games</h1>

	<form method="POST">
		<label>Game name:</label>
        <input type="text" name="game_name"><br>
        <label>Rating: </label>
        <input type="text" name="rating"><br>
        <label>IGN game rating:</label>
        <input type="text" name="ign_rating"><br>
        <input type="submit">	
	</form>
	<table class="table table-striped">
		<tr>
 			<th>Game Name</th>
 		</tr>
	</table>
		
	<a><? if (isset($_SESSION["game_name"])) { echo $_SESSION["game_name"]; } ?></a>
		
</body>
</html>