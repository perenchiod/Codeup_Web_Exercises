<?php
	require_once 'model.php';

	class user extends model
	{
		protected static $table = 'users';
	}

	echo user::getTableName();


?>