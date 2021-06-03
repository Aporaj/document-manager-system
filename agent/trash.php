<?php
require("../config/config.php");
	if(isset($_GET['ref'])){
		$ref = preg_replace('/[^0-9]/',"",$_GET['ref']);
		$remove = $con -> prepare("DELETE FROM xgenta WHERE ref = ?");
		if($remove -> execute(array($ref))){
			echo "<script>window.alert('Removed Successfully!!')</script>";
			echo "<script>window.open('../admin/?tab=manage_agent','_self')</script>";
		}else{
			echo "<script>window.alert('Runtime Error Occurred')</script>";
			echo "<script>window.open('../admin/?tab=manage_agent','_self')</script>";
		}
	}
	
?>
