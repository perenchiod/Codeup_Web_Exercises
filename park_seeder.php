<?php
	define("DB_HOST",'127.0.0.1');
	define("DB_NAME",'parks_db');
	define("DB_USER",'parks_user');
	define("DB_PASS",'');
	require 'db_connect.php';
	
	$national_parks = [
		['name' => 'Big Bend', 'location' => 'Texas', 'date_established' => 'June 12, 1944', 'area_in_acres' => '801163'],
		['name' => 'Biscayne', 'location' => 'Flordia', 'date_established' => 'June 28, 1980', 'area_in_acres' => '172924'],
		['name' => 'Bryce Canyon', 'location' => 'Utah', 'date_established' => 'Febuary 25, 1928', 'area_in_acres' => '35835'],
		['name' => 'Death Valley', 'location' => 'Nevada', 'date_established' => 'October 31, 1994', 'area_in_acres' => '3372401'],
		['name' => 'Denali', 'location' => 'Alaska', 'date_established' => 'Febuary 26, 1917', 'area_in_acres' => '4740911'],
		['name' => 'Glacier', 'location' => 'Montana', 'date_established' => 'May 11, 1910', 'area_in_acres' => '1013572'],
		['name' => 'Glacier Bay', 'location' => 'Alaska', 'date_established' => 'December 2, 1980', 'area_in_acres' => '3224840'],
		['name' => 'Grand Canyon', 'location' => 'Arizona', 'date_established' => 'Febuary 26, 1919', 'area_in_acres' => '1217403'],
		['name' => 'Great Basin', 'location' => 'Nevada', 'date_established' => 'October 27, 1986', 'area_in_acres' => '77180'],
		['name' => 'Hot Springs', 'location' => 'Arkansas', 'date_established' => 'March 4, 1921', 'area_in_acres' => '5549']
	];
	
	$deleteQuery = 'TRUNCATE national_parks';
	$dbc->exec($deleteQuery);

	foreach ($national_parks as $park) {
		$query = "INSERT INTO national_parks (name,location,date_established,area_in_acres) VALUES ('{$park['name']}','{$park['location']}','{$park['date_established']}','{$park['area_in_acres']}')";
		$dbc->exec($query);
		echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
	}



?>