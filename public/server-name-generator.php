<?php
	$nouns = ["Ants" , "Dirt" , "Baby" , "Mountain" , "Water" , "Bread" , "Stew" , "Umbrella" , "Zephyr"];
	$adjectives = ["Hot" , "Icy" , "Brief" , "Square", "Fire" , "Tired" , "Tender" , "Dusty" , "Delightful"];
?>


<html>
	<link rel="stylesheet" type="text/css" href="/css/generator.css">
<head>
	<title>Server name</title>
</head>
<body>
	<h1>SERVER NAME </h1>
	<ol>
		<li><?php echo $adjectives[rand(0, 8)] . $nouns[rand(0,8)] ?></li>
	</ol>

</body>
</html>