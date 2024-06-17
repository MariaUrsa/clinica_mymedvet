<?php

 // Începe o sesiune PHP pentru a gestiona variabilele sesiunii
session_start();

// Dezactivează afișarea erorilor PHP pentru a asigura un flux de lucru fără erori vizibile utilizatorului
error_reporting(0);

// Include fișierul de configurare care stabilește conexiunea cu baza de date și alte setări necesare
include('include/config.php');

// Include scriptul pentru verificarea autentificării utilizatorului
include('include/checklogin.php');

// Verifică dacă utilizatorul este autentificat; în caz contrar, va redirecționa către pagina de logout
check_login();

// Verifică dacă formularul a fost trimis prin butonul cu numele 'submit'
if(isset($_POST['submit']))
{

// Preia adresa de email din formularul trimis prin POST
	$email=$_POST['email'];

// Actualizează adresa de email în baza de date pentru utilizatorul autentificat în sesiunea curentă
$sql=mysqli_query($con,"update users set email='$email' where id='".$_SESSION['id']."'");

// Verifică dacă interogarea MySQL pentru actualizarea adresei de email s-a efectuat cu succes
if($sql)
{

// Mesaj de succes în cazul în care actualizarea a avut loc cu succes
$msg="E-mailul a fost actualizat cu succes!";


}

}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Utilizator | Editare Profil</title>
	
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
						
<!-- sfarsit: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">

<!-- start: PAGINA TITLU -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Utilizator | Editare Profil</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Utilizator </span>
									</li>
									<li class="active">
										<span>Editare Profil</span>
									</li>
								</ol>
							</div>
						</section>
<!-- sfarsit: PAGINA TITLU -->

<!-- start: EXEMPLU -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
<h5 style="color: green; font-size:18px; ">

<?php 
// Verifică dacă variabila $msg este definită și nu este goală
if($msg) 

// Afișează mesajul, asigurându-se că orice caractere speciale sunt convertite în entități HTML
	{ echo htmlentities($msg);}?>
 </h5>
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Editare Profil</h5>
												</div>
												<div class="panel-body">
				<form name="registration" id="updatemail"  method="post">
<div class="form-group">
									<label for="fess">
																 E-mail Utilizator
															</label>
			<input type="email" class="form-control" name="email" id="email" onBlur="userAvailability()"  placeholder="Email" required>
								
									 <span id="user-availability-status1" style="font-size:12px;"></span>
														</div>



														
														
														
														
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
						
<!-- sfarsit:  EXEMPLU -->
			
					
					
						
						
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
<!-- end: MAIN JAVASCRIPTS -->

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
<!-- sfarsit: JAVASCRIPT-uri -->

<!-- start: JavaScript Event Handlers pentru această pagină -->
		<script src="customstyle/js/form-elements.js"></script>
<!-- sfarsit: JavaScript Event Handlers pentru această pagină -->

		<script>
			jQuery(document).ready(function() {
// Inițializează funcționalitățile principale ale aplicației
				Main.init();
// Inițializează manipularea elementelor de formular
				FormElements.init();
			});
		</script>

	<script>
		
function userAvailability() {

// Arată iconița de încărcare pentru a indica utilizatorului că verificarea este în desfășurare
$("#loaderIcon").show();
jQuery.ajax({

// URL-ul către care se face cererea AJAX
url: "check_availability.php",

// Datele trimise în cerere, în acest caz adresa de email introdusă de utilizator în câmpul cu id-ul "email"
data:'email='+$("#email").val(),

// Metoda HTTP folosită pentru cererea AJAX, în acest caz POST
type: "POST",

// În caz de succes, se actualizează conținutul elementului cu id-ul "user-availability-status1" cu răspunsul primit de la server
success:function(data){
$("#user-availability-status1").html(data);

// Ascunde iconița de încărcare după ce s-a primit răspunsul
$("#loaderIcon").hide();
},

// Funcție goală pentru gestionarea erorilor de rețea sau de server
error:function (){}
});
}
</script>	
		
	</body>
</html>
