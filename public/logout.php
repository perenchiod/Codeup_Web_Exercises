<?php 
	session_start();
	require_once "Auth.php";
	
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
	    header("Location: http://codeup.dev/login.php");
		exit(); 
	
	$Auth = new Auth();
	if(Auth::check()) {
		Auth::logout();
	} 

?>


<html>
<head>
	<title>Logout</title>
</head>
<body>
</body>
</html>