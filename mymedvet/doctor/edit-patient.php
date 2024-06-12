<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{

if(isset($_POST['submit']))
{	
	$eid=$_GET['editid'];
	$patname=$_POST['patname'];
$patrecs=$_POST['patrecs'];
$patownername=$_POST['patownername'];
$patownercnp=$_POST['patownercnp'];
$patownerphoneno=$_POST['patownerphoneno'];
$patowneremail=$_POST['patowneremail'];
$patspecies=$_POST['patspecies'];
$gender=$_POST['gender'];
$pataddress=$_POST['pataddress'];
$patage=$_POST['patage'];
$medhis=$_POST['medhis'];
$sql=mysqli_query($con,"update tblpatient set PatientName='$patname',PatientRECS='$patrecs',PatientOwnerName='$patownername',PatientOwnerCNP='$patownercnp,'PatientOwnerPhoneNumber='$patownerphoneno','PatientOwnerEmail='$patowneremail',PatientSpecies='$patspecies'PatientGender='$gender',PatientAddress='$pataddress',PatientAge='$patage',PatientMedhis='$medhis' where ID='$eid'");
if($sql)
{
echo "<script>alert('Informații despre pacient au fost actualizate cu succes');</script>";
header('location:manage-patient.php');

}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor Veterinar | Adaugă Pacient</title>
		
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
<h1 class="mainTitle">Pacient | Adaugă Pacient</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Pacient</span>
</li>
<li class="active">
<span>Adaugă Pacient</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<div class="row margin-top-30">
<div class="col-lg-8 col-md-12">
<div class="panel panel-white">
<div class="panel-heading">
<h5 class="panel-title">Adaugă Pacient</h5>
</div>
<div class="panel-body">
<form role="form" name="" method="post">
<?php
 $eid=$_GET['editid'];
$ret=mysqli_query($con,"select * from tblpatient where ID='$eid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
<div class="form-group">
<label for="doctorname">
Nume Pacient 
</label>
<input type="text" name="patname" class="form-control"  value="<?php  echo $row['PatientName'];?>" required="true">
</div>
<div class="form-group">
<label for="doctorname">
Pacient RECS 
</label>
<input type="text" name="patrecs" class="form-control"  placeholder="Introduceți RECS-ul Pacientului" required="true" maxlength="15" pattern="[0-9]+">
</div>
<div class="form-group">
<label for="doctorname">
Nume Proprietar 
</label>
<input type="text" name="patownername" class="form-control"  placeholder="Introduceți Numele Proprietarului" required="true">
</div>
<div class="form-group">
<label for="fess">
CNP Proprietar 
</label>
<input type="text" name="patownercnp" class="form-control"  placeholder="Introduceți CNP Proprietar" required="true" maxlength="13" pattern="[0-9]+">
</div>
<div class="form-group">
<label for="fess">
Număr Telefon Proprietar 
</label>
<input type="text" name="patownerphoneno" class="form-control"  placeholder="Introduceți Număr Telefon Proprietar" required="true">
</div>
<div class="form-group">
<label for="fess">
E-mail Proprietar
</label>
<input type="email" id="patowneremail" name="patowneremail" class="form-control"  value="<?php  echo $row['PatientOwnerEmail'];?>" readonly='true'>
<span id="email-availability-status"></span>
</div>
<div class="form-group">
              <label class="control-label">Pacient Gen: </label>
              <?php  if($row['Gender']=="Female"){ ?>
              <input type="radio" name="gender" id="gender" value="Female" checked="true">Femelă
              <input type="radio" name="gender" id="gender" value="male">Mascul
              <?php } else { ?>
              <label>
              <input type="radio" name="gender" id="gender" value="Male" checked="true">Mascul
              <input type="radio" name="gender" id="gender" value="Female">Femelă
              </label>
             <?php } ?>
            </div>
<div class="form-group">
<label for="address">
Adresă Pacient 
</label>
<textarea name="pataddress" class="form-control" required="true"><?php  echo $row['PatientAddress'];?></textarea>
</div>
<div class="form-group">
<label for="fess">
Vârstă Pacient 
</label>
<input type="text" name="patage" class="form-control"  value="<?php  echo $row['PatientAge'];?>" required="true">
</div>
<div class="form-group">
<label for="fess">
Istoric Medical
</label>
<textarea type="text" name="medhis" class="form-control"  placeholder="Introduceți Istoricul Medical(dacă există)" required="true"><?php  echo $row['PatientMedhis'];?></textarea>
</div>	
<div class="form-group">
<label for="fess">
Dată Creare
</label>
<input type="text" class="form-control"  value="<?php  echo $row['CreateDate'];?>" readonly='true'>
</div>
<?php } ?>
<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
Actualizare
</button>
</form>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-12 col-md-12">
<div class="panel panel-white">
</div>
</div>
</div>
</div>
</div>
</div>				
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
