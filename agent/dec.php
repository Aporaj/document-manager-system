<?php
require("../config/config.php");
require("track.func.php");
session_start();
if(isset($_GET['dref'])){
	$dref = preg_replace("/[^0-9]/","",$_GET['dref']);
	
		$update = $con -> prepare("UPDATE files_x SET fstatus = ? WHERE ref = ?");
		if($update -> execute(array(02,$dref))){
			echo "<script>window.alert('Declined Successfully')</script>";
			
			//$fetch_file_details 
							$fetch_fileDL = $con -> prepare("SELECT * FROM files_x WHERE ref = ?");
							$fetch_fileDL -> execute(array($dref));
								$fetch_fileDL -> setFetchMode(PDO::FETCH_ASSOC);
									while($rof = $fetch_fileDL -> fetch()){
										$jx_ref = $rof['ref'];
										$jx_title = $rof['ftitle'];
										$jx_caption = $rof['fcaption'];
										$jx_date = $rof['fdate'];
										$jx_file = $rof['ffile'];
										$jx_filetype = $rof['ffile_type'];
										$jx_filecode = $rof['ffile_code'];
										$jx_from = $rof['ffrom'];
										$jx_to = $rof['fto'];
										$jx_where = $rof['fwhere'];
										$jx_seen = $rof['fseen'];
										$jx_workedon = $rof['fworkedon'];
										$jx_status = $rof['fstatus'];
									}
			nail_it($jx_filecode,$jx_filetype,$jx_from,"none",$_SESSION['client_ref'],02);
			echo "<script>window.open('../agent/?tab=treat_files','_self')</script>";
		}else{
			
			echo "<script>window.alert('Error Occurred')</script>";
			echo "<script>window.open('../agent/?tab=treat_files','_self')</script>";
		}
}
if(isset($_GET['xref'])){
	$xref = preg_replace("/[^0-9]/","",$_GET['xref']);
	
		$update = $con -> prepare("UPDATE files_x SET fstatus = ? WHERE ref = ?");
		if($update -> execute(array(200,$xref))){
			echo "<script>window.alert('Approved Successfully')</script>";
			//$fetch_file_details 
							$fetch_fileDL = $con -> prepare("SELECT * FROM files_x WHERE ref = ?");
							$fetch_fileDL -> execute(array($xref));
								$fetch_fileDL -> setFetchMode(PDO::FETCH_ASSOC);
									while($rof = $fetch_fileDL -> fetch()){
										$jx_ref = $rof['ref'];
										$jx_title = $rof['ftitle'];
										$jx_caption = $rof['fcaption'];
										$jx_date = $rof['fdate'];
										$jx_file = $rof['ffile'];
										$jx_filetype = $rof['ffile_type'];
										$jx_filecode = $rof['ffile_code'];
										$jx_from = $rof['ffrom'];
										$jx_to = $rof['fto'];
										$jx_where = $rof['fwhere'];
										$jx_seen = $rof['fseen'];
										$jx_workedon = $rof['fworkedon'];
										$jx_status = $rof['fstatus'];
									}
			nail_it($jx_filecode,$jx_filetype,$jx_from,"none",$_SESSION['client_ref'],200);
			echo "<script>window.open('../agent/?tab=treat_files','_self')</script>";
		}else{
			echo "<script>window.alert('Error Occurred')</script>";
			echo "<script>window.open('../agent/?tab=treat_files','_self')</script>";
		}
}


?>