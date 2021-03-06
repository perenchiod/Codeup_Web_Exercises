<?php 
	require_once 'include/db_include_info.php';
	require_once '../db_connect.php';
	require_once 'functions.php';
	require_once 'Input.php';
	require_once 'include/park.php';

	
	$limitVar = 4;

	$errors = [];
	$parks = park::all();
	$count = $dbc->query('SELECT count(*) FROM national_parks');
	$coulumnCount = $count->fetchColumn();

	//Is page GET page empty? If so page number = 0
	if(empty($_GET['page'])) {
		$_GET['page'] = 0;
	} 
	
	//Seeing if GET page has a value and does calculation based of page
	if(isset($_GET['page'])) 
	{
		if(isset($_GET['limit'])) {
			$limitVar = $_GET['limit'];
		}

		$offsetVar = $limitVar * $_GET['page'];
		$parks = $dbc->query('SELECT * FROM national_parks LIMIT ' . $limitVar . ' OFFSET ' . $offsetVar);
	}
	
	$stmt = $dbc->prepare('INSERT INTO national_parks (name,location,date_established,area_in_acres, description) VALUES (
		:name, 
		:location, 
		:date_established, 
		:area_in_acres, 
		:description
	)');

	if(inputHas('name') && inputHas('location') && inputHas('date_established') && inputHas('area_in_acres')) {
		$nameVar = escape(inputGet('name'));
		$locationVar = escape(inputGet('location'));
		$establishedVar = escape(inputGet('date_established'));
		$acresVar = escape(inputGet('area_in_acres'));
		$stmt->bindValue(':name' , $nameVar , PDO::PARAM_STR);
		$stmt->bindValue(':location' , $locationVar , PDO::PARAM_STR);
		$stmt->bindValue(':date_established' , $establishedVar , PDO::PARAM_STR);
		$stmt->bindValue(':area_in_acres' , $acresVar , PDO::PARAM_INT);

		//Conditional checking if a description was entered
		if(inputHas('description')) {
			$descriptionVar = escape(inputGet('description'));
			$stmt->bindValue(':description' , $_POST['description'] , PDO::PARAM_STR);
		} else {
			$stmt->bindValue(':description' , 'none' , PDO::PARAM_STR);
		}

		$park = new park();
		try {
			$park->name = Input::has('name') ? Input::getString('name',80) : null;
		} catch(InvalidArgumentException $e) {
			 array_push( $errors, $e->getMessage());
		} catch(LengthException $e) {
			 array_push( $errors, $e->getMessage());			
		}

		try {
			$park->location = Input::has('location') ? Input::getString('location',130) : null;
		} catch(Exception $e) {
			 array_push( $errors, $e->getMessage());
		} catch(InvalidArgumentException $e) {
			 array_push( $errors, $e->getMessage());
		} catch(LengthException $e) {
			 array_push( $errors, $e->getMessage());
		}
		try {
			$park->date_established = Input::has('date_established') ? Input::getString('date_established',15) : null;
		} catch(Exception $e) {
			 array_push( $errors, $e->getMessage());
		} catch(InvalidArgumentException $e) {
			 array_push( $errors, $e->getMessage());
		} catch(LengthException $e) {
			 array_push( $errors, $e->getMessage());
		}
		try {
			$park->area_in_acres = Input::has('area_in_acres') ? Input::getNumber('area_in_acres',13) : null;
		} catch(InvalidArgumentException $e) {
			 array_push( $errors, $e->getMessage());
		} catch(RangeException $e) {
			 array_push( $errors, $e->getMessage());
		}
				
		//Execute the stmt, this will give me a new entry in database
		$stmt->execute();
	}
?>
<html>
<head>
	<title>National Parks</title>
	<!-- Latest compiled and minified CSS -->
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
	<link rel='stylesheet' type='text/css' href='/css/national_parks.css'>
	<link href='http://fonts.googleapis.com/css?family=Work+Sans' rel='stylesheet' type='text/css'>
</head>
<body>
	<h1>National Parks! </h1>
	<h2><?php if(!empty($errors)) { var_dump($errors); }   ?>
	<table class='table table-striped'>
		<th>Name</th>
		<th>Location</th>
		<th>Date Established (year/month/day)</th>
		<th>Area (acres)</th>
		<th>Description</th>
		<?php foreach ($parks as $park) { ?>
			<tr>
				<td><?= $park['name']; ?></td>
				<td><?= $park['location']; ?></td>
				<td><?= $park['date_established']; ?></td>
				<td><?= number_format($park['area_in_acres']); ?></td>
				<td><?= $park['description'] ?></td>
			</tr>
		<?php } ?>
		</tr>
	</table>
	
	<?php if(($_GET['page']+1)  < ($coulumnCount / $limitVar)) { ?>
		<a id= 'next' href='http://codeup.dev/national_parks.php?page=<?php if(isset($_GET['page'])){ echo $_GET['page']+1; }?>&<? if(isset($_GET['limit'])) { echo "limit=" . $_GET['limit']; } ?>'>Next</a>
	<?php } ?>
	<?php if($_GET['page'] >= 1) { ?>
		<a id='back' href='http://codeup.dev/national_parks.php?page=<?php if(isset($_GET['page'])){ echo $_GET['page']-1; } ?>&<? if(isset($_GET['limit'])) { echo "limit=" . $_GET['limit']; } ?>'>Back</a>
	<?php } ?>
	
	<form method='POST'>
		<div id= "inputBox">
			<div id="inputField">
				<h4>Park name</h4>
				<input type='text' class='input' name='name' placeholder='Name'>
			</div>
			<div id="inputField">
				<h4>Location of park</h4>
				<input type='text' class='input' name='location' placeholder='Location'>
			</div>
			<div id="inputField">
				<h4>Date park was founded, Year/Mounth/Day</h4>
				<input type='text' class='input' name='date_established' placeholder='Date'>
			</div>
			<div id="inputField">
				<h4>Acres of park</h4>
				<input type='text' class='input' name='area_in_acres' placeholder='Acres'>
			</div>
			<h3>Description of park</h3>
			<textarea class='form-control' rows='7'  name='description' placeholder='Description'></textarea> <br>
			<input type='submit'>
		</div>
	</form>

	<span id="parksDisplayed">Change the number of parks displayed! (Currect parks is: <strong> <? echo $coulumnCount ?> </strong> )</span>
	
	<form method='GET'>
		<input type='text' name='limit' value = '4' id='offsetBox'>
		<input type='submit' name='submitOffset'>
	</form>

	<p><? if(inputHas('name')) { echo $_POST['name']; } ?>  </p>	
	<p><? if(inputHas('location')) { echo $_POST['location']; } ?>  </p>	
</body>
</html>