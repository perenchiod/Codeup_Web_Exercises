<?php

$DB_HOST = '127.0.0.1';
$DB_NAME = 'employees';
$DB_USER = 'codeup';
$DB_PASS = 'tibbers';


// Get new instance of PDO object
$dbc = new PDO('mysql:host=$DB_HOST;dbname=$DB_NAME', $DB_USER, $DB_PASS);

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
