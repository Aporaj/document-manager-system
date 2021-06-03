<?php
session_start();
if(!isset($_SESSION['admin_08133370716'])){
	header("Location: ../");
	exit();
}
require("../config/config.php");
if(isset($_POST['add_dept'])){
		$cryout = "";
	$dept_name = htmlspecialchars(trim($_POST['dept']));
		$chk_dept = $con -> prepare("SELECT * FROM department_o WHERE dpt_name = ? ");
		if($chk_dept -> execute(array($dept_name))){
			if($chk_dept -> rowCount() > 0){
			$cryout = "<span style='color:red;'>DEPT already created!</span>";
			}else{
				$create_dpt = $con -> prepare("INSERT INTO department_o(dpt_name,dpt_code,dated) VALUES(?,?,?)");
					$code = str_shuffle("12345678909876554312345678909876543123456780987654312345678098765432456700000000000876543345609876543");
					$code = substr($code,0,9);
				if($create_dpt -> execute(array($dept_name,$code,date("M d,Y")))){
					$cryout = "<span style='color:#0671a7;'>The Department has been created!</span>";
				}else{
					$cryout = "<span style='color:red;'>Error Occurred @ DEPT add mode</span>";
				}
			}
		}else{
			$cryout = "<span style='color:red;'>DEPT @ runtime error...</span>";
		}
}
	if(isset($_POST['add_rank'])){
		$cryout = "";
	$rank_name = htmlspecialchars(trim($_POST['rank_name']));
		$chk_dept = $con -> prepare("SELECT * FROM staff_rank WHERE rank_name = ? ");
		if($chk_dept -> execute(array($rank_name))){
			if($chk_dept -> rowCount() > 0){
			$cryout = "<span style='color:red;'>RANK already created!</span>";
			}else{
				$create_dpt = $con -> prepare("INSERT INTO staff_rank(rank_name,rank_code,dated) VALUES(?,?,?)");
					$code = str_shuffle("12345678909876554312345678909876543123456780987654312345678098765432456700000000000876543345609876543");
					$code = substr($code,0,9);
				if($create_dpt -> execute(array($rank_name,$code,date("M d,Y")))){
					$cryout = "<span style='color:#0671a7;'>The Rank has been created!</span>";
				}else{
					$cryout = "<span style='color:red;'>Error Occurred @ RANK add mode</span>";
				}
			}
		}else{
			$cryout = "<span style='color:red;'>DEPT @ runtime error...</span>";
		}
}
	if(isset($_POST['add_role'])){
		$cryout = "";
	$role_name = htmlspecialchars(trim($_POST['role_name']));
		$chk_dept = $con -> prepare("SELECT * FROM staff_role WHERE role_name = ? ");
		if($chk_dept -> execute(array($role_name))){
			if($chk_dept -> rowCount() > 0){
			$cryout = "<span style='color:red;'>ROLE already created!</span>";
			}else{
				$create_dpt = $con -> prepare("INSERT INTO staff_role(role_name,role_code,dated) VALUES(?,?,?)");
					$code = str_shuffle("12345678909876554312345678909876543123456780987654312345678098765432456700000000000876543345609876543");
					$code = substr($code,0,9);
				if($create_dpt -> execute(array($role_name,$code,date("M d,Y")))){
					$cryout = "<span style='color:#0671a7;'>The Role has been created!</span>";
				}else{
					$cryout = "<span style='color:red;'>Error Occurred @ ROLE add mode</span>";
				}
			}
		}else{
			$cryout = "<span style='color:red;'>DEPT @ runtime error...</span>";
		}
}

	if(isset($_POST['add_'])){
		$cryout = "";
		$fname = trim(htmlspecialchars($_POST['fname']));
		$lname = trim(htmlspecialchars($_POST['lname']));
		$email = trim(htmlspecialchars($_POST['email']));
		$phone = trim(htmlspecialchars($_POST['phone']));
		$dob = trim(htmlspecialchars($_POST['dob']));
		$marital = trim(htmlspecialchars($_POST['marital']));
		$gender = trim(htmlspecialchars($_POST['gender']));
		$role = trim(htmlspecialchars($_POST['role']));
		$rank = trim(htmlspecialchars($_POST['rank']));
		$dpt = trim(htmlspecialchars($_POST['dptd']));
		
		$dated = date("d, M, Y");
		$pin = str_shuffle("576890ghhhjklhvui2398727980jhgfiu8762ghjk12345690987675645");
		$pin = strtoupper(substr($pin,0,6));
			$passport = $_FILES['passport'];
				$passport_name = $passport['name'];
				$passport_temp = $passport['tmp_name'];
					$allowed = array("jpg","png","gif");
						$brush = explode('.',$passport_name);
						$ext = strtolower(end($brush));
							//Check Existence START
							$cheeck = $con -> prepare("SELECT * FROM xgenta WHERE email = ? ");
							if($cheeck -> execute(array($email))){
								if($cheeck -> rowCount() > 0){
									$cryout = "<span style='color:red;'><i class='fa fa-warning'></i>  Staff already added!</span>";
								}else{
									if(in_array($ext, $allowed)){
								$new_image = uniqid('',true).".".$ext;
									//Check Role Existence START
										
										
										
										//FETCH ROLE NAME J START
										$fetch_roleName = $con -> prepare("SELECT * FROM staff_role WHERE role_code = ? ");
											$fetch_roleName -> execute(array($role));
											$fetch_roleName -> setFetchMode(PDO::FETCH_ASSOC);
											$role_namej  = ""; 	
											while($tatoo = $fetch_roleName -> fetch()){
												
												$role_namej = $tatoo['role_name'];
											}
										
										
										//FETCH ROLE NAME J END
										
									
									$check_role = $con -> prepare("SELECT * FROM xgenta WHERE role = ? AND dpt = ?");
									if($check_role -> execute(array($role,$dpt))){
										if($check_role -> rowCount() > 0){
									$cryout = "<span style='color:red;'><i class='fa fa-warning'></i> Role Clashed -- can't be assigned twice in a department </span>";
										}else{
											if(move_uploaded_file($passport_temp,"../agents/".$new_image)){
										$insert_query = $con -> prepare("INSERT INTO xgenta(fname,lname,email,phone,dob,marital,gender,rank,role,role_name,dpt,access_code,passport,dated) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
										if($insert_query -> execute(array($fname,$lname,$email,$phone,$dob,$marital,$gender,$rank,$role,$role_namej,$dpt,$pin,$new_image,$dated))){
											
								$cryout = "<span style='color:#0671a7;'><i class='fa fa-check'></i> Staff added successfully!</span>";
										}else{
											
								$cryout = "<span style='color:red;'><i class='fa fa-warning'></i>  Couldn't complete the insertion...</span>";
										}
									}else{
								$cryout = "<span style='color:red;'><i class='fa fa-times'></i>  File uploading error...</span>";
									}
										}
									}else{
									$cryout = "<span style='color:red;'><i class='fa fa-warning'></i>  ERROR Occurred!</span>";
										//$cryout = "";
									}
									
									
									//Check Role Existence END
									
									
									
							}else{
								$cryout = "<span style='color:red;'><i class='fa fa-times'></i>  Invalid file format. Use only JPG, PNG, or GIF format.</span>";
							}
								}
							}else{
								$cryout = "<span style='color:red;'><i class='fa fa-warning'></i>ERROR OCCURRED...</span>";
							}
							//Check Existence END
							
							
	}
	if(isset($_POST['update_'])){
		$cryout = "";
		$fname = trim(htmlspecialchars($_POST['ufname']));
		$lname = trim(htmlspecialchars($_POST['ulname']));
		$pipe = $_POST['pipe_trace'];
			$passport = $_FILES['upassport'];
				$passport_name = $passport['name'];
				if($passport_name !=""){
						$passport_temp = $passport['tmp_name'];
					$allowed = array("jpg","png","gif");
						$brush = explode('.',$passport_name);
						$ext = strtolower(end($brush));
							if(in_array($ext, $allowed)){
								$new_image = uniqid('',true).".".$ext;
									if(move_uploaded_file($passport_temp,"../agents/".$new_image)){
										$insert_query = $con -> prepare("UPDATE xgenta SET fname = ?, lname = ?, passport = ? WHERE ref = ?");
										if($insert_query -> execute(array($fname,$lname,$new_image,$pipe))){
											
								$cryout = "<span style='color:#0671a7;'><i class='fa fa-check'></i> Agent added successfully!</span>";
										}else{
											
								$cryout = "<span style='color:red;'><i class='fa fa-warning'></i>  Couldn't complete the insertion...</span>";
										}
									}else{
								$cryout = "<span style='color:red;'><i class='fa fa-times'></i>  File uploading error...</span>";
									}
							}else{
								$cryout = "<span style='color:red;'><i class='fa fa-times'></i>  Invalid file format. Use only JPG, PNG, or GIF format.</span>";
							}
				}else{
					$insert_query = $con -> prepare("UPDATE xgenta SET fname = ?, lname = ? WHERE ref = ?");
										if($insert_query -> execute(array($fname,$lname,$pipe))){
											
								$cryout = "<span style='color:#0671a7;'><i class='fa fa-check'></i> Changes has been made successfully!</span>";
										}else{
											
								$cryout = "<span style='color:red;'><i class='fa fa-warning'></i>  Couldn't complete the updating...</span>";
										}
					
				}
							
	}
?>
<!DOCTYPE html>
	<html>
		<head>
			<title>The E-Office Mgt. &amp; Tracking System</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="../boot/css/bootstrap.min.css" media="all"/>
			<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css"/>
			<link rel="icon"  type="image/png" href="images/logo_of.png"/>
			<style>
			
			
			
			</style>
		
<body>
	
	<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-md-12 bg-primary" style="padding-top:7px; color:#fff; text-align:center; font-weight:bold; padding-bottom:7px;"> <i class="fa fa-lock"></i> The E-Office Admin Dashboard</div>
		<div class="col-sm-12 col-md-12" style="padding-top:7px; color:#fff; text-align:center; font-weight:bold; padding-bottom:7px;"><hr/></div>
		<div class="col-sm-12 col-md-12 " style="padding-top:7px; color:#fff; text-align:center; padding-bottom:7px;"> 
			<a href="../admin/" class="btn btn-sm btn-primary"><i class="fa fa-home"></i> </a>
			<a href="?tab=add" class="btn add_agent btn-sm btn-info"><i class="fa fa-user-plus"></i> Add Staff</a>
			<a href="?tab=manage_agent" class="btn manage_agent btn-sm btn-secondary"><i class="fa fa-users"></i> Manage Staff</a>
			<a href="?tab=view_log" class="btn view_log btn-sm btn-warning"><i class="fa fa-eye"></i> View Log</a>
				<span class="badge badge-danger"><?php echo date("d, M, Y");?></span>
		</div>
		<div class="col-sm-12 col-md-12" style="padding-top:7px; color:#fff; text-align:center; font-weight:bold; padding-bottom:7px;"><hr/></div>
		<div class="col-sm-12 col-md-12 bg-light" style="height:376px; overflow:auto; ">
			<?php
				if(isset($_GET['tab'])){
					$tab = $_GET['tab'];
					if($tab == "add"){
						?>
							<!--- Add agent  template-->
				<div class="jumbotron add_agent">
					<form action="" class="bg-dark" style="padding:24px; color:#fff;" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-sm-12 col-md-12" style="text-align:center; margin-bottom:18px;">
								<?php
									if(isset($cryout) && $cryout !=""	){
										echo "<div style='background:#fff; '>".$cryout."</div>";
									}
								?>
							</div>
							<div class="col-sm-2 col-md-2">
								<label>First Name</label>
							<br/><input required type="text" name="fname" style="width:100%; padding-bottom:7px; padding-top:7px; text-indent:10px;">
							</div>
							<div class="col-sm-2 col-md-2">
								<label>Last Name</label>
							<br/><input required type="text" name="lname" style="width:100%; padding-bottom:7px; padding-top:7px; text-indent:10px;">
							</div>
							<div class="col-sm-2 col-md-2">
								<label>Email</label>
							<br/><input required type="email" name="email" style="width:100%; padding-bottom:7px; padding-top:7px; text-indent:10px;">
							</div>
							<div class="col-sm-2 col-md-2">
								<label>Phone</label>
							<br/><input required type="text" name="phone" style="width:100%; padding-bottom:7px; padding-top:7px; text-indent:10px;">
							</div>
							<div class="col-sm-2 col-md-2">
								<label>Date of Birth</label>
							<br/><input required type="date" name="dob" style="width:100%; padding-bottom:7px; padding-top:7px; text-indent:10px;">
							</div>
							<div class="col-sm-2 col-md-2">
								<label>Marital Status</label>
							<br/>
									<select required name="marital" style="width:100%; padding-bottom:7px; padding-top:7px; text-indent:10px;">
										<option value="">choose status</option>
										<option value="married">Married</option>
										<option value="single">Single</option>
									</select>
							</div>
							<div class="col-sm-2 col-md-2"><br/>
								<label>Gender</label>
							<br/>
									<select required name="gender" style="width:100%; padding-bottom:7px; padding-top:7px; text-indent:10px;">
										<option value="">choose gender</option>
										<option value="male">Male</option>
										<option value="female">Female</option>
									</select>
							</div>
							<div class="col-sm-2 col-md-2"><br/>
								<label>Department</label>
							<br/>
									<select required name="dptd" style="width:100%; padding-bottom:7px; padding-top:7px; text-indent:10px;">
										<option value="">department</option>
										<?php
											$fetch_dpt = $con -> prepare("SELECT * FROM department_o ORDER BY dpt_name");
											if($fetch_dpt -> execute()){
												if($fetch_dpt -> rowCount() > 0){
													$fetch_dpt -> setFetchMode(PDO::FETCH_ASSOC);
													while($row = $fetch_dpt -> fetch()){
														$refs = $row['ref'];
														$dpt_name = $row['dpt_name'];
														$dpt_code = $row['dpt_code'];
														echo "<option value='".$dpt_code."'>".$dpt_name."</option>";
													}
												}else{
													echo "<option>No Department Found</option>";
												}
											}else{
												echo "error occurred!!!!!!!!!";
											}
										
										?>
									</select>
							</div>
							<div class="col-sm-2 col-md-2"><br/>
								<label>Rank</label>
							<br/>
									<select required name="rank" style="width:100%; padding-bottom:7px; padding-top:7px; text-indent:10px;">
										<option value="">choose rank</option>
										<option value="nill">Nill</option>
										<?php
											$fetch_role = $con -> prepare("SELECT * FROM staff_rank ORDER BY rank_name");
											if($fetch_role -> execute()){
												if($fetch_role -> rowCount() > 0){
													$fetch_role -> setFetchMode(PDO::FETCH_ASSOC);
													while($row = $fetch_role -> fetch()){
														$refs = $row['ref'];
														$rank_name = $row['rank_name'];
														$rank_code = $row['rank_code'];
														echo "<option value='".$rank_code."'>".$rank_name."</option>";
													}
												}else{
													echo "<option>No Rank Found</option>";
												}
											}else{
												echo "error occurred!!!!!!!!!";
											}
										
										?>
									</select>
							</div>
							<div class="col-sm-2 col-md-2"><br/>
								<label>Role</label>
							<br/>
									<select required name="role" style="width:100%; padding-bottom:7px; padding-top:7px; text-indent:10px;">
										<option value="">choose role</option>
										<option value="none">Nill</option>
										
										<?php
											$fetch_role = $con -> prepare("SELECT * FROM staff_role ORDER BY role_name");
											if($fetch_role -> execute()){
												if($fetch_role -> rowCount() > 0){
													$fetch_role -> setFetchMode(PDO::FETCH_ASSOC);
													while($row = $fetch_role -> fetch()){
														$refs = $row['ref'];
														$role_name = $row['role_name'];
														$role_code = $row['role_code'];
														echo "<option value='".$role_code."'>".$role_name."</option>";
													}
												}else{
													echo "<option>No Role Found</option>";
												}
											}else{
												echo "error occurred!!!!!!!!!";
											}
										
										?>
									</select>
							</div>
							<div class="col-sm-2 col-md-2">
							<br/>
								<label>Passport</label>
							<br/><input required type="file" name="passport" style="width:100%; padding-bottom:7px; padding-top:7px; text-indent:10px;">
							</div>
							<div class="col-sm-2 col-md-2">
							<br/>
								<label></label>
							<br/><button class="btn btn-sm btn-primary" name="add_" title="click to add now"><i class="fa fa-plus"></i> add now</button>
							</div>
						</div>
					</form>
				
				</div>
			<!--- Add agent template Ends-->
						<?php
					}elseif($tab == "manage_agent" && !isset($_GET['edit'])){
						?>
						<!--- Manage agent  template-->
				<div class="jumbotron manage_agent">
					<?php
						//fetch Agents
							$fetch = $con -> prepare("SELECT * FROM xgenta ORDER BY ref DESC");
								if($fetch -> execute()){
									if($fetch -> rowCount() > 0){
										$fetch -> setFetchMode(PDO::FETCH_ASSOC);
											echo '<table class="table table-bordered table-light">
												<tr>
													<th>SN</th>
													<th>First Name</th>
													<th>Last Name</th>
													<th>Passport</th>
													<th>Access Code</th>
													<th>Date</th>
													<th>Action</th>
												</tr>
											';
											$sn = 0;
												while($row = $fetch -> fetch()){
													$sn ++;
													$ref = $row['ref'];
													$o_fname = $row['fname'];
													$o_lname = $row['lname'];
													$o_access_code = $row['access_code'];
													$o_passport = $row['passport'];
													$o_date = $row['dated'];
														
													echo '<tr>
														<td>'.$sn.'</td>
														<td>'.$o_fname.'</td>
														<td>'.$o_lname.'</td>
														<td><img src="../agents/'.$o_passport.'" class="img img-fluid" style="height:60px;"/></td>
														<td>'.$o_access_code.'</td>
														<td>'.$o_date.'</td>
														<td>
															<a href="trash.php?ref='.$ref.'" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
															<a href="?tab=manage_agent&edit='.$ref.'" class="btn btn-sm btn-info"><i class="fa fa-pencil"></i> Edit</a>
														</td>
													</tr>';
												}
											echo '</table>';
									}else{
									echo "<span class='badge badge-danger badge-pill'>No Agent found...</span>";
									}
								}else{
									echo "<span class='badge badge-danger badge-pill'>Runtime Error @ fetching...</span>";
								}
					?>
				</div>
			<!--- Manage agent template Ends-->
						<?php
					}elseif($tab === "view_log"){
						?>
						<!--- view log  template-->
				<div class="jumbotron view_log">View Log Template</div>
			<!--- view log template Ends-->
						<?php
					}elseif($tab == "manage_agent" && isset($_GET['edit'])){
							$fetch_details = $con -> prepare("SELECT * FROM xgenta WHERE ref = ?");
							if($fetch_details -> execute(array($_GET['edit']))){
								if($fetch_details -> rowCount() > 0){
									$fetch_details -> setFetchMode(PDO::FETCH_ASSOC);
									while($row = $fetch_details -> fetch()){
										$ref_l = $row['ref'];
										$fname_l = $row['fname'];
										$lname_l = $row['lname'];
										$passport_l = $row['passport'];
									}
									?>
									
									<!--- Edit agent  template-->
				<div class="jumbotron add_agent">
					<form action="" class="bg-dark" style="padding:24px; color:#fff;" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-sm-12 col-md-12" style="margin-bottom:18px; text-align:center;">
								<?php
									if(isset($cryout) && $cryout !=""	){
										echo "<div style='background:#fff;'>".$cryout."</div>";
									}
								?>
							</div>
							<div class="col-sm-3 col-md-3">
								<label>First Name</label>
							<br/><input required type="text" name="ufname" value="<?php echo $fname_l; ?>" style="width:100%; padding-bottom:7px; padding-top:7px; text-indent:10px;">
							</div>
							<div class="col-sm-3 col-md-3">
								<label>Last Name</label>
							<br/><input required type="text" name="ulname" value="<?php echo $lname_l?>" style="width:100%; padding-bottom:7px; padding-top:7px; text-indent:10px;">
							</div>
							<div class="col-sm-3 col-md-3">
							<input type="hidden" name="pipe_trace" value="<?php echo $ref_l?>"/>
								<label for="file"><img src="../agents/<?php echo $passport_l; ?>" style="border:2px solid #eee; border-radius:3px; height:40px;"/> </label>
							<br/><input id="file" type="file" name="upassport" style="width:100%; padding-bottom:7px; padding-top:7px; text-indent:10px;">
							</div>
							<div class="col-sm-3 col-md-3">
								<label></label>
							<br/><button class="btn btn-sm btn-info" name="update_" title="click to add now"><i class="fa fa-check"></i> save changes</button>
							</div>
						</div>
					</form>
				
				</div>
			<!--- Edit agent template Ends-->
									
									<?php
								}else{
									echo "<span style='color:red;'>Invalid Operation. Stop toying around!!</span>";
								}
								
							}
						?>
						
							
						<?php
					}elseif($tab == "add_dpt"){
						
						?>
						
						<!--- Add Dept  template-->
				<div class="jumbotron add_agent">
					<form action="" class="bg-dark" style="padding:24px; color:#fff;" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-sm-12 col-md-12" style="text-align:center; margin-bottom:18px;">
								<?php
									if(isset($cryout) && $cryout !=""	){
										echo "<div style='background:#fff; '>".$cryout."</div>";
									}
								?>
							</div>
							<div class="col-sm-4 col-md-4">
							</div>
							<div class="col-sm-3 col-md-3">
								<label>Department Name</label>
							<br/><input required type="text" name="dept" style="width:100%; padding-bottom:7px; padding-top:7px; text-indent:10px;">
							<br/>
							<br/>
							<center><button class="btn btn-md btn-primary" name="add_dept" title="click to add now"><i class="fa fa-plus"></i> add now</button></center>
							</div>
							
							
							<div class="col-sm-3 col-md-3">
								<label></label>
							<br/>
							</div>
						</div>
					</form>
				
				</div>
			<!--- Add Dept template Ends-->
						
						<?php
						
						
					}elseif($tab == "add_staff_rank"){
						?>
									<!--- Add Staff Rank  template-->
				<div class="jumbotron add_agent">
					<form action="" class="bg-dark" style="padding:24px; color:#fff;" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-sm-12 col-md-12" style="text-align:center; margin-bottom:18px;">
								<?php
									if(isset($cryout) && $cryout !=""	){
										echo "<div style='background:#fff; '>".$cryout."</div>";
									}
								?>
							</div>
							<div class="col-sm-4 col-md-4">
							</div>
							<div class="col-sm-3 col-md-3">
								<label>Staff Rank Name</label>
							<br/><input required type="text" name="rank_name" style="width:100%; padding-bottom:7px; padding-top:7px; text-indent:10px;">
							<br/>
							<br/>
							<center><button class="btn btn-md btn-primary" name="add_rank" title="click to add now"><i class="fa fa-plus"></i> add now</button></center>
							</div>
							
							
							<div class="col-sm-3 col-md-3">
								<label></label>
							<br/>
							</div>
						</div>
					</form>
				
				</div>
			<!--- Add Staff template Ends-->
						
						
						<?php
						
					}elseif($tab == "add_staff_role"){
						?>
									<!--- Add Staff Rank  template-->
				<div class="jumbotron add_agent">
					<form action="" class="bg-dark" style="padding:24px; color:#fff;" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-sm-12 col-md-12" style="text-align:center; margin-bottom:18px;">
								<?php
									if(isset($cryout) && $cryout !=""	){
										echo "<div style='background:#fff; '>".$cryout."</div>";
									}
								?>
							</div>
							<div class="col-sm-4 col-md-4">
							</div>
							<div class="col-sm-3 col-md-3">
								<label>Staff Role Name</label>
							<br/><input required type="text" name="role_name" style="width:100%; padding-bottom:7px; padding-top:7px; text-indent:10px;">
							<br/>
							<br/>
							<center><button class="btn btn-md btn-primary" name="add_role" title="click to add now"><i class="fa fa-plus"></i> add now</button></center>
							</div>
							
							
							<div class="col-sm-3 col-md-3">
								<label></label>
							<br/>
							</div>
						</div>
					</form>
				
				</div>
			<!--- Add Staff template Ends-->
						
						
						<?php
						
					}elseif($tab == 12 && isset($_GET['del_dept'])){
						$ref_del = preg_replace("/[^0-9]/","",$_GET['del_dept']);
							$delete_ = $con -> prepare("SELECT * FROM department_o WHERE ref = ?");
								if($delete_ -> execute(array($ref_del))){
									if($delete_ -> rowCount() > 0){
										$render_delete = $con -> prepare("DELETE FROM department_o WHERE ref = ?");
										if($render_delete -> execute(array($ref_del))){
											echo "<span style='color:#0671a7;'>Deleted Successfully! <a href='?tab=mng_dept'>return</a></span>";
										}else{
											echo "<span style='color:red;'>Error Occurred HereIn</span>";
										}
									}else{
										echo "<span style='color:red;'>Invalid Operation ".$ref_del."</span>";
									}
								}else{
									echo "<span style='color:red;'>Error Occurred @@@@ </span>";
								}
					}elseif($tab == 12 && isset($_GET['del_rank'])){
						$ref_del = preg_replace("/[^0-9]/","",$_GET['del_rank']);
							$delete_ = $con -> prepare("SELECT * FROM staff_rank WHERE ref = ?");
								if($delete_ -> execute(array($ref_del))){
									if($delete_ -> rowCount() > 0){
										$render_delete = $con -> prepare("DELETE FROM staff_rank WHERE ref = ?");
										if($render_delete -> execute(array($ref_del))){
											echo "<span style='color:#0671a7;'>Deleted Successfully! <a href='?tab=mng_staff_rank'>return</a></span>";
										}else{
											echo "<span style='color:red;'>Error Occurred HereIn</span>";
										}
									}else{
										echo "<span style='color:red;'>Invalid Operation ".$ref_del."</span>";
									}
								}else{
									echo "<span style='color:red;'>Error Occurred @@@@ </span>";
								}
					}elseif($tab == "mng_staff_rank"){
						$fetch_rank = $con -> prepare("SELECT * FROM staff_rank");
							if($fetch_rank -> execute()){
								if($fetch_rank -> rowCount() > 0){
									echo "<div class='row'>";
									echo "<div class='col-md-3 col-sm-3'><br/></div>";
									echo "<div class='col-md-3 col-sm-3'><br/><b>RANK ADDED</b></div>";
									echo "<div class='col-md-6 col-sm-6'><br/>
									<a href='?tab=add_staff_rank' class='btn btn-sm btn-primary'><i class='fa fa-plus'></i> add new rank</a>
										
									</div>";
									echo "<div class='col-md-12 col-sm-12'><hr/></div>";
									echo "</div>";
									echo "<table class='table table-bordered'>";
									echo "<tr>
										<th>S/N</th>
										<th>Rank Name</th>
										<th>Rank Code</th>
										<th>Actions</th>
									</tr>";
									$sn = 0;
										$fetch_rank -> setFetchMode(PDO::FETCH_ASSOC);
											while($row = $fetch_rank -> fetch()){
												$sn++;
												$ref = $row['ref'];
												$rank_name = $row['rank_name'];
												$rank_code = $row['rank_code'];
												$dated = $row['dated'];
												echo "	<tr>
															<td>".$sn."</td>
															<td>".$rank_name."</td>
															<td>".$rank_code."</td>
															<td>
																<a href='?tab=12&edt_rank=".$ref."' class='btn btn-warning btn-sm'><i class='fa fa-pencil'></i>edit</a>
																<a href='?tab=12&del_rank=".$ref."' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i>delete</a>
															</td>
														</tr>";
											}
											echo "</table>";
								}else{
								echo "<span style='color:red;'>No Rank added</span>
								<a href='?tab=add_staff_rank' class='btn btn-sm btn-primary'><i class='fa fa-plus'></i> add new rank</a>
								";
								}
							}else{
								echo "<span style='color:red;'>Error Occurred @ RANK fetching....</span>";
							}
					}elseif($tab == "mng_staff_role"){
						$fetch_rank = $con -> prepare("SELECT * FROM staff_role");
							if($fetch_rank -> execute()){
								if($fetch_rank -> rowCount() > 0){
									echo "<div class='row'>";
									echo "<div class='col-md-3 col-sm-3'><br/></div>";
									echo "<div class='col-md-3 col-sm-3'><br/><b>ROLE ADDED</b></div>";
									echo "<div class='col-md-6 col-sm-6'><br/>
									<a href='?tab=add_staff_role' class='btn btn-sm btn-primary'><i class='fa fa-plus'></i> add new role</a>
										
									</div>";
									echo "<div class='col-md-12 col-sm-12'><hr/></div>";
									echo "</div>";
									echo "<table class='table table-bordered'>";
									echo "<tr>
										<th>S/N</th>
										<th>Role Name</th>
										<th>Role Code</th>
										<th>Actions</th>
									</tr>";
									$sn = 0;
										$fetch_rank -> setFetchMode(PDO::FETCH_ASSOC);
											while($row = $fetch_rank -> fetch()){
												$sn++;
												$ref = $row['ref'];
												$role_name = $row['role_name'];
												$role_code = $row['role_code'];
												$dated = $row['dated'];
												echo "	<tr>
															<td>".$sn."</td>
															<td>".$role_name."</td>
															<td>".$role_code."</td>
															<td>
																<a href='?tab=12&edt_role=".$ref."' class='btn btn-warning btn-sm'><i class='fa fa-pencil'></i>edit</a>
																<a href='?tab=12&del_role=".$ref."' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i>delete</a>
															</td>
														</tr>";
											}
											echo "</table>";
								}else{
								echo "<span style='color:red;'>No Rank added</span>
								<a href='?tab=add_staff_rank' class='btn btn-sm btn-primary'><i class='fa fa-plus'></i> add new rank</a>
								";
								}
							}else{
								echo "<span style='color:red;'>Error Occurred @ RANK fetching....</span>";
							}
					}elseif($tab == "mng_dept"){
						$fetch_rank = $con -> prepare("SELECT * FROM department_o");
							if($fetch_rank -> execute()){
								if($fetch_rank -> rowCount() > 0){
									echo "<div class='row'>";
									echo "<div class='col-md-3 col-sm-3'><br/></div>";
									echo "<div class='col-md-3 col-sm-3'><br/><b>Department ADDED</b></div>";
									echo "<div class='col-md-6 col-sm-6'><br/>
									<a href='?tab=add_dpt' class='btn btn-sm btn-primary'><i class='fa fa-plus'></i> add new department</a>
										
									</div>";
									echo "<div class='col-md-12 col-sm-12'><hr/></div>";
									echo "</div>";
									echo "<table class='table table-bordered'>";
									echo "<tr>
										<th>S/N</th>
										<th>Department Name</th>
										<th>Department Code</th>
										<th>Actions</th>
									</tr>";
									$sn = 0;
										$fetch_rank -> setFetchMode(PDO::FETCH_ASSOC);
											while($row = $fetch_rank -> fetch()){
												$sn++;
												$ref = $row['ref'];
												$dpt_name = $row['dpt_name'];
												$dpt_code = $row['dpt_code'];
												$dated = $row['dated'];
												echo "	<tr>
															<td>".$sn."</td>
															<td>".$dpt_name."</td>
															<td>".$dpt_code."</td>
															<td>
																<a href='#' class='btn btn-warning btn-sm'><i class='fa fa-pencil'></i>edit</a>
																<a href='?tab=12&del_dept=".$ref."' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i>delete</a>
															</td>
														</tr>";
											}
											echo "</table>";
								}else{
								echo "<span style='color:red;'>No Rank added</span>
								<a href='?tab=add_dpt' class='btn btn-sm btn-primary'><i class='fa fa-plus'></i> add new department</a>
								";
								}
							}else{
								echo "<span style='color:red;'>Error Occurred @ RANK fetching....</span>";
							}
					}
					
				}else{
					?>
					<!--- Welcome template-->
				<div class="jumbotron welcome" style="text-align:center; padding:12px;">
					Welcome to the admin control panel where you can create and control the affairs of registered members (staff).
						<br/>
						<br/>
						<img src="../gallery/learn programming.png" class="img img-fluid img-thumbnail"/>
				</div>
			<!--- Welcome template Ends-->
					<?php
				}
				
			?>
			
			
			
			
			
			
			
		</div>
		<div class="col-sm-12 col-md-12" style="padding-top:7px; color:#fff; text-align:center; font-weight:bold; padding-bottom:7px;"><hr/></div>
		<div class="col-sm-12 col-md-12 " style="padding-top:7px; color:#fff; text-align:center; padding-bottom:7px;"> 
			<a href="../admin/" class="btn btn-sm btn-primary"><i class="fa fa-home"></i></a>
			<a href="?tab=mng_dept" class="btn add_agent btn-sm btn-info"><i class="fa fa-cogs"></i> Department</a>
			<a href="?tab=mng_staff_rank" class="btn manage_agent btn-sm btn-secondary"><i class="fa fa-trophy"></i> Staff Rank</a>
			<a href="?tab=mng_staff_role" class="btn manage_agent btn-sm btn-secondary"><i class="fa fa-trophy"></i> Staff Role</a>
			<a href="?tab=view_log" class="btn view_log btn-sm btn-warning"><i class="fa fa-eye"></i> View Log</a>
			<a href="logout.php" class="btn view_log btn-sm btn-danger"><i class="fa fa-power-off"></i> Logout</a>
		</div>
	</div>
	</div>
	<script src="../js/qwrs.js"></script>
	<script>
		/* $(document).ready(function(){
			let welcome_pane = $('div.welcome');
			let add_agent = $('a.add_agent');
			let manage_agent = $('a.manage_agent');
			let view_log = $('a.view_log');
			let add_agent_pane = $('div.add_agent');
			let manage_agent_pane = $('div.manage_agent');
			let view_log_pane = $('div.view_log');
			//render action
			add_agent.click(function(){
				add_agent_pane.slideDown();
				welcome_pane.fadeOut();
				manage_agent_pane.fadeOut();
				view_log_pane.fadeOut();
			});
			manage_agent.click(function(){
				manage_agent_pane.slideDown();
				add_agent_pane.fadeOut();
				welcome_pane.fadeOut();
				view_log_pane.fadeOut();
			});
			view_log.click(function(){
				view_log_pane.slideDown();
				manage_agent_pane.fadeOut();
				add_agent_pane.fadeOut();
				welcome_pane.fadeOut();
			});
		}); */
	</script>
</body>
	</html>