<?php 
	define("DB_HOST",'127.0.0.1');
	define("DB_NAME",'parks_db');
	define("DB_USER",'parks_user');
	define("DB_PASS",'');
	require '../db_connect.php';
	
	$limitVar = 4;
	$parks = $dbc->query('SELECT * FROM national_parks LIMIT ' . $limitVar);
	$count = $dbc->query('SELECT count(*) FROM national_parks');

	if(empty($_GET['page'])) {
		$_GET['page'] = 0;
	} 
	
	if(isset($_GET['page'])) 
	{
		$offsetVar = $limitVar * $_GET['page'];
		$parks = $dbc->query('SELECT * FROM national_parks LIMIT ' . $limitVar . ' OFFSET ' . $offsetVar);
	}

?>

<html>
<head>
	<title>National Parks</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/national_parks.css">
</head>
<body>
	<h1>Page: <?php echo $_GET['page'];  ?>
	<table class="table table-striped">
		<th>Name</th>
		<th>Location</th>
		<th>Date Established</th>
		<th>Area (acres)</th>
		<?php foreach ($parks as $park) { ?>
			<tr>
				<td><?= $park['name']; ?></td>
				<td><?= $park['location']; ?></td>
				<td><?= $park['date_established']; ?></td>
				<td><?= number_format($park['area_in_acres']); ?></td>
			</tr>
		<?php } ?>
		</tr>
	</table>
	<?php if(($_GET['page']+1)  <= ($count->fetchColumn() / $limitVar)) { ?>
		<a id= 'next' href='http://codeup.dev/national_parks.php?page=<?php if(isset($_GET['page'])){ echo $_GET['page']+1; } ?>'>Next</a>
	<?php } ?>
	<?php if($_GET['page'] >= 1) { ?>
		<a id='back' href='http://codeup.dev/national_parks.php?page=<?php if(isset($_GET['page'])){ echo $_GET['page']-1; } ?>'>Back</a>
	<?php } ?>

</body>
</html>