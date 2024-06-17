<?php 

// Începe o sesiune nouă sau reia o sesiune existentă
session_start();

// Dezactivează raportarea erorilor
error_reporting(0);

// Include fișierul de configurare, care conține detalii despre baza de date și alte setări
include("include/config.php");

// Verifică dacă datele au fost trimise
if(isset($_POST['submit']))
{
// Preia datele și le stochează în variabile
$puname=$_POST['username'];	
$ppwd=hash('sha256', $_POST['password']);

//realizează o interogare către baza de date pentru a selecta toate coloanele din tabela users unde adresa de email (email) este egală cu $puname și parola (password) este egală cu $ppwd.
$ret=mysqli_query($con,"SELECT * FROM users WHERE email='$puname' and password='$ppwd'");

//preia primul rând de rezultate din interogare și îl stocează în variabila $num sub formă de array asociativ
$num=mysqli_fetch_array($ret);

//verifică dacă există cel puțin un rând în rezultatele returnate
if($num>0)
{

//Dacă autentificarea este reușită, se setează variabila de sesiune $_SESSION['login'] cu valoarea introdusă pentru numele de utilizator ($_POST['username']). De asemenea, se setează $_SESSION['id'] cu valoarea ID-ului utilizatorului preluat din rezultatul interogării	
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];

//Se atribuie valorile din rezultatul interogării altor variabile pentru utilizare ulterioară
$pid=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;

//Pentru logare dacă utilizatorul se conectează cu succes
$log=mysqli_query($con,"insert into userlog(uid,username,userip,status) values('$pid','$puname','$uip','$status')");
header("location:dashboard.php");
}
else
{

//Pentru logare dacă utilizatorul se conectează fără succes
$_SESSION['login']=$_POST['username'];	
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
mysqli_query($con,"insert into userlog(username,userip,status) values('$puname','$uip','$status')");

echo "<script>alert('Nume de utilizator sau parolă nevalide');</script>";
echo "<script>window.location.href='user-login.php'</script>";
}
}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Utilizator - Logare</title>

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
				<a href="../index.php"><h2> Clinica My Med Vet | Logare Utilizator</h2></a>
				</div>

				<div class="box-login">
					<form class="form-login" method="post">
						<fieldset>
							<legend>
								Logare în cont
							</legend>
							<p>
								Vă rugăm să introduceți E-mailul și Parola pentru a vă conecta.<br>
								<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="username" placeholder="E-mail" required>
									<i class="fa fa-user"></i> </span>
							</div>
							<div class="form-group form-actions">
								<span class="input-icon">
									<input type="password" class="form-control" name="password" placeholder="Parolă" required>
									<i class="fa fa-lock"></i>
									 </span><a href="forgot-password.php">
									Ați uitat parola?
								</a>
							</div>
							<div class="form-actions">
								
								<button type="submit" class="btn btn-primary pull-right" name="submit">
									Logare <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
							<div class="new-account">
								Nu aveți încă un cont?
								<a href="registration.php">
									Creează un cont!
								</a>
							</div>
						</fieldset>
					</form>

					<div class="copyright">
						</span><span class="text-bold text-uppercase"> Clinica My Med Vet</span>.
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
<!-- <script src="vendor/jquery-validation/jquery.validate.min.js"></script> -->
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