<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
    
    $vid=$_GET['viewid'];
    $pl=$_POST['pl'];
    $br=$_POST['br'];
    $weight=$_POST['weight'];
    $temp=$_POST['temp'];
   $pres=$_POST['pres'];
   
 
      $query.=mysqli_query($con, "insert   tblmedicalhistory(PatientID,Pulse,Breathe,Weight,Temperature,MedicalPres)value('$vid','$pl','$br','$weight','$temp','$pres')");
    if ($query) {
    echo '<script>alert("A fost adăugat istoricul medical.")</script>';
    echo "<script>window.location.href ='manage-patient.php'</script>";
  }
  else
    {
      echo '<script>alert("Ceva nu a mers bine. Vă rugăm să încercați din nou.")</script>';
    }

  
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor Veterinar | Administrare Pacienți</title>
		
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
<h1 class="mainTitle">Doctor Veterinar | Administrare Pacienți</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Doctor Veterinar</span>
</li>
<li class="active">
<span>Administrare Pacienți</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15">Administrare <span class="text-bold">Pacienți</span></h5>

<ul class="col-lg-4 col-md-6">
  <p>Semne vitale normale câini:</p>
  <li>temperatura           38 - 39</li>
  <li>respiratie (resp/min) 10 - 40</li>
  <li>pulsul (bătăi/min)    70 - 120</li>
</ul>

<ul class="col-lg-4 col-md-6">
<p>Semne vitale normale pisici:</p>
  <li>temperatura           37,8 - 39,2</li>
  <li>respiratie (resp/min) 20 - 30</li>
  <li>pulsul (bătăi/min)    140 - 240</li>
</ul>


<?php
                               $vid=$_GET['viewid'];
                               $ret=mysqli_query($con,"select * from tblpatient where ID='$vid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
                               ?>
<table border="1" class="table table-bordered">
 <tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
 Pacient Detalii</td></tr>

    <tr>
    <th scope>Nume Pacient</th>
    <td><?php  echo $row['PatientName'];?></td>
    <th scope>E-mail Proprietar</th>
    <td><?php  echo $row['PatientOwnerEmail'];?></td>
  </tr>
  <tr>
    <th scope>Număr Telefon Proprietar</th>
    <td><?php  echo $row['PatientOwnerPhoneNumber'];?></td>
    <th>Adresă Pacient </th>
    <td><?php  echo $row['PatientAddress'];?></td>
  </tr>
    <tr>
    <th>Gen Pacient</th>
    <td><?php  echo $row['PatientGender'];?></td>
    <th>Vârstă Pacient</th>
    <td><?php  echo $row['PatientAge'];?></td>
  </tr>
  <tr>
    
    <th>Istoric Medical Pacient(dacă există)</th>
    <td><?php  echo $row['PatientMedhis'];?></td>
     <th>Dată Înregistrare Pacient</th>
    <td><?php  echo $row['CreateDate'];?></td>
  </tr>
 
<?php }?>
</table>
<?php  

$ret=mysqli_query($con,"select * from tblmedicalhistory  where PatientID='$vid'");



 ?>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr align="center">
   <th colspan="8" >Istoric Medical</th> 
  </tr>
  <tr>
    <th>#</th>
<th>Puls</th>
<th>Greutate</th>
<th>Respirație</th>
<th>Temperatură corporală</th>
<th>Prescripție Medicală</th>
<th>Dată Vizită</th>
</tr>
<?php  
while ($row=mysqli_fetch_array($ret)) { 
  ?>
<tr>
  <td><?php echo $cnt;?></td>
 <td><?php  echo $row['Pulse'];?></td>
 <td><?php  echo $row['Weight'];?></td>
 <td><?php  echo $row['Breathe'];?></td> 
  <td><?php  echo $row['Temperature'];?></td>
  <td><?php  echo $row['MedicalPres'];?></td>
  <td><?php  echo $row['CreateDate'];?></td> 
</tr>
<?php $cnt=$cnt+1;} ?>
</table>

<p align="center">                            
 <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Adaugă Istoric Medical</button></p>  

<?php  ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Adaugă Istoric Medical</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <table class="table table-bordered table-hover data-tables">

                                 <form method="post" name="submit">

      <tr>
    <th>Puls:</th>
    <td>
    <input name="pl" placeholder="Puls" class="form-control wd-450" required="true"></td>
  </tr>                          
     <tr>
    <th>Respirație :</th>
    <td>
    <input name="bs" placeholder="Respirație" class="form-control wd-450" required="true"></td>
  </tr> 
  <tr>
    <th>Greutate :</th>
    <td>
    <input name="weight" placeholder="Greutate" class="form-control wd-450" required="true"></td>
  </tr>
  <tr>
    <th>Temperatură corporală :</th>
    <td>
    <input name="temp" placeholder="Temperatura" class="form-control wd-450" required="true"></td>
  </tr>
                         
     <tr>
    <th>Prescripție medicală :</th>
    <td>
    <textarea name="pres" placeholder="Prescripție medicală" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr>  
   
</table>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Închide</button>
 <button type="submit" name="submit" class="btn btn-primary">Trimite</button>
  
  </form>
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
<?php }  ?>
