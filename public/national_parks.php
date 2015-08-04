<?php 
	define("DB_HOST",'127.0.0.1');
	define("DB_NAME",'parks_db');
	define("DB_USER",'parks_user');
	define("DB_PASS",'');
	require '../db_connect.php';
	require 'functions.php';

	
	$limitVar = 4;
	$parks = $dbc->query('SELECT * FROM national_parks LIMIT ' . $limitVar);
	$count = $dbc->query('SELECT count(*) FROM national_parks');

	//Is page GET page empty? If so page number = 0
	if(empty($_GET['page'])) {
		$_GET['page'] = 0;
	} 
	
	//Seeing if GET page has a value and does calculation based of page
	if(isset($_GET['page'])) 
	{
		$offsetVar = $limitVar * $_GET['page'];
		$parks = $dbc->query('SELECT * FROM national_parks LIMIT ' . $limitVar . ' OFFSET ' . $offsetVar);
	}

	//Perpared stmt variable used for inserting data into database
	$stmt = $dbc->prepare("INSERT INTO national_parks (name,location,date_established,area_in_acres, description) VALUES (
		:name, 
		:location, 
		:date_established, 
		:area_in_acres, 
		:description
	)");
	
	if(inputHas("name") && inputHas("location") && inputHas("date_established") && inputHas("area_in_acres")) {
		$nameVar = escape(inputGet("name"));
		$locationVar = escape(inputGet('location'));
		$establishedVar = escape(inputGet('date_established'));
		$acresVar = escape(inputGet('area_in_acres'));
		
		$stmt->bindValue(':name' , $nameVar , PDO::PARAM_STR);
		$stmt->bindValue(':location' , $locationVar , PDO::PARAM_STR);
		$stmt->bindValue(':date_established' , $establishedVar , PDO::PARAM_STR);
		$stmt->bindValue(':area_in_acres' , $acresVar , PDO::PARAM_INT);
		
		//Conditional checking if a description was entered
		if(inputHas($_POST['description'])) {
			$descriptionVar = escape(inputGet('description'));
			$stmt->bindValue(':description' , $_POST['description'] , PDO::PARAM_STR);
		} else {
			$stmt->bindValue(':description' , 'none' , PDO::PARAM_STR);
		}
		//Execute the stmt, this will give me a new entry in database
		$stmt->execute();
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
	<h1>National Parks! </h1>
	<table class="table table-striped">
		<th>Name</th>
		<th>Location</th>
		<th>Date Established (year/month/day)</th>
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
	<form method="POST">
		<h3>Park name</h3>
		<input type="text" class="input" name="name" placeholder="Park name"> <br>
		<h3>Location of park</h3>
		<input type="text" class="input" name="location" placeholder="Location of park"> <br>
		<h3>Date park was founded, Year/Mounth/Day</h3>
		<input type="text" class="input" name="date_established" placeholder="Date park establishment"> <br>
		<h3>Acres of park</h3>
		<input type="text" class="input" name="area_in_acres" placeholder="Area of park in acres"> <br>
		<input type="textarea" class="input" name="description" placeholder="Description"> <br>
		<input type="submit">
	</form>

	<p><? if(inputHas("name")) { echo $_POST['name']; } ?>  </p>	
	<p><? if(inputHas("location")) { echo $_POST['location']; } ?>  </p>	
</body>
</html>