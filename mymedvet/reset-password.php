<?php
// Începe o sesiune nouă sau reia o sesiune existentă
session_start();

// Dezactivează raportarea erorilor
//error_reporting(0);

// Include fișierul de configurare, care conține detalii despre baza de date și alte setări
include("include/config.php");

// Verifică dacă Parola a fost resetată
if(isset($_POST['change']))
{
$name=$_SESSION['name'];
$email=$_SESSION['email'];
$newpassword=hash('sha256', $_POST['password']);

// Actualizează și execută interogarea SQL pentru a insera o nouă programare în baza de date
$query=mysqli_query($con,"update users set password='$newpassword' where fullName='$name' and email='$email'");

// Verifică dacă interogarea a fost executată cu succes
if ($query) {
echo "<script>alert('Parola a fost actualizată cu succes.');</script>";

// Afișează un mesaj de alertă dacă programarea a fost realizată cu succes
echo "<script>window.location.href ='user-login.php'</script>";
}

}


?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Resetare Parolă</title>

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
//Verifică dacă valoarea din câmpul 'password' coincide cu valoarea din câmpul 'password_again'

 if(document.passwordreset.password.value!= document.passwordreset.password_again.value)
{

//Dacă nu coincid, afișează o alertă cu un mesaj corespunzător
alert("Câmpul Parolă și Confirmare Parolă nu se potrivesc!");

//Setează focusul pe câmpul 'password_again' pentru a permite utilizatorului să corecteze eroarea
document.passwordreset.password_again.focus();

// Returnează 'false' pentru a opri trimiterea formularului, dacă nu coincid
return false;
}

// Dacă parola este confirmată corect, returnează 'true' pentru a permite trimiterea formularului
return true;
}


</script>
	</head>
	<body class="login">
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<a href="../index.php"><h2> Clinica My Med Vet | Resetare Parolă Utilizator</h2></a>
				</div>

				<div class="box-login">
					<form class="form-login" name="passwordreset" method="post" onSubmit="return valid();">
						<fieldset>
							<legend>
								Resetare Parolă Utilizator
							</legend>
							<p>
								Vă rugăm să setați noua parolă.<br />
								<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
							</p>

<div class="form-group">
<span class="input-icon">
<input type="password" class="form-control" id="password" name="password" placeholder="Parolă" required>
<i class="fa fa-lock"></i> </span>
</div>
	

<div class="form-group">
<span class="input-icon">
<input type="password" class="form-control"  id="password_again" name="password_again" placeholder="Parola Din Nou" required>
<i class="fa fa-lock"></i> </span>
</div>
							

							<div class="form-actions">
								
								<button type="submit" class="btn btn-primary pull-right" name="change">
									Schimbă <i class="fa fa-arrow-circle-right"></i>
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
						&copy; <span class="text-bold text-uppercase">  Clinica My Med Vet</span>
					</div>
			
				</div>

			</div>
		</div>

<!-- start: JAVASCRIPT-uri PRINICIPALE -->		
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
<!-- sfarsit: JAVASCRIPT-uri PRINICIPALE -->	

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

	</body>
</html>