<?php

	$server = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'bookwedit';

	try {
		$conn = new PDO("mysql:host=$server;dbname=$database;",$username, $password);
	} catch (PDOException $e) {
		die('Error al conectar '.$e->getMessage());
	}

?>