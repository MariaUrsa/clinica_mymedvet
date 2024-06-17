<?php
// Începe o sesiune PHP pentru a gestiona variabilele de sesiune între pagini.
session_start();

// Acest comentariu este o metodă de a dezactiva raportarea erorilor în PHP;
error_reporting(0);

// Include fișierul de configurare care conține detalii despre conexiunea la baza de date și alte setări.
include('include/config.php');

// Include fișierul care verifică dacă utilizatorul este autentificat; 
include('include/checklogin.php');

// Verifică dacă utilizatorul este autentificat; dacă nu este, ar putea redirecționa către o altă pagină sau să execute o altă acțiune.
check_login();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Utilizator | Vizualizare Istoric Medical</title>

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


<!-- start: PAGINA TITLU -->

<section id="page-title">
<div class="row">
<div class="col-sm-8">
<h1 class="mainTitle">Utilizator | Istoric Medical</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Utilizatori</span>
</li>
<li class="active">
<span>Vizualizare Istoric Medical</span>
</li>
</ol>
</div>
</section>

<!-- sfarsit: PAGINA TITLU -->

<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15">Vizualizare <span class="text-bold">Istoric Medical</span></h5>



<table class="table table-hover" id="sample-table-1">
<thead>
<tr>
<th class="center">#</th>
<th>Nume Pacient</th>
<th>CNP Proprietar </th>
<th>Număr Telefon Proprietar </th>
<th>Specie (Rasă) Pacient </th>
<th>Gen Pacient </th>
<th>Dată Creare </th>
<th>Dată Actualizare </th>
<th>Acțiune</th>
</tr>
</thead>
<tbody>
<?php

// Se obține ID-ul utilizatorului curent din sesiune și se atribuie variabilei $uid
$uid=$_SESSION['id'];

// Se realizează interogarea către baza de date pentru a selecta toate coloanele din tabela tblpatient - Join-ul este făcut cu tabela users pentru a obține informațiile pacientului asociat utilizatorului curent
$sql=mysqli_query($con,"select tblpatient.* from tblpatient join users on users.email=tblpatient.PatientOwnerEmail where users.id='$uid'");

// Variabilă utilizată pentru numerotarea rândurilor 
$cnt=1;

// Se parcurg rezultatele interogării SQL
while($row=mysqli_fetch_array($sql))

{
?>
<tr>
<!-- Celule pentru afișarea datelor fiecărui pacient -->

<td class="center"><?php echo $cnt;?>.</td>
<td class="hidden-xs"><?php echo $row['PatientName'];?></td>
<td><?php echo $row['PatientOwnerCNP'];?></td>
<td><?php echo $row['PatientOwnerPhoneNumber'];?></td>
<td><?php echo $row['PatientSpecies'];?></td>
<td><?php echo $row['PatientGender'];?></td>
<td><?php echo $row['CreateDate'];?></td>
<td><?php echo $row['UpdateDate'];?>
</td>
<td>

//Un buton este creat pentru fiecare rând al tabelului, care duce utilizatorul către pagina view-medhistory.php pentru a vizualiza detaliile medicale ale pacientului cu ID-ul specificat ($row['ID']).
<a href="view-medhistory.php?viewid=<?php echo $row['ID'];?>" class="btn btn-info btn-sm">Vizualizare Detalii</a>

</td>
</tr>
<?php 
//Contorul este incrementat la fiecare iterare a blocului while, fiind utilizat pentru numerotarea secvențială a rândurilor
$cnt=$cnt+1;
 }?></tbody>
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

		<!-- start: JAVASCRIPT-uri OBLIGATORIU NUMAI PENTRU ACEASTĂ PAGINĂ -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- sfarsit: JAVASCRIPT-uri OBLIGATORIU NUMAI PENTRU ACEASTĂ PAGINĂ -->


		<!-- start: JAVASCRIPT-uri -->
		<script src="customstyle/js/main.js"></script>

		<!-- start: JavaScript Event Handlers pentru această pagină -->
		<script src="customstyle/js/form-elements.js"></script>

		<script>
			jQuery(document).ready(function() {
// Inițializează funcționalitățile principale ale aplicației
				Main.init();
// Inițializează manipularea elementelor de formular
				FormElements.init();
			});
		</script>
		
		<!-- sfarsit: JavaScript Event Handlers for this page -->
		<!-- sfarsit: JAVASCRIPT-uri -->
	</body>
</html>

