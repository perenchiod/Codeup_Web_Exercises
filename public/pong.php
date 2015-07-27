<?php
	require_once "Input.php";
	function pageController()
	{
		$data = [];

		if(Input::has($_GET['counter'])){
			$data ['counter'] = 0;
		} else {
			if(Input::get($_GET['result']) == 'hit'){
				$data ['counter'] = $_GET['counter'];
			}
		}
		return $data;
	}
	extract(pageController());

?>

<html>
<head>
	<title>Pong</title>
</head>
<body>
	<h1>Pong, PLAYER 2 <h1>
	<h2>Score: <? echo $counter ?> <h2>
	<a href="ping.php?result=hit&counter=<?= $counter+1; ?> ">Hit</a>
	<a href="http://codeup.dev/you_lose.php">Miss</a>
</body>
</html>