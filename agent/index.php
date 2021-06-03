<?php
session_start();
if(!isset($_SESSION['client_08133370716'])){
	header("Location: ../");
	exit();
	$global_ref = $_SESSION['client_ref'];
	
	$roleU = "";
	
	
	
	
	
	
}
require("../config/config.php");
require("track.func.php");

		if(isset($_POST['f_btn'])){
			$ftitle = htmlspecialchars(trim($_POST['ftitle']));
			$fcaption = htmlspecialchars(trim($_POST['fcaption']));
			$fto = htmlspecialchars(trim($_POST['fto']));
			$ffrom = $_SESSION['client_ref'];
			$fseen = $fstatus = $fworkedon = 0;
			$ffile = $_FILES['ffile'];
			$fdate = date("M d,Y");
			$ffile_code = substr(str_shuffle("123456789876123456789876543212345678765456789876543235"),0,5);
				$file_name = $ffile['name'];
				$file_tmp = $ffile['tmp_name'];
					$allowed = array("pdf","jpeg","jpg","png","docx","csv","zip");
						$rif = explode('.',$file_name);
					$ext = strtolower(end($rif));
						if(in_array($ext,$allowed)){
							$file_new = uniqid('',true).".".$ext;
								$create_file = $con -> prepare("INSERT INTO files_x(ftitle,fcaption,ffile,ffile_type,ffile_code,fdate,ffrom,fto,fwhere,fseen,fworkedon,fstatus) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
								move_uploaded_file($file_tmp, "files/".$file_new);
								if($create_file -> execute(array($ftitle,$fcaption,$file_new,$ext,$ffile_code,$fdate,$ffrom,$fto,"nill",$fseen,$fworkedon,$fstatus))){
									
									$yummyError = "<span style='color:#0671a7;'> File Submitted Successfully : File Number == <b>".$ffile_code."</b></span>";
									nail_it($ffile_code,$ext,$ffrom,$fto,"none",0);
								}else{
									$yummyError = "<span style='color:red;'> Error occurred</span>";
								}
							
							
						}else{
							$yummyError = "<span style='color:red;'> Invalid File Format</span>";
						}
		}




	if(isset($_POST['add_'])){
		$cryout = "";
		$fname = trim(htmlspecialchars($_POST['fname']));
		$lname = trim(htmlspecialchars($_POST['lname']));
		$gender = trim(htmlspecialchars($_POST['gender']));
		$dob = trim(htmlspecialchars($_POST['dob']));
		$place_birth = trim(htmlspecialchars($_POST['place_birth']));
		$state_origin = trim(htmlspecialchars($_POST['state_origin']));
		$current_address = trim(htmlspecialchars($_POST['current_address']));
		$occupation = trim(htmlspecialchars($_POST['occupation']));
		$height = trim(htmlspecialchars($_POST['height']));
		$blood = trim(htmlspecialchars($_POST['blood']));
		$marital = trim(htmlspecialchars($_POST['marital']));
		$maiden = trim(htmlspecialchars($_POST['maiden']));
		$next_kin = trim(htmlspecialchars($_POST['next_kin']));
		$exp = trim(htmlspecialchars($_POST['exp_date']));
		$date_issued = date("d, M, Y");
		$state_issued = trim(htmlspecialchars($_POST['state_issued']));
		$place_issued = trim(htmlspecialchars($_POST['place_issued']));
		$lga = trim(htmlspecialchars($_POST['lga']));
		$signature = trim(htmlspecialchars($_POST['signature']));
		$dated = date("d, M, Y");
		$NIN = substr(str_shuffle('123456789009876543211234567890098765432112345678900987654321'),0,11);
		$RC = substr(str_shuffle('123456789009876543211234567890098765432112345678900987654321'),0,16);
		
			$passport = $_FILES['passport'];
				$passport_name = $passport['name'];
				$passport_temp = $passport['tmp_name'];
					$allowed = array("jpg","png","gif");
						$brush = explode('.',$passport_name);
						$ext = strtolower(end($brush));
							if(in_array($ext, $allowed)){
								$new_image = uniqid('',true).".".$ext;
									if(move_uploaded_file($passport_temp,"../citizens/".$new_image)){
										$check_done = $con -> prepare("SELECT * FROM citizens WHERE email_address = ?");
										if($check_done -> execute(array($signature))){
											if($check_done -> rowCount() > 0 ){
								$cryout = "<span style='color:red;'><i class='fa fa-warning'></i>  Already registered Member...</span>";
											}else{
												$insert_query = $con -> prepare("INSERT INTO staff(sname,oname,sex,dob,pob,current_address,occupation,height,blood_group,marital_status,maiden_name,next_kin,dated,place,state,lga,rc_num,email_address,nin,exp_date,passport) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
										if($insert_query -> execute(array($fname,$lname,$gender,$dob,$place_birth,$current_address,$occupation,$height,$blood,$marital,$maiden,$next_kin,$date_issued,$place_issued,$state_issued,$lga,$RC,$signature,$NIN,$exp,$new_image))){
								$cryout = "<span style='color:#0671a7;'><i class='fa fa-check'></i> Citizen added successfully!</span>";
										}else{
								$cryout = "<span style='color:red;'><i class='fa fa-warning'></i>  Couldn't complete the insertion...</span>";
										}
											}
										}else{
								$cryout = "<span style='color:red;'><i class='fa fa-times'></i>  Runtime Error Occurred...</span>";
										}
									}else{
								$cryout = "<span style='color:red;'><i class='fa fa-times'></i>  File uploading error...</span>";
									}
							}else{
								$cryout = "<span style='color:red;'><i class='fa fa-times'></i>  Invalid file format. Use only JPG, PNG, or GIF format.</span>";
							}
							
	}
	
	
	if(isset($_POST['4word_btn'])){
			$where = $_POST['where'];
				$track = $_GET['track'];
						//$fetch_file_details 
							$fetch_fileDL = $con -> prepare("SELECT * FROM files_x WHERE ref = ?");
							$fetch_fileDL -> execute(array($track));
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
						
						
						
						
					$update_4wod = $con -> prepare("UPDATE files_x SET fto = ?, fstatus = ? WHERE ref = ?");
					if($update_4wod -> execute(array($where,600,$track))){
						echo "<script>alert('Forwarded Successfully')</script>";
						nail_it($jx_filecode,$jx_filetype,$jx_from,$where,$_SESSION['client_ref'],600);
						echo "<script>window.open('?tab=treat_files','_self')</script>";
					}else{
						echo "<script>alert('Error Occurred')</script>";
						
					}
		
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
		<div class="col-sm-12 col-md-12 bg-dark" style="padding-top:7px; color:#fff; text-align:center; font-weight:bold; padding-bottom:7px;"> <span class="badge badge badge-light"><i class="fa fa-user"></i> <?php echo $_SESSION['client_fname']." ".$_SESSION['client_lname']; ?></span> <i class="fa fa-key"></i> Agent Operation Console (AOC)</div>
		<div class="col-sm-12 col-md-12" style="padding-top:7px; color:#fff; text-align:center; font-weight:bold; padding-bottom:7px;"><hr/></div>
		<div class="col-sm-12 col-md-12 " style="padding-top:7px; color:red; text-align:center; padding-bottom:7px;"> 
			<img src="../agents/<?php echo $_SESSION['client_passport']; ?>" alt="myprofile" style="height:60px; border-radius:10px; border:3px solid #eee;" title="My profile"/>
				&nbsp;&nbsp;&nbsp;
			<a href="../agent/" class="btn btn-sm btn-primary"><i class="fa fa-home"></i> </a>
			<a href="?tab=compose" class="btn add_agent btn-sm btn-info"><i class="fa fa-plus"></i> Compose File</a>
			<a href="?tab=track_file" class="btn manage_agent btn-sm btn-secondary"><i class="fa fa-briefcase"></i> View Files</a>
			<a href="?tab=notifications" class="btn view_log btn-sm btn-warning"><i class="fa fa-bell"></i> Notifications</a>
			<a href="logout.php" class="btn view_log btn-sm btn-danger"><i class="fa fa-power-off"></i> Logout</a>
				<span class="badge badge-light"><i class="fa fa-clock-o"></i> <?php echo date("d, M, Y");?></span>
				<div style="color:black;">
					<?php
						
												$fetch_details = $con -> prepare("SELECT * FROM xgenta WHERE ref = ?");
												$fetch_details -> execute(array($_SESSION['client_ref']));
												$fetch_details -> setFetchMode(PDO::FETCH_ASSOC);
												while($rrr = $fetch_details -> fetch()){
													$dsfname = $rrr['fname'];
													$dslname = $rrr['lname'];
													$dsdpt = $rrr['dpt'];
													$dsrole = $rrr['role'];
													$dsrank = $rrr['rank'];
													$dsrolename = $rrr['role_name'];
													$dsmarital = $rrr['marital'];
														//fetch_department
														$fetch_dptF = $con -> prepare("SELECT * FROM department_o WHERE dpt_code = ?");
															$fetch_dptF -> execute(array($dsdpt));
																if($fetch_dptF -> rowCount() > 0){
																	$fetch_dptF -> setFetchMode(PDO::FETCH_ASSOC);
																		while($dsrow = $fetch_dptF -> fetch()){
																			$dsdepartment = $dsrow['dpt_name'];
																			
																		}
																}else{
																	echo "<span style='color:red;'>Error Occurred!!</span>";
																}
																
																
															//fetch_role_name
														$fetch_roleN = $con -> prepare("SELECT * FROM staff_rank WHERE rank_code = ?");
															$fetch_roleN -> execute(array($dsrank));
																if($fetch_roleN -> rowCount() > 0){
																	$fetch_roleN -> setFetchMode(PDO::FETCH_ASSOC);
																		while($dsirow = $fetch_roleN -> fetch()){
																			$dsrolenameK = $dsirow['rank_name'];
																			
																		}
																}else{
																	echo "<span style='color:red;'>Error Occurred!!</span>";
																}
													
												}
					?>
				
				<b style="color:#0671a7;">Department: </b>	<?php echo $dsdepartment?> || 
				<b style="color:#0671a7;">Rank: </b>	<?php echo $dsrolenameK?> || 
				<b style="color:#0671a7;">Role: </b>	<?php echo $dsrolename?> 
				
				
					
						
				
			</div>
		</div>
		<div class="col-sm-12 col-md-12" style="padding-top:7px; color:#fff; text-align:center; font-weight:bold; padding-bottom:7px;"><hr/></div>
		<div class="col-sm-12 col-md-12 " style="height:380px; overflow:auto; ">
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
							<br/><input required type="text" name="fname" style="width:100%; padding-bottom:3px; padding-top:3px; text-indent:10px;">
							</div>
							<div class="col-sm-2 col-md-2">
								<label>Last Name</label>
							<br/><input required type="text" name="lname" style="width:100%; padding-bottom:3px; padding-top:3px; text-indent:10px;">
							</div>
							<div class="col-sm-2 col-md-2">
								<label>Sex</label>
							<br/>
								<select name="gender" style="width:100%; padding-bottom:6px; padding-top:4px; text-indent:10px;">
									<option value="">choose your sex</option>
									<option value="M">Male</option>
									<option value="F">Female</option>
								</select>
							</div>
							<div class="col-sm-2 col-md-2">
								<label>Date Of Birth</label>
							<br/>
							<input required type="date" name="dob" style="width:100%; padding-bottom:4px; padding-top:4px; text-indent:10px;">
							</div>
							<div class="col-sm-2 col-md-2">
								<label>Place Of Birth</label>
							<br/>
							<input required type="text" name="place_birth" style="width:100%; padding-bottom:4px; padding-top:4px; text-indent:10px;"/>
							</div>
							<div class="col-sm-2 col-md-2">
								<label>State Of Origin</label>
							<br/>
							<input required type="text" name="state_origin" style="width:100%; padding-bottom:4px; padding-top:4px; text-indent:10px;"/>
							</div>
							<div class="col-sm-2 col-md-2"><br/>
								<label>Current Address</label>
							<br/>
							<input required type="text" name="current_address" style="width:100%; padding-bottom:4px; padding-top:4px; text-indent:10px;"/>
							</div>
							<div class="col-sm-2 col-md-2"><br/>
								<label>Occupation</label>
							<br/>
							<input required type="text" name="occupation" style="width:100%; padding-bottom:4px; padding-top:4px; text-indent:10px;"/>
							</div>
							<div class="col-sm-1 col-md-1"><br/>
								<label>Height</label>
							<br/>
							<input required type="text" name="height" style="width:100%; padding-bottom:4px; padding-top:4px; text-indent:10px;"/>
							</div>
							<div class="col-sm-1 col-md-1"><br/>
								<label>Blood G.</label>
							<br/>
							<input required type="text" name="blood" style="width:100%; padding-bottom:4px; padding-top:4px; text-indent:10px;"/>
							</div>
							<div class="col-sm-2 col-md-2"><br/>
								<label>Marital Status</label>
							<br/>
								<select name="marital" style="width:100%; padding-bottom:7px; padding-top:4px; text-indent:10px;">
									<option value="">choose status</option>
									<option value="single">Single</option>
									<option value="married">Married</option>
								</select>
							</div>
							<div class="col-sm-2 col-md-2"><br/>
								<label>Maiden</label>
							<br/><input required type="text" name="maiden" style="width:100%; padding-bottom:4px; padding-top:4px; text-indent:10px;">
							
								
							</div>
							<div class="col-sm-2 col-md-2"><br/>
								<label>Next of Kin</label>
							<br/><input required type="text" name="next_kin" style="width:100%; padding-bottom:4px; padding-top:4px; text-indent:10px;">
							
							</div>
							<div class="col-sm-2 col-md-2"><br/>
								<label>Expiry Date</label>
							<br/>
							<input required type="date" name="exp_date" style="width:100%; padding-bottom:4px; padding-top:4px; text-indent:10px;">
							</div>
							
							<div class="col-sm-2 col-md-2"><br/>
								<label>Place Issued</label>
							<br/><input required type="text" name="place_issued" style="width:100%; padding-bottom:4px; padding-top:4px; text-indent:10px;">
							
							</div>
							
							<div class="col-sm-2 col-md-2"><br/>
								<label>State</label>
							<br/><input required type="text" name="state_issued" style="width:100%; padding-bottom:4px; padding-top:4px; text-indent:10px;">
							
							</div>
							<div class="col-sm-2 col-md-2"><br/>
								<label>L.G.A</label>
							<br/><input required type="text" name="lga" style="width:100%; padding-bottom:4px; padding-top:4px; text-indent:10px;">
							
							</div>
							<div class="col-sm-2 col-md-2"><br/>
								<label>Passport</label>
							<br/><input required type="file" name="passport" style="width:100%; padding-bottom:7px; padding-top:7px; text-indent:10px;">
							</div>
							<div class="col-sm-2 col-md-2"><br/>
								<label>Signature</label>
							<br/><input required type="email" placeholder="email_address" name="signature" style="width:100%; padding-bottom:4px; padding-top:4px; text-indent:10px;">
							</div>
							<div class="col-sm-12 col-md-12">
								<label></label>
							<br/>
									<center>
									<input type="reload" class="btn btn-sm btn-warning" value="Refresh"/>
									<button class="btn btn-sm btn-primary" name="add_" title="click to add now"><i class="fa fa-plus"></i> add now</button></center>
							</div>
						</div>
					</form>
				
				</div>
			<!--- Add agent template Ends-->
						<?php
					}elseif($tab == "view_par" && !isset($_GET['edit'])){
						?>
						<!--- Manage agent  template-->
				<div class="jumbotron manage_agent">
					<?php
						//fetch Agents
							$fetch = $con -> prepare("SELECT * FROM staff ORDER BY ref DESC");
								if($fetch -> execute()){
									if($fetch -> rowCount() > 0){
										$fetch -> setFetchMode(PDO::FETCH_ASSOC);
											echo '<table class="table table-bordered table-light">
												<tr>
													<th>SN</th>
													<th>First Name</th>
													<th>Last Name</th>
													<th>Passport</th>
													<th>Date Issued</th>
													<th>NIN</th>
													<th>Action</th>
												</tr>
											';
											$sn = 0;
												while($row = $fetch -> fetch()){
													$sn ++;
													$ref = $row['ref'];
													$o_fname = $row['sname'];
													$o_lname = $row['oname'];
													$date_issued = $row['dated'];
													$o_passport = $row['passport'];
													$nin = $row['nin'];
														
													echo '<tr>
														<td>'.$sn.'</td>
														<td>'.$o_fname.'</td>
														<td>'.$o_lname.'</td>
														<td><img src="../citizens/'.$o_passport.'" class="img img-fluid" style="height:60px;"/></td>
														<td>'.$date_issued.'</td>
														<td>'.$nin.'</td>
														<td>
															<a href="javascript:void(null)" onclick="window.alert(\'Restricted, Admin only!!\')" class="btn  btn-sm btn-danger" style="cursor:no-drop;"><i class="fa fa-trash"></i></a>
															<a href="javascript:void(null)" onclick="window.alert(\'Restricted, Admin only!!\')" style="cursor:no-drop;" class="btn btn-sm btn-info"><i class="fa fa-pencil"></i> Edit</a>
															<a href="?tab=view_card&tracker='.$ref.'" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> view ID card</a>
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
					}elseif($tab == "mpress" && isset($_GET['search_key'])){
						 $search_parameter = $_GET['search_key'];
							$idesign_card = $con -> prepare("SELECT * FROM staff WHERE sname like ?");
								if($idesign_card -> execute(array("%".$search_parameter."%"))){
									if($idesign_card -> rowCount() > 0){
											echo "<span style='position:fixed;' class='badge badge-info'>".$idesign_card -> rowCount()." results found</span>";
										$idesign_card -> setFetchMode(PDO::FETCH_ASSOC);
										while($rte = $idesign_card -> fetch()){
												$reff = $rte['ref'];
												$sname = $rte['sname'];
												$oname = $rte['oname'];
												$sex = $rte['sex'];
												$dob = $rte['dob'];
												$pob = $rte['pob'];
												$cur_address = $rte['current_address'];
												$occupation = $rte['occupation'];
												$height = $rte['height'];
												$blood_group = $rte['blood_group'];
												$marital_status = $rte['marital_status'];
												$maiden_name = $rte['maiden_name'];
												$next_kin = $rte['next_kin'];
												$dated = $rte['dated'];
												$place = $rte['place'];
												$state = $rte['state'];
												$lga = $rte['lga'];
												$rc_num = $rte['rc_num'];
												$email_address = $rte['email_address'];
												$nin = $rte['nin'];
												$exp_date = $rte['exp_date'];
												$passport = $rte['passport'];
											
											?>
											
											<!--- ID card preview template-->
				<div class="jumbotron welcome" >
					
						<div class="row">
							<div class="col-sm-3 col-md-3 "></div>
							<div class="col-sm-6 col-md-6 bg-white" style="padding-left:46px; border:1px solid #000;">
								<b style="color:green; font-size:24px;">KWARA STATE POLYTECHNIC</b>
								<br/>
									<b>Official Identity Card</b><BR/>
								<br/>
								
								
								
									<div class="row" style="position:relative;">
											<div style="position:absolute;  left:19%; top:-35px; "><img style="height:300px; opacity:.3;" src="../gallery/coat.png" /></div>
										<div class="col-sm-3 col-md-3">
										<img src="../gallery/authentication.png" class="img img-fluid"/>
										</div>
										<div class="col-sm-3 col-md-3">
										<b style="color:grey; font-size:12px;">SURNAME</b><br/>
											<b style="font-size:20px;"><?php echo strtoupper($sname); ?></b><br/>
										<b style="color:grey; font-size:12px;">FIRST NAME</b><br/>
											<b style="font-size:20px;"><?php echo strtoupper($oname); ?></b><br/>
										<b style="color:grey; font-size:12px;">DATE OF BIRTH</b><br/>
											<b style="font-size:20px;"><?php echo strtoupper($dob); ?></b><br/>
										</div>
										<div class="col-sm-3  col-md-3">
											<br/><br/>
											<b style="color:grey; font-size:12px;">ISSUE DATE</b><br/>
												<b><?php echo $dated; ?></b><br/>
													<span class="badge">SEX: <?php echo $sex;?> ||
													HEIGHT: <?php echo $height;?></span>
										</div>
										<div class="col-sm-3  col-md-3">
											<img src="../citizens/<?php echo $passport;?>" style="border-radius:9px; width:100%;"  class="img img-fluid">
												<br/>
													<span style="font-size:12px;"><i><?php echo $email_address;?></i></span>
										</div>
										<div class="col-sm-2 col-md-2">
											<img src="../citizens/<?php echo $passport;?>" style="width:100%;"  class="img img-fluid">
										</div>
										<div class="col-sm-10 col-md-10">
											<b style="text-transform:uppercase; font-size:28px; letter-spacing:10px;"><?php echo $rc_num;?></b><br/>
												<img src="../gallery/NIMC1.jpg" style="height:70px;"/>
												Expiry: <b><?php echo $exp_date;?></b>
												&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;
												NIN : <b><?php echo $nin;?></b>
										</div>
									</div>
								
								
											
									
									
							</div>
							<div class="col-sm-3 col-md-3 "></div>
						</div>
						<hr/>
				</div>
			<!--- ID card preview  template Ends-->
											
											<?php
											
											
											
											
										}
									}else{
									echo "<span style='color:red;'> <i class='fa fa-warning'></i> Nothing found...</span>";
									}
								}else{
									echo "<span style='color:red;'> <i class='fa fa-times'></i> Runtime Error Occurred @ Card design...</span>";
								}
					}elseif($tab == "view_card" && isset($_GET['tracker'])){
						$tracker = preg_replace('/[^0-9]/',"",$_GET['tracker']);
							$idesign_card = $con -> prepare("SELECT * FROM staff WHERE ref = ?");
								if($idesign_card -> execute(array($tracker))){
									if($idesign_card -> rowCount() > 0){
										$idesign_card -> setFetchMode(PDO::FETCH_ASSOC);
										while($rte = $idesign_card -> fetch()){
												$reff = $rte['ref'];
												$sname = $rte['sname'];
												$oname = $rte['oname'];
												$sex = $rte['sex'];
												$dob = $rte['dob'];
												$pob = $rte['pob'];
												$cur_address = $rte['current_address'];
												$occupation = $rte['occupation'];
												$height = $rte['height'];
												$blood_group = $rte['blood_group'];
												$marital_status = $rte['marital_status'];
												$maiden_name = $rte['maiden_name'];
												$next_kin = $rte['next_kin'];
												$dated = $rte['dated'];
												$place = $rte['place'];
												$state = $rte['state'];
												$lga = $rte['lga'];
												$rc_num = $rte['rc_num'];
												$email_address = $rte['email_address'];
												$nin = $rte['nin'];
												$exp_date = $rte['exp_date'];
												$passport = $rte['passport'];
											
											?>
											
											<!--- ID card preview template-->
				<div class="jumbotron welcome" >
					
						<div class="row">
							<div class="col-sm-3 col-md-3 "></div>
							<div class="col-sm-6 col-md-6 bg-white" style="padding-left:46px; border:1px solid #000;">
								<b style="color:green; font-size:24px;">KWARA STATE POLYTECHNIC</b>
								<br/>
									<b>Official Identity Card</b><BR/>
								<br/>
								
								
								
									<div class="row" style="position:relative;">
											<div style="position:absolute;  left:19%; top:-35px; "><img style="height:300px; opacity:.3;" src="../gallery/coat.png" /></div>
										<div class="col-sm-3 col-md-3">
										<img src="../gallery/authentication.png" class="img img-fluid"/>
										</div>
										<div class="col-sm-3 col-md-3">
										<b style="color:grey; font-size:12px;">SURNAME</b><br/>
											<b style="font-size:20px;"><?php echo strtoupper($sname); ?></b><br/>
										<b style="color:grey; font-size:12px;">FIRST NAME</b><br/>
											<b style="font-size:20px;"><?php echo strtoupper($oname); ?></b><br/>
										<b style="color:grey; font-size:12px;">DATE OF BIRTH</b><br/>
											<b style="font-size:20px;"><?php echo strtoupper($dob); ?></b><br/>
										</div>
										<div class="col-sm-3  col-md-3">
											<br/><br/>
											<b style="color:grey; font-size:12px;">ISSUE DATE</b><br/>
												<b><?php echo $dated; ?></b><br/>
													<span class="badge">SEX: <?php echo $sex;?> ||
													HEIGHT: <?php echo $height;?></span>
										</div>
										<div class="col-sm-3  col-md-3">
											<img src="../citizens/<?php echo $passport;?>" style="border-radius:9px; width:100%;"  class="img img-fluid">
												<br/>
													<span style="font-size:12px;"><i><?php echo $email_address;?></i></span>
										</div>
										<div class="col-sm-2 col-md-2">
											<img src="../citizens/<?php echo $passport;?>" style="width:100%;"  class="img img-fluid">
										</div>
										<div class="col-sm-10 col-md-10">
											<b style="text-transform:uppercase; font-size:28px; letter-spacing:10px;"><?php echo $rc_num;?></b><br/>
												<img src="../gallery/NIMC1.jpg" style="height:70px;"/>
												Expiry: <b><?php echo $exp_date;?></b>
												&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;
												NIN : <b><?php echo $nin;?></b>
										</div>
									</div>
								
								
											
									
									
							</div>
							<div class="col-sm-3 col-md-3 "></div>
						</div>
						<hr/><button onclick="window.print()" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> print</button>
				</div>
			<!--- ID card preview  template Ends-->
											
											<?php
											
											
											
											
										}
									}else{
									echo "<span style='color:red;'> <i class='fa fa-warning'></i> Invalid Operation</span>";
									}
								}else{
									echo "<span style='color:red;'> <i class='fa fa-times'></i> Runtime Error Occurred @ Card design...</span>";
								}
							
					}elseif($tab === "view_log"){
						?>
						<!--- view log  template-->
				<div class="jumbotron view_log">View Log Template</div>
			<!--- view log template Ends-->
						<?php
					}elseif($tab === "compose"){
						?>
						<!--- view log  template-->
				<div class="jumbotron view_log" style="padding:10px;">
					<div class="row">
						<div class="col-sm-4 col-md-4"></div>
						<div class="col-sm-4 col-md-4 ">
							<?php
								if(isset($yummyError) && $yummyError !=""){
									echo "<div style='background:#fff;'>".$yummyError."</div>";
								}
							?>
							<form action="" method="post" enctype="multipart/form-data">
								<input name="ftitle" required type="text" placeholder="Enter File Title.." style="display:block; width:100%; padding:7px;"/><br/>
								<select name="fto" required style="display:block; width:100%; padding:7px;">
									<option value="">::File &rArr; to</option>
								<?php
									$fetch_deptOrder = $con -> prepare("SELECT * FROM xgenta WHERE dpt = ? AND role != ? AND ref != ?");
									if($fetch_deptOrder -> execute(array($_SESSION['dpt_090'],"none",$_SESSION['client_ref']))){
										if($fetch_deptOrder -> rowCount() > 0){
											echo "<optgroup label='Officers'>";
											$fetch_deptOrder -> setFetchMode(PDO::FETCH_ASSOC);
											while($row = $fetch_deptOrder -> fetch()){
													$ref = $row['ref'];
													$ufname = $row['fname'];
													$ulname = $row['lname'];
													$uemail = $row['email'];
													$rank = $row['rank'];
													$role = $row['role'];
													$rolej = $row['role_name'];
												echo '<option value="'.$ref.'">'.$ufname.' '.$ulname.' &rarr;'.$rolej.'</option>';
											}
											echo "</optgroup>";
										}else{
											echo "<option value=''>No Superior Assigned</option>";
										}
									}else{
										echo "ERROR OCCURRED WHILE FETCHING ROLE MATCH ...";
									}
								
								
								
								?>
								</select>
								<input name="ffile" id="attach" required type="file" style="opacity:0;"/>
								<textarea name="fcaption" required style="padding:5px; display:block; height:120px; resize:none; width:100%;" placeholder="File Caption Here..."></textarea><br/>
									<label for="attach" class="btn btn-sm btn-warning"><i class="fa fa-file"></i> Attachment </label> 
								<div style="float:right;">
									<button name="f_btn" class="btn btn-sm btn-primary"><i class="fa fa-check"></i> Submit</button>
								</div>
								
							</form>
						</div>
						<div class="col-sm-4 col-md-4"></div>
					</div>
					
				
				</div>
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
									if(isset($cryout) && $cryout !=""){
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
					}elseif($tab === "4wod" && $_GET['track']){
						?>
						
								<div class="jumbotron welcome" style="text-align:center;">
									<b>Forward the File to:</b><br/><br/>
									<form action="" method="POST">
											
											<select name="where" required>
												<option value="">choose recipient</option>
												<?php
									$fetch_deptOrder = $con -> prepare("SELECT * FROM xgenta WHERE dpt = ? OR role != ? OR ref != ?");
									if($fetch_deptOrder -> execute(array($_SESSION['dpt_090'],"none",$_SESSION['client_ref']))){
										if($fetch_deptOrder -> rowCount() > 0){
											echo "<optgroup label='Officers'>";
											$fetch_deptOrder -> setFetchMode(PDO::FETCH_ASSOC);
											while($row = $fetch_deptOrder -> fetch()){
													$ref = $row['ref'];
													$ufname = $row['fname'];
													$ulname = $row['lname'];
													$uemail = $row['email'];
													$rank = $row['rank'];
													$role = $row['role'];
													$rolej = $row['role_name'];
												echo '<option value="'.$ref.'">'.$ufname.' '.$ulname.' &rarr;'.$rolej.'</option>';
											}
											echo "</optgroup>";
										}else{
											echo "<option value=''>No Superior Assigned</option>";
										}
									}else{
										echo "ERROR OCCURRED WHILE FETCHING ROLE MATCH ...";
									}
								
								
								
								?>
											</select>
										<button name="4word_btn" class="btn btn-sm btn-success"><i class="fa fa-check"></i> forward</button>
										
									</form>
								</div>
						
						<?php
					}elseif($tab === "track_file"){
						
						?>
						<div class="jumbotron welcome" style="text-align:center;">
						
							<?php
								$fetch_filesMi = $con -> prepare("SELECT * FROM files_x WHERE ffrom = ?");
								$fetch_filesMi -> execute(array($_SESSION['client_ref']));
								if($fetch_filesMi -> rowCount() > 0){
										echo "<table class=\"table table-bordered table-light table-striped\">
											<tr>
												<th>S/N</th>
												<th>Title</th>
												<th>To</th>
												<th><i class='fa fa-calendar'></i> Dated</th>
												<th><i class='fa fa-file'></i> File Type</th>
												<th><i class='fa fa-key'></i> File Code</th>
												<th><i class='fa fa-bolt'></i> Status</th>
												<th><i class='fa fa-cog'></i> Action</th>
											</tr>
										
										";
										$sn = 0;
									$fetch_filesMi -> setFetchMode(PDO::FETCH_ASSOC);
									$ffile_type = "";
									$file_icon ="";
									while($ring = $fetch_filesMi -> fetch()){
										$sn +=1;
										$fref = $ring['ref'];
										$f_title = $ring['ftitle'];
										$f_caption = $ring['fcaption'];
										$f_date = $ring['fdate'];
										$f_file = $ring['ffile'];
										$f_filetype = $ring['ffile_type'];
										$f_filecode = $ring['ffile_code'];
										$f_from = $ring['ffrom'];
										$f_to = $ring['fto'];
										$f_where = $ring['fwhere'];
										$f_seen = $ring['fseen'];
										$f_workedon = $ring['fworkedon'];
										$f_status = $ring['fstatus'];
										
											//fetch To
											
												$fetch_from = $con -> prepare("SELECT * FROM xgenta WHERE ref = ?");
												$fetch_from -> execute(array($f_to));
												$fetch_from -> setFetchMode(PDO::FETCH_ASSOC);
												while($rrr = $fetch_from -> fetch()){
													$ddfname = $rrr['fname'];
													$ddlname = $rrr['lname'];
													
												}
										
									
									switch($f_filetype){
									case "jpg": $ffile_type = "Image File : JPG";
												$file_icon = "<i class='fa fa-image-o'></i>";
									break;
									case "png": $ffile_type = "Image File : PNG";
									break;
									case "docx": $ffile_type = "Word Document";
												 $file_icon = "<i style='color:blue; background:white; padding:2px; border-radius:2px; font-size:24px;' class='fa fa-file-word-o'></i>";
									break;
									case "pdf": $ffile_type = "PDF File";
												$file_icon = "<i style='color:red; background:white; padding:2px; border-radius:2px;  font-size:20px;' class='fa fa-file-pdf-o'></i>";
												break;
									case "csv": $ffile_type = "Spreadsheet";
												$file_icon = "<i style='color:green; background:white; padding:2px; border-radius:2px;  font-size:20px;' class='fa fa-file-excel-o'></i>";
												break;
									case "zip": $ffile_type = "Zipped File";
												$file_icon = "<i style='color:red; background:white; padding:2px; border-radius:2px;  font-size:20px;' class='fa fa-file-zip-o'></i>";
												break;
									default: 
												$ffile_type = "";
												$file_icon = "";
									}
							
												$status_appr = $btn_action = "";
										
											if($f_status == 200){
												$status_appr = '<span class="text-success"><i class="fa fa-check"></i>  approved </span>';
												$btn_action = '<a href="files/'.$f_file.'" class="btn btn-sm btn-info"><i class="fa fa-eye"></i>  open </a>';
											}elseif($f_status == 02){
												$btn_action = '<a href="files/'.$f_file.'" class="btn disabled btn-sm btn-info"><i class="fa fa-eye"></i>  open </a>';
												$status_appr = '<span class="text-danger"><i class="fa fa-times"></i>  declined </span>';
												
											}elseif($f_status == 600){
												$btn_action = '<a href="files/'.$f_file.'" class="btn disabled btn-sm btn-info"><i class="fa fa-eye"></i>  open </a>';
												$status_appr = '<span class="text-primary"><i class="fa fa-arrow-right"></i>  forwarded </span>';
												
											}else{
												
												$btn_action = '<a href="files/'.$f_file.'" class="btn disabled btn-sm btn-info"><i class="fa fa-eye"></i>  open </a>';
												$status_appr = '<span class="text-warning"><i class="fa fa-spinner"></i>  pending </span>';
												
											}
											
											
											
											echo '
											<tr>
												<td>'.$sn.'</td>
												<td>'.$f_title.'</td>
												 <td>'.$ddfname." ".$ddlname.'</td>
												<td>'.$f_date.'</td>
												<td style="text-align:left;">'.$file_icon." ".$ffile_type.'</td>
												<td>'.$f_filecode.'</td>
												<td>
													'.$status_appr.'
													
												</td>
												<td>
													'.$btn_action.'
												
												</td>
											</tr>';
										
										
										}
										echo "</table>";
								}else{
									
									echo "<span style=\"color:#f00;\">No Files Found</span>";
								}
							
							?>
							
						</div>
						
						<?php
						
					}elseif($tab === "treat_files"){
						
						?>
						<div class="jumbotron welcome" style="text-align:center;">
						
							<?php
								$fetch_filesMi = $con -> prepare("SELECT * FROM files_x WHERE fto = ? AND fstatus != ?");
								$fetch_filesMi -> execute(array($_SESSION['client_ref'], 02));
								if($fetch_filesMi -> rowCount() > 0){
										echo "<table class=\"table table-bordered table-dark\">
											<tr>
												<th>S/N</th>
												<th>Title</th>
												<th>From</th>
												<th><i class='fa fa-calendar'></i> Dated</th>
												<th><i class='fa fa-file'></i> File Type</th>
												<th><i class='fa fa-key'></i> File Code</th>
												<th><i class='fa fa-cogs'></i> Actions</th>
											</tr>
										
										";
										$sn = 0;
									$fetch_filesMi -> setFetchMode(PDO::FETCH_ASSOC);
									$ffile_type = "";
									$file_icon ="";
									while($ring = $fetch_filesMi -> fetch()){
										$sn +=1;
										$fref = $ring['ref'];
										$f_title = $ring['ftitle'];
										$f_caption = $ring['fcaption'];
										$f_date = $ring['fdate'];
										$f_file = $ring['ffile'];
										$f_filetype = $ring['ffile_type'];
										$f_filecode = $ring['ffile_code'];
										$f_from = $ring['ffrom'];
										$f_to = $ring['fto'];
										$f_where = $ring['fwhere'];
										$f_seen = $ring['fseen'];
										$f_workedon = $ring['fworkedon'];
										$f_status = $ring['fstatus'];
										
											//fetch From
											
												$fetch_from = $con -> prepare("SELECT * FROM xgenta WHERE ref = ?");
												$fetch_from -> execute(array($f_from));
												$fetch_from -> setFetchMode(PDO::FETCH_ASSOC);
												while($rrr = $fetch_from -> fetch()){
													$ddfname = $rrr['fname'];
													$ddlname = $rrr['lname'];
													
												}
										
									
									switch($f_filetype){
									case "jpg": $ffile_type = "Image File : JPG";
												$file_icon = "<i class='fa fa-image-o'></i>";
									break;
									case "png": $ffile_type = "Image File : PNG";
									break;
									case "docx": $ffile_type = "Word Document";
												 $file_icon = "<i style='color:blue; background:white; padding:2px; border-radius:2px; font-size:24px;' class='fa fa-file-word-o'></i>";
									break;
									case "pdf": $ffile_type = "PDF File";
												$file_icon = "<i style='color:red; background:white; padding:2px; border-radius:2px;  font-size:20px;' class='fa fa-file-pdf-o'></i>";
												break;
									case "csv": $ffile_type = "Spreadsheet";
												$file_icon = "<i style='color:green; background:white; padding:2px; border-radius:2px;  font-size:20px;' class='fa fa-file-excel-o'></i>";
												break;
									case "zip": $ffile_type = "Zipped File";
												$file_icon = "<i style='color:red; background:white; padding:2px; border-radius:2px;  font-size:20px;' class='fa fa-file-zip-o'></i>";
												break;
									default: 
												$ffile_type = "";
												$file_icon = "";
									}
							
												$btn_appr = "";
										
											if($f_status == 200){
												$btn_appr = '<a href="dec.php?xref='.$fref.'" class="btn btn-sm btn-primary disabled"><i class="fa fa-check"></i>  approved </a>';
											}else{
												$btn_appr = '<a href="dec.php?xref='.$fref.'" class="btn btn-sm btn-primary"><i class="fa fa-check"></i>  approve </a>';
												
											}
											
											
											
											echo '
											<tr>
												<td>'.$sn.'</td>
												<td>'.$f_title.'</td>
												<td>'.$ddfname." ".$ddlname.'</td>
												<td>'.$f_date.'</td>
												<td style="text-align:left;">'.$file_icon." ".$ffile_type.'</td>
												<td>'.$f_filecode.'</td>
												<td>
													<a href="files/'.$f_file.'" class="btn btn-sm btn-info"><i class="fa fa-eye"></i>  open </a>
													<a href="dec.php?dref='.$fref.'" class="btn btn-sm btn-danger"><i class="fa fa-times"></i>  decline </a>
													'.$btn_appr.'
													<a href="?tab=4wod&track='.$fref.'" class="btn btn-sm btn-success"> <i class="fa fa-arrow-right"></i> forward </a>
												
												</td>
											</tr>';
										
										
										}
										echo "</table>";
								}else{
									
									echo "<span style=\"color:#f00;\">No Files Found</span>";
								}
							
							?>
							
						</div>
						<?php
						
					}
					
				}else{
					
					
					
					if(isset($_GET['track_input'])){
						$token = $_GET['track_input'];
						?>
						
				<div class="jumbotron" style="text-align:center; padding:5px;">
					
					<?php
						if(!is_numeric($token)){
							echo "<span style='color:red;'>INVALID FILE CODE</span>";
							
						}else{
							//fetch
							
							$fetch_track = $con -> prepare("SELECT * FROM tracker_o WHERE file_code = ?");
								if($fetch_track -> execute(array($token))){
									if($fetch_track -> rowCount() > 0){
											echo "<h3>Track Info (<b>".$token."</b>) <button class='btn btn-sm btn-primary text-light' onclick='window.print()'><i class='fa fa-print'></i> print</button>.</h3>";
											echo "<table class='table table-striped table-light'>";
												echo "
													<tr>
														<th>S/N</th>
														<th><i class='fa fa-file-o'></i> File Type</th>
														<th><i class='fa fa-bolt'></i> Started By</th>
														<th><i class='fa fa-history'></i> Status</th>
														<th><i class='fa fa-calendar'></i> Dated</th>
														<th><i class='fa fa-clock-o'></i> Time</th>
														<th><i class='fa fa-pencil-square-o'></i> Treated By</th>
														<th><i class='fa fa-refresh'></i> Moved To</th>
													</tr>
												";
										$fetch_track -> setFetchMode(PDO::FETCH_ASSOC);
										$sn = 0;
										$ffile_type = $file_icon = $fstarter = $ftreated = $fmovedto = "";
											while($rowv = $fetch_track -> fetch()){
												$sn +=1;
												$xref = $rowv['ref'];
												$xfcode = $rowv['file_code'];
												$xftype = $rowv['file_type'];
												$xfby = $rowv['file_by'];
												$xfto = $rowv['file_to'];
												$xfwkdby = $rowv['worked_by'];
												$xfdate = $rowv['worked_date'];
												$xftime = $rowv['worked_time'];
												$xfstatus = $rowv['worked_status'];
												
													
														// Fetch Started By Start
														
														$fetch_starter = $con -> prepare("SELECT * FROM xgenta WHERE ref = ?");
														$fetch_starter -> execute(array($xfby));
														$fetch_starter -> setFetchMode(PDO::FETCH_ASSOC);
														while($tat = $fetch_starter -> fetch()){
															$fnameStarter = $tat['fname'];
															$lnameStarter = $tat['lname'];
														}
														// Fetch Started By End
															if($xfwkdby !="none"){
														// Fetch Treated By Start
														$fetch_treated = $con -> prepare("SELECT * FROM xgenta WHERE ref = ?");
														$fetch_treated -> execute(array($xfwkdby));
														$fetch_treated -> setFetchMode(PDO::FETCH_ASSOC);
														while($tait = $fetch_treated -> fetch()){
															$role_T = $tait['role_name'];
																$ftreated = $role_T;
														}
														// Fetch Treated By End
															}else{
																$ftreated = "none";
															}
															
															
															if($xfto !="none"){
																// Fetch MovedTo  Start
														$fetch_moved = $con -> prepare("SELECT * FROM xgenta WHERE ref = ?");
														$fetch_moved -> execute(array($xfto));
														$fetch_moved -> setFetchMode(PDO::FETCH_ASSOC);
														while($taot = $fetch_moved -> fetch()){
															$roleN = $taot['role_name'];
															$fmovedto = $roleN;
														}
														// Fetch MovedTo  End
																
															}else{
																$fmovedto = "none";
															}
														
													
														switch($xftype){
									case "jpg": $ffile_type = "Image File : JPG";
												$file_icon = "<i class='fa fa-image-o'></i>";
									break;
									case "png": $ffile_type = "Image File : PNG";
									break;
									case "docx": $ffile_type = "Word Document";
												 $file_icon = "<i style='color:blue; background:white; padding:2px; border-radius:2px; font-size:24px;' class='fa fa-file-word-o'></i>";
									break;
									case "pdf": $ffile_type = "PDF File";
												$file_icon = "<i style='color:red; background:white; padding:2px; border-radius:2px;  font-size:20px;' class='fa fa-file-pdf-o'></i>";
												break;
									case "csv": $ffile_type = "Spreadsheet";
												$file_icon = "<i style='color:green; background:white; padding:2px; border-radius:2px;  font-size:20px;' class='fa fa-file-excel-o'></i>";
												break;
									case "zip": $ffile_type = "Zipped File";
												$file_icon = "<i style='color:red; background:white; padding:2px; border-radius:2px;  font-size:20px;' class='fa fa-file-zip-o'></i>";
												break;
									default: 
												$ffile_type = "";
												$file_icon = "";
									}
							
												$status_appr  = "";
										
											if($xfstatus == 200){
												$status_appr = '<span class="text-success"><i class="fa fa-check"></i>  approved </span>';
												}elseif($xfstatus == 02){
												$status_appr = '<span class="text-danger"><i class="fa fa-times"></i>  declined </span>';
												
											}elseif($xfstatus == 600){
												$status_appr = '<span class="text-primary"><i class="fa fa-arrow-right"></i>  forwarded </span>';
												
											}else{
												
												$status_appr = '<span class="text-warning"><i class="fa fa-spinner"></i>  pending </span>';
												
											}
											
													
													
												echo "<tr>
															<td>".$sn."</td>
															<td style='text-align:left;'> ".$file_icon." ".$ffile_type."</td>
															<td>".$fnameStarter." ".$lnameStarter."</td>
															<td> ".$status_appr."</td>
															<td > ".$xfdate."</td>
															<td > ".$xftime."</td>
															<td > ".$ftreated."</td>
															<td > ".$fmovedto."</td>
													
												
												</tr>";
												
											}
											echo "</table>";
										
									}else{
							echo "<span style='color:red;'>INVALID FILE CODE</span>";
									}
									
									
									
								}else{
							echo "<span style='color:red;'>Error Occurred</span>";
									
									
								}
						}
					
					
					?>
					
					
				</div>
						<?php
						
					}else{
						
						
					
					
					
					?>
					<!--- Welcome template-->
				<div class="jumbotron welcome" style="text-align:center;">
					Welcome to the E-Office staff operation module.
						<br/>
						Below are the key functions you can make via this console.<hr/>
							<ul>
								<li>Create and Manage Files.</li>
								<li>Receive and Sort Notifications.</li>
								<li>Track and Search Files.</li>
								
							</ul><br/>
								<span class="badge badge-pill badge-success">Use the buttons at the top of the display !!!!</span>
				</div>
			<!--- Welcome template Ends-->
					<?php
				}
				}
				
			?>
			
			
			
			
			
			
			
		</div>
		<div class="col-sm-4 col-md-4"></div>
		<div class="col-sm-4 col-md-4 bg-info" style="padding:8px; text-align:center; border-radius:5px;">
			<form action="" method="get" style="display:inline-block;">
							<input type="text" name="track_input" placeholder="track-fast" style="width:85px; padding:2px;"/><br/>
							
								
								
						</form>
			
			<?php
			
				
	//fetch User Details
	$fetch_drg = $con -> prepare("SELECT * FROM xgenta WHERE ref = ?");
	$fetch_drg -> execute(array($_SESSION['client_ref']));
		$fetch_drg -> setFetchMode(PDO::FETCH_ASSOC);
		while($rte = $fetch_drg -> fetch()){
			$refU = $rte['ref'];
			$fnameU = $rte['fname'];
			$lnameU = $rte['lname'];
			$emailU = $rte['email'];
			$roleU = $rte['role'];
			$rankU = $rte['rank'];
			$deptU = $rte['dpt'];
			
			
		}
	
				if($roleU != "none"){
					?>
					||
							&nbsp;&nbsp;
							<a href="?tab=treat_files" class="btn btn-sm btn-danger"><i class="fa fa-file-o"></i> Treat Files</a>
							<a href="?tab=treat_files" class="btn btn-sm btn-light"><i class="fa fa-file-o"></i> Treat Files</a>
						
					<?php
				}
			
			
			?>
		</div>
		<div class="col-sm-3 col-md-3"></div>
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