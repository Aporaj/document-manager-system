<?php
session_start();
require("config/config.php");
if(isset($_POST['admin_login'])){
$cryout = "";
	$uname = trim(htmlspecialchars($_POST['uname']));
	$upass = trim(htmlspecialchars($_POST['upass']));
		if($uname == "admin" && $upass == "admin"){
			$_SESSION['admin_08133370716'] = "DevAdeoti";
			header("Location: admin/");
			exit();
		}else{
			$cryout = "<span style='color:red;'>Invalid Login Details</span>";
		}
}
if(isset($_POST['client_login'])){
$cryout = "";
	$uname = trim(htmlspecialchars($_POST['uname']));
	$upass = trim(htmlspecialchars($_POST['upass']));
		$fetch_match = $con -> prepare("SELECT * FROM xgenta WHERE fname = ? AND access_code = ?");
		if($fetch_match -> execute(array($uname,$upass))){
			if($fetch_match -> rowCount() > 0 ){
				$fetch_match -> setFetchMode(PDO::FETCH_ASSOC);
				while($rew = $fetch_match -> fetch()){
					$_SESSION['client_08133370716'] = "DevAdeotiB";
					$_SESSION['client_ref'] = $rew['ref'];
					$_SESSION['client_fname'] = $rew['fname'];
					$_SESSION['client_lname'] = $rew['lname'];
					$_SESSION['client_passport'] = $rew['passport'];
					$_SESSION['client_dated'] = $rew['dated'];
					$_SESSION['dpt_090'] = $rew['dpt'];
					$_SESSION['rank_090'] = $rew['rank'];
					$_SESSION['role_090'] = $rew['role'];
						header("Location: agent/");
						exit();
				}
			}else{
			$cryout = "<span style='color:red;'>Invlaid Login Details</span>";
			}
		}else{
			$cryout = "<span style='color:red;'>Runtime Error Occurred At Matching</span>";
			
		}
}
?>
<!DOCTYPE html>
	<html>
		<head>
			<title>The E-Office Mgt. &amp; Tracking System</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="boot/css/bootstrap.min.css" media="all"/>
			<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css"/>
			<link rel="icon"  type="image/png" href="images/logo_of.png"/>
			<style>
			
			</style>
		
<body>
	
	<div class="container">
	<div class="row">
		<div class="col-sm-3 col-md-3"></div>
		<div class="col-sm-5 col-md-5 bg-dark" style="margin-top:80px; padding-top:8px; padding-bottom:18px;">
		<?php
									if(isset($cryout) && $cryout !=""	){
										echo "<div style='background:#fff; padding:8px;'>".$cryout.". <label for='uname'>Try again</label></div>";
									}
								?>
			<br/>
				<?php
					if(isset($_GET['logged'])){
						?>
						<b style="padding:10px; background:#fff; border-radius:2px; display:block; color:red;"><i class="fa fa-sign-out"></i> You've been logged out. You can log in again!</b>
			
						<?php
					}else{
						?>
						<b style="padding:10px; background:#0671a7; border-radius:2px; display:block; color:#fff;"><i class="fa fa-newspaper-o"></i> Welcome to the E-Office File Mgt. & Tracker</b>
			
						<?php
					}
				?>
			<hr/>
			<form action="" method="post">
				<label style="font-weight:bold; color:#fff;">User Name</label>
					<br/><input type="text" id="uname" name="uname" style="width:100%; padding-top:7px; padding-bottom:7px; text-indent:10px;"/><br/><br/>
				<label style="font-weight:bold; color:#fff;">Passcode</label>
					<br/><input type="password" name="upass" style="width:100%; padding-top:7px; padding-bottom:7px; text-indent:10px;"/><br/>
					<br/>
						<button name="client_login" title="Click to login (Agents)" class="btn btn-sm btn-primary"><i class="fa fa-user"></i> staff login</button>
						<button name="admin_login" title="Click to login (Admin Only)" class="btn btn-sm btn-success"><i class="fa fa-user-secret"></i> admin login</button>
			</form>
			
		</div>
		<div class="col-sm-4 col-md-4 "></div>
	</div>
	</div>
	
	
</body>
	</html>