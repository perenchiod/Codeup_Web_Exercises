<?php
	require_once "Input.php";
	$hits = 0;

	function pageController()
	{
		$data = [];
		if(Input::has($_GET['counter'])){
			$data ['counter'] = 0;
		} else {
			if(Input::get($_GET['result']) == 'hit') {
				$data ['counter'] = $_GET['counter'];
			}
		}
		return $data;
	}

	extract(pageController());

?>

<html>
<head>
	<title>Ping</title>
</head>
<body>
	<h1>Ping, PLAYER 1 <h1>
	<p><? var_dump($_GET); ?></p>
	<h2> Score: <? echo $counter ?> <h2>
	<a href="pong.php?result=hit&counter=<?= $counter+1; ?> ">Hit</a>	
	<a href="http://codeup.dev/you_lose.php">Miss</a>
</body>
</html>