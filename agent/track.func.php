<?php
	$date = $time = "";
	function nail_it($code,$type,$by,$to,$worked_by ="none",$status){
require("../config/config.php");
		
		$date = date("M d,Y"); $time = date("h:i:s a");
			$create_tracker = $con -> prepare("INSERT INTO tracker_o(file_code,file_type,file_by,file_to,worked_by,worked_date,worked_time,worked_status) VALUES(?,?,?,?,?,?,?,?)");
			if($create_tracker -> execute(array($code,$type,$by,$to,$worked_by,$date,$time,$status))){
				///##### Created...
			}else{
				echo "<script>alert('Tracking Error...')</script>";
			}
		
	}



?>