<?php

// Include fișierul de configurare, care conține detalii despre baza de date și alte setări
include_once('include/config.php');

// Verifică dacă cererea a fost trimisă
if(isset($_POST['submit']))

{
// Preia datele din cerere și le stochează în variabile
$fname=$_POST['full_name'];
$address=$_POST['address'];
$city=$_POST['city'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$password=hash('sha256', $_POST['password']);

// Construiește și execută interogarea SQL pentru a insera o nouă programare în baza de date
$query=mysqli_query($con,"insert into users(fullname,address,city,gender,email,password) values('$fname','$address','$city','$gender','$email','$password')");

// Verifică dacă interogarea a fost executată cu succes
if($query)
{

// Afișează un mesaj de alertă dacă programarea a fost realizată cu succes
	echo "<script>alert('Înregistrat cu succes. Vă puteți conecta acum.');</script>";
	header('location:user-login.php');
}
}
?>


<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Înregistrare Utilizator</title>
	
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
		
		<script type="text/javascript">
function valid()
{
 if(document.registration.password.value!= document.registration.password_again.value)
{
alert("Câmpul Parolă și Confirmare Parolă nu se potrivesc!");
document.registration.password_again.focus();
return false;
}
return true;
}
</script>
		

	</head>

	<body class="login">

<!-- start: INREGISTRARE -->
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<a href="../index.php"><h2> Clinica My Med Vet | Înregistrare Utilizator</h2></a>
				</div>

<!-- start: CASETA DE ÎNREGISTRARE -->
				<div class="box-register">
					<form name="registration" id="registration"  method="post" onSubmit="return valid();">
						<fieldset>
							<legend>
								Înregistrează-te
							</legend>
							<p>
								Introduceți-vă datele personale mai jos:
							</p>
							<div class="form-group">
								<input type="text" class="form-control" name="full_name" placeholder="Nume Prenume Complet" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="address" placeholder="Adresă" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="city" placeholder="Oraș" required>
							</div>
							<div class="form-group">
								<label class="block">
									Gen
								</label>
								<div class="clip-radio radio-primary">
									<input type="radio" id="rg-female" name="gender" value="femini" >
									<label for="rg-female">
										Feminin
									</label>
									<input type="radio" id="rg-male" name="gender" value="masculin">
									<label for="rg-male">
										Masculin
									</label>
								</div>
							</div>
							<p>
								Introduceți detaliile contului mai jos:
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="email" id="email" onBlur="userAvailability()"  placeholder="E-mail" required>
									<i class="fa fa-envelope"></i> </span>
									 <span id="user-availability-status1" style="font-size:12px;"></span>
							</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" id="password" name="password" placeholder="Parolă" required>
									<i class="fa fa-lock"></i> </span>
							</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control"  id="password_again" name="password_again" placeholder="Parolă Din Nou" required>
									<i class="fa fa-lock"></i> </span>
							</div>
							<div class="form-group">
								<div class="checkbox clip-check check-primary">
									<input type="checkbox" id="agree" value="agree" checked="true" readonly=" true">
									<label for="agree">
										Sunt de acord
									</label>
								</div>
							</div>
							<div class="form-actions">
								<p>
									Aveți deja un cont?
									<a href="user-login.php">
										Logare
									</a>
								</p>
								<button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">
									Trimite <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</fieldset>
					</form>

					<div class="copyright">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> Clinica My Med Vet</span>. <span>Toate drepturile rezervate</span>
					</div>

				</div>
<!-- sfarsit: CASETA DE ÎNREGISTRARE -->

			</div>
		</div>
<!-- start: JAVASCRIPTS PRINICIPALE -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
<!-- sfarsit: JAVASCRIPTS PRINICIPALE -->

<!-- start: JAVASCRIPT-uri -->
		<script src="customstyle/js/main.js"></script>

<!-- start: JAVASCRIPT-uri logare-->
		<script src="customstyle/js/login.js"></script>

<!-- Script pentru inițializarea funcțiilor principale și elementelor formularului atunci când documentul este gata -->

		<script>
			jQuery(document).ready(function() {

// Inițializează funcțiile principale definite în Main
				Main.init();

// Inițializează funcțiile principale definite în Login				
				Login.init();
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