<?php
	try{
		$con = new PDO("mysql:dbhost=localhost; dbname=e-office-tracker", "root", "");
	}catch(PDOException $e){
		$e -> getMessage();
	}

?>