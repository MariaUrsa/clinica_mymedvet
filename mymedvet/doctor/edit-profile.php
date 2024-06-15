<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
	$docspecialization=$_POST['Docspecialization'];
$docname=$_POST['docname'];
$docaddress=$_POST['clinicaddress'];
$docfees=$_POST['docfees'];
$docphoneNumber=$_POST['docphoneNumber'];
$docemail=$_POST['docemail'];
$sql=mysqli_query($con,"update vetdoc set specialization='$docspecialization',vetdocName='$docname',address='$docaddress',vetdocFees='$docfees',phoneNumber='$docphoneNumber',vetdocEmail='$docemail' where id='".$_SESSION['id']."'");
if($sql)
{
echo "<script>alert('Detaliile medicului veterinar au fost actualizate cu succes');</script>";

}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor Veterinar | Editare Doctor Veterinar Detalii</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="customstyle/css/styles.css">
		<link rel="stylesheet" href="customstyle/css/plugins.css">
		<link rel="stylesheet" href="customstyle/css/themes/theme-1.css" id="skin_color" />


	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
				<?php include('include/header.php');?>
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Doctor Veterinar | Editare Doctor Veterinar Detalii</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Doctor Veterinar</span>
									</li>
									<li class="active">
										<span>Editare Doctor Veterinar Detalii</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Editare Doctor Veterinar</h5>
												</div>
												<div class="panel-body">
									<?php 
$did=$_SESSION['dlogin'];
$sql=mysqli_query($con,"select * from vetdoc where vetdocEmail='$did'");
while($data=mysqli_fetch_array($sql))
{
?>
<h4>Profil<?php echo htmlentities($data['vetdocName']);?> </h4>
<p><b>Profil Dată Înregistrare: </b><?php echo htmlentities($data['createDate']);?></p>
<?php if($data['updateDate']){?>
<p><b>Data ultimei actualizări a profilului: </b><?php echo htmlentities($data['updateDate']);?></p>
<?php } ?>
<hr />
													<form role="form" name="adddoc" method="post" onSubmit="return valid();">
														<div class="form-group">
															<label for="DoctorSpecialization">
															Specializare Doctor Veterinar
															</label>
							<select name="Docspecialization" class="form-control" required="required">
					<option value="<?php echo htmlentities($data['specialization']);?>">
					<?php echo htmlentities($data['specialization']);?></option>
<?php $ret=mysqli_query($con,"select * from vetdocspecialization");
while($row=mysqli_fetch_array($ret))
{
?>
																<option value="<?php echo htmlentities($row['specialization']);?>">
																	<?php echo htmlentities($row['specialization']);?>
																</option>
																<?php } ?>
																
															</select>
														</div>

<div class="form-group">
															<label for="doctorname">
																 Nume Doctor Veterinar
															</label>
	<input type="text" name="docname" class="form-control" value="<?php echo htmlentities($data['vetdocName']);?>" >
														</div>


<div class="form-group">
															<label for="address">
																Adresă Clinică Doctor Veterinar 
															</label>
					<textarea name="clinicaddress" class="form-control"><?php echo htmlentities($data['address']);?></textarea>
														</div>
<div class="form-group">
															<label for="fess">
																Taxă Consultație Doctor Veterinar
															</label>
		<input type="text" name="docfees" class="form-control" required="required"  value="<?php echo htmlentities($data['vetdocFees']);?>" >
														</div>
	
<div class="form-group">
									<label for="fess">
																Număr Telefon Doctor Veterinar
															</label>
					<input type="text" name="docphoneno" class="form-control" required="required"  value="<?php echo htmlentities($data['phoneNumber']);?>">
														</div>

<div class="form-group">
									<label for="fess">
																 E-mail Doctor Veterinar 
															</label>
					<input type="email" name="docemail" class="form-control"  readonly="readonly"  value="<?php echo htmlentities($data['vetdocEmail']);?>">
														</div>



														
														<?php } ?>
														
														
														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Actualizare
														</button>
													</form>
												</div>
											</div>
										</div>
											
											</div>
										</div>
									
								</div>
							
						<!-- end: BASIC EXAMPLE -->
			
					
					
						
						
					
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="customstyle/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="customstyle/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		
	</body>
</html>
<?php } ?>
