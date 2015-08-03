<?php 
	define("DB_HOST",'127.0.0.1');
	define("DB_NAME",'parks_db');
	define("DB_USER",'parks_user');
	define("DB_PASS",'');
	require '../db_connect.php';
	
	$parks = $dbc->query('SELECT * FROM national_parks LIMIT 4');

	if(empty($_GET['page'])) {
		$_GET['page'] = 1;
	} 
	
	if(isset($_GET['direction'])) 
	{
		if($_GET['direction'] == 'inc') {
			$inc = $_GET['page'] + 1;
			$_GET['page'] = $inc;
			$offsetInc = 4 * ($inc - 1);
			$parks = $dbc->query('SELECT * FROM national_parks LIMIT 4 OFFSET ' . $offsetInc);
		} else if ($_GET['direction'] == 'dec') {
			$dec = $_GET['page'] - 1;
			$_GET['page'] = $dec;
			$offsetDec = 4 * $dec;
			$parks = $dbc->query('SELECT * FROM national_parks LIMIT 4 OFFSET ' . $offsetDec);
		}
	}

?>

<html>
<head>
	<title>National Parks</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>

	<table class="table table-striped">
		<th>Name</th>
		<th>Location</th>
		<th>Date Established</th>
		<th>Area (acres)</th>
		<?php foreach ($parks as $key => $park) { ?>
			<tr>
				<td><?php echo $park['name']; ?></td>
				<td><?php echo $park['location']; ?></td>
				<td><?php echo $park['date_established']; ?></td>
				<td><?php echo $park['area_in_acres']; ?></td>
			</tr>
		<?php } ?>
		</tr>
	</table>

	<a href='http://codeup.dev/national_parks.php?page=<?php if(isset($_GET['page'])){ echo $_GET['page']; } ?>&direction=inc'>Next</a>
	<a href='http://codeup.dev/national_parks.php?page=<?php if(isset($_GET['page'])){ echo $_GET['page']; } ?>&direction=dec'>Back</a>

</body>
</html>