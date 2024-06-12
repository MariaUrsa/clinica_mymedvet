<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{

if(isset($_POST['submit']))
{	
	$docid=$_SESSION['id'];
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
$sql=mysqli_query($con,"insert into tblpatient(VetDocid,PatientName,PatientRECS,PatientOwnerName,PatientOwnerCNP,PatientOwnerPhoneNumber,PatientOwnerEmail,PatientSpecies,PatientGender,PatientAddress,PatientAge,PatientMedhis) values('$docid','$patname','$patrecs','$patownername','$patownercnp','$patownerphoneno','$patowneremail','$patspecies','$gender','$pataddress','$patage','$medhis')");
if($sql)
{
echo "<script>alert('Informații despre pacient adăugate cu succes');</script>";
echo "<script>window.location.href ='manage-patient.php'</script>";

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

	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#patowneremail").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
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
<h1 class="mainTitle">Client Pacient | Adaugă Pacient </h1>
</div>
<ol class="breadcrumb">
<li>
<span>Pacient</span>
</li>
<li class="active">
<span>Adaugă Pacient </span>
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

<div class="form-group">
<label for="doctorname">
Nume Pacient 
</label>
<input type="text" name="patname" class="form-control"  placeholder="Introduceți Numele Pacientului" required="true">
</div>
<div class="form-group">
<label for="doctorname">
RECS Pacient  
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
<input type="email" id="patowneremail" name="patowneremail" class="form-control"  placeholder="Introduceți E-mailul Proprietarului Pacientlui" required="true" onBlur="userAvailability()">
<span id="user-availability-status1" style="font-size:12px;">
</span>
<div class="form-group">
<label for="fess">
Specie (Rasă) Pacient
</label>
<input type="text" name="patspecies" class="form-control"  placeholder="Introduceți Specia (Rasa) Pacientului" required="true">
</div>
</div>
<div class="form-group">
<label class="block">
Gen Pacient  
</label>
<div class="clip-radio radio-primary">
<input type="radio" id="rg-female" name="gender" value="female" >
<label for="rg-female">
Femelă
</label>
<input type="radio" id="rg-male" name="gender" value="male">
<label for="rg-male">
Mascul
</label>
</div>
<div class="form-group">
<label for="address">
Adresă Pacient 
</label>
<textarea name="pataddress" class="form-control"  placeholder="Introduceți Adresă Pacient" required="true"></textarea>
</div>
<div class="form-group">
<label for="fess">
Vârstă Pacient 
</label>
<input type="text" name="patage" class="form-control"  placeholder="Introduceți Vârstă Pacient" required="true">
</div>
<div class="form-group">
<label for="fess">
Istoric Medical
</label>
<textarea type="text" name="medhis" class="form-control"  placeholder="Introduceți Istoric Medical(dacă există)" required="true"></textarea>
</div>	

<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
Adaugă
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
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
<?php } ?>
