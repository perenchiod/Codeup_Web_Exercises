<?php
	function serverName () 
	{
		$nouns = ["Ants" , "Dirt" , "Baby" , "Mountain" , "Water" , "Bread" , "Stew" , "Umbrella" , "Zephyr"];
		$adjectives = ["Hot" , "Icy" , "Brief" , "Square", "Fire" , "Tired" , "Tender" , "Dusty" , "Delightful"];
		$display = $adjectives[rand(0, 8)] . $nouns[rand(0,8)];
		return $display;
	}
	function pageController () {
		$data = [];
		$data["Name"] = serverName();
		return $data;
	}

	extract(pageController());

?>

<html>
	<link rel="stylesheet" type="text/css" href="/css/generator.css">
<head>
	<title>Server name</title>
</head>
<body>
	<h1>SERVER NAME </h1>
	<ol>
		<li><? echo $Name ?></li>
	</ol>

</body>
</html>