<?php
// Începe o sesiune PHP pentru a gestiona variabilele sesiunii
session_start();

// Dezactivează afișarea erorilor PHP pentru a asigura un flux de lucru fără erori vizibile utilizatorului
error_reporting(0);

// Include fișierul de configurare care stabilește conexiunea cu baza de date și alte setări necesare
include("include/config.php");

//Verificarea detaliilor pentru resetarea parolei
if(isset($_POST['submit'])){
$name=$_POST['fullname'];
$email=$_POST['email'];

// Verifică dacă există un utilizator cu numele și email-ul specificate în formular
$query=mysqli_query($con,"select id from  users where fullName='$name' and email='$email'");
$row=mysqli_num_rows($query);

// Dacă există un utilizator cu aceste detalii, setează variabilele de sesiune și redirectionăm către reset-password.php
if($row>0){

$_SESSION['name']=$name;
$_SESSION['email']=$email;
header('location:reset-password.php');
} else {

// Dacă nu există utilizator cu aceste detalii, afișează un mesaj de eroare și redirecțează înapoi către pagina forgot-password.php

echo "<script>alert('Detalii nevalide. Vă rugăm să încercați cu detalii valide.');</script>";
echo "<script>window.location.href ='forgot-password.php'</script>";


}

}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Recuperare Parolă Utilizator</title>

<!-- Include fonturi și stiluri -->
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="customstyle/css/styles.css">
		<link rel="stylesheet" href="customstyle/css/plugins.css">
		<link rel="stylesheet" href="customstyle/css/themes/theme-1.css" id="skin_color" />
	</head>


	<body class="login">
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<a href="../index.php"><h2> Clinica My Med Vet | Recuperare Parolă Utilizator</h2></a>
				</div>

				<div class="box-login">
					<form class="form-login" method="post">
						<fieldset>
							<legend>
								Recuperare Parolă Utilizator
							</legend>
							<p>
								Vă rugăm să introduceți Numele Utilizatorlui și Adresa de E-mail pentru a vă recupera parola.<br />
					
							</p>

							<div class="form-group form-actions">
								<span class="input-icon">
									<input type="text" class="form-control" name="fullname" placeholder="Numele Complet Înregistrat">
									<i class="fa fa-lock"></i>
									 </span>
							</div>

							<div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="email" placeholder=" E-mailul Înregistrat">
									<i class="fa fa-user"></i> </span>
							</div>

							<div class="form-actions">
								
								<button type="submit" class="btn btn-primary pull-right" name="submit">
									Resetare <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
							<div class="new-account">
								  Aveți deja un cont?
								<a href="user-login.php">
									Logare
								</a>
							</div>
						</fieldset>
					</form>

			<div class="copyright">
			&copy; <span class="text-bold text-uppercase"> Clinica My Med Vet </span>
			</div>
			
				</div>

			</div>
		</div>

<!-- start: MAIN JAVASCRIPT-uri -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
<!-- end: MAIN JAVASCRIPT-uri -->

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