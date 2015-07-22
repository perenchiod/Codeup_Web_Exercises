<?php
	if(isset($_POST["websearch"])) {
		$websearch = $_POST["websearch"];
	}

?>

<html>
<head>
	<title>Searching</title>
</head>
<body>
	<h1>Search:</h1>
	<form method="POST">
        <input type="text" name="websearch"><br>
        <input type="submit" name="search">
    </form>
    <a href="http://duckduckgo.com/?q=<? isset($websearch) ? echo $websearch : ''; ?>">Search </a>	
</body>
</html>