<?php	
	define("DB_HOST",'127.0.0.1');
	define("DB_NAME",'parks_db');
	define("DB_USER",'parks_user');
	define("DB_PASS",'');
	require 'db_connect.php';
	
	$query = 'USE parks_db;
		
	CREATE TABLE IF NOT EXISTS national_parks (
		id INT UNSIGNED AUTO_INCREMENT NOT NULL,
		name VARCHAR(150) NOT NULL,
		location VARCHAR(200) NOT NULL,
		date_established VARCHAR(50) NOT NULL,
		area_in_acres INT NOT NULL,
		PRIMARY KEY (id)
	)';
	
	$dbc-> exec($query);

?>
