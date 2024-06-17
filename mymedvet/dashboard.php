<?php
// Începe o sesiune PHP pentru a gestiona variabilele sesiunii
session_start();

// Dezactivează afișarea erorilor PHP pentru a asigura un flux de lucru fără erori vizibile utilizatorului
//error_reporting(0);

// Include fișierul de configurare care stabilește conexiunea cu baza de date și alte setări necesare
include('include/config.php');

// Include scriptul pentru verificarea autentificării utilizatorului
include('include/checklogin.php');

// Verifică dacă utilizatorul este autentificat; în caz contrar, va redirecționa către pagina de logout
check_login();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Utilizator  | Dashboard</title>
		
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
									<h1 class="mainTitle">Utilizator | Dashboard</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Utilizator</span>
									</li>
									<li class="active">
										<span>Dashboard</span>
									</li>
								</ol>
							</div>
						</section>
<!-- sfarsit: PAGINA TITLU -->

<!-- start: EXEMPLU -->
							<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle">Profilul Meu</h2>
											
											<p class="links cl-effect-1">
												<a href="edit-profile.php">
													Actualizare Profil
												</a>
											</p>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle">Programările Mele</h2>
										
											<p class="cl-effect-1">
												<a href="appointment-history.php">
													Vizualizare Istoric Programări
												</a>
											</p>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle"> Programare </h2>
											
											<p class="links cl-effect-1">
												<a href="book-appointment.php">
													Programare
												</a>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
			
					
					
<!-- sfarsit: EXEMPLU -->						
						
					
						
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
<!-- end: MAIN JAVASCRIPT-uri -->

<!-- start: JAVASCRIPTS OBLIGATORIU NUMAI PENTRU ACEASTĂ PAGINĂ -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
<!-- sfarsit: JAVASCRIPT-uri OBLIGATORIU NUMAI PENTRU ACEASTĂ PAGINĂ -->

<!-- start:  JAVASCRIPT-uri -->
		<script src="customstyle/js/main.js"></script>

<!-- start: JavaScript Handlers pentru această pagină -->
		<script src="customstyle/js/form-elements.js"></script>
		<script>

	// Această secțiune de cod asigură că toate funcțiile sunt apelate doar după ce documentul HTML este complet încărcat în browser.
	//se declanșează când întregul DOM este gata pentru manipulare

			jQuery(document).ready(function() {
    // Inițializează funcționalitățile principale ale aplicației
			Main.init(); 
   // Inițializează manipularea elementelor de formular
    		FormElements.init();
			});
		</script>
<!-- sfarsit: JavaScript Event Handlers pentru această pagină -->
<!-- sfarsit: JAVASCRIPT-uri -->
	</body>
</html>
