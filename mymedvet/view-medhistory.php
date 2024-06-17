<?php

// Începe o sesiune nouă sau reia o sesiune existentă
session_start();

// Dezactivează raportarea erorilor
error_reporting(0);

// Include fișierul de configurare, care conține detalii despre baza de date și alte setări
include('include/config.php');

// Include fișierul pentru verificarea autentificării utilizatorului
include('include/checklogin.php');

// Apelul funcției pentru verificarea autentificării utilizatorului
check_login();

// Verifică dacă cererea a fost trimisă
if(isset($_POST['submit']))
  {
 
// Preia datele din formular 
    $vid=$_GET['viewid'];
    $pl=$_POST['pl'];
    $br=$_POST['br'];
    $weight=$_POST['weight'];
    $temp=$_POST['temp'];
    $pres=$_POST['pres'];
   
 // Construiește și execută interogarea SQL pentru a insera o nouă programare în baza de date
      $query.=mysqli_query($con, "insert   tblmedicalhistory(PatientID,Pulse,Breathe,Weight,Temperature,MedicalPres)value('$vid','$pl','$br','$weight','$temp','$pres')");

 // Verifică dacă interogarea a fost executată cu succes     
    if ($query) {

// Afișează un mesaj de alertă dacă programarea a fost realizată cu succes
    echo '<script>alert("A fost adăugat Istoricul Medical.")</script>';
    echo "<script>window.location.href ='manage-patient.php'</script>";
  }
  else
    {

// Afișează un mesaj de alertă dacă programarea nu a fost realizată cu succes
    echo '<script>alert("Ceva nu a mers bine. Vă rugăm să încercați din nou!")</script>';
    }

  
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Utilizator | Istoric Medical</title>

<!-- Include fonturi și stiluri -->	
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


<!-- start: PAGINA TITLU  -->
<section id="page-title">
<div class="row">
<div class="col-sm-8">
<h1 class="mainTitle">Utilizatori | Istoric Medical</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Utilizatori</span>
</li>
<li class="active">
<span>Istoric Medical</span>
</li>
</ol>
</div>
</section>
<!-- sfarsit: PAGINA TITLU -->

<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15">Pacienti <span class="text-bold">Istoric Medical</span></h5>

<?php

//parametru este transmis prin metoda GET (prin intermediul URL-ului) și este utilizat pentru a identifica pacientul pe care dorim să-l vizualizăm în detaliu
        $vid=$_GET['viewid'];

//interogarea este folosită pentru a extrage informațiile pacientului specificat în URL
        $ret=mysqli_query($con,"select * from tblpatient where ID='$vid'");

$cnt=1;

//parcurge fiecare rând din rezultatele interogării și returnează următorul rând sub formă de array asociativ în variabila $row.
while ($row=mysqli_fetch_array($ret)) {
?>


<table border="1" class="table table-bordered">
 <tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
 Detalii Pacient</td></tr>

    <tr>
    <th scope>Nume Pacient</th>
    <td><?php  echo $row['PatientName'];?></td>
    <th scope>Proprietar E-mail</th>
    <td><?php  echo $row['PatientOwnerEmail'];?></td>
  </tr>
  <tr>
    <th scope>Număr Telefon Proprietar</th>
    <td><?php  echo $row['PatientOwnerPhoneNumber'];?></td>
    <th>Adresă Pacient</th>
    <td><?php  echo $row['PatientAddress'];?></td>
  </tr>
    <tr>
    <th>Gen Pacient</th>
    <td><?php  echo $row['PatientGender'];?></td>
    <th>Vârstă Pacient</th>
    <td><?php  echo $row['PatientAge'];?></td>
  </tr>
  <tr>
    
    <th>Pacient Istoric Medical(dacă există)</th>
    <td><?php  echo $row['PatientMedhis'];?></td>
     <th>Data Înregistrării Pacientului</th>
    <td><?php  echo $row['CreateDate'];?></td>
  </tr>
 
<?php }?>
</table>
<?php  

//interogarea este folosită pentru a extrage informațiile pacientului din tblmedicalhistory
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
<th>Temperatură Corporală</th>
<th>Prescripție Medicală</th>
<th>Dată Consultație</th>
</tr>
<?php  

//parcurgerea rezultatele interogării
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
			<!-- sfarsit: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			
			<!-- sfarsit: SETTINGS -->


		</div>
		<!-- start: MAIN JAVASCRIPT-uri -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- sfarsit: MAIN JAVASCRIPT-uri -->

		<!-- start: JAVASCRIPTS OBLIGATORII NUMAI PENTRU ACEASTĂ PAGINĂ -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS OBLIGATORII NUMAI PENTRU ACEASTĂ PAGINĂ -->

		<!-- start:  JAVASCRIPT-uri -->
		<script src="customstyle/js/main.js"></script>

		<!-- start: JavaScript Event Handlers pentru această pagină -->
		<script src="customstyle/js/form-elements.js"></script>

		<!-- Script pentru inițializarea funcțiilor principale și elementelor formularului atunci când documentul este gata -->
		<script>
			jQuery(document).ready(function() {

// Inițializează funcțiile principale definite în Main
				Main.init();

// Inițializează elementele formularului definite în FormElements
				FormElements.init();
			});
		</script>

		<!-- sfarsit: JavaScript Event Handlers pentru această pagină -->

		<!-- sfarsit: JAVASCRIPT-uri -->
	</body>
</html>
