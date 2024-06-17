<?php
// Începe o sesiune PHP pentru a gestiona variabilele de sesiune între pagini.
session_start();

// Acest comentariu este o metodă de a dezactiva raportarea erorilor în PHP;
//error_reporting(0);

// Include fișierul de configurare care conține detalii despre conexiunea la baza de date și alte setări.
include('include/config.php');

// Include fișierul care verifică dacă utilizatorul este autentificat; 
include('include/checklogin.php');

// Verifică dacă utilizatorul este autentificat; dacă nu este, ar putea redirecționa către o altă pagină sau să execute o altă acțiune.
check_login();

// Setează fusul orar implicit pentru București, asigurându-se că timestamp-urile sunt corecte pentru zona respectivă.
date_default_timezone_set('Europe/Bucharest');

// Obține data și ora curentă în formatul specificat.
$currentTime = date( 'd-m-Y h:i:s A', time () );

// Verifică dacă formularul a fost trimis prin verificarea existenței butonului de submit cu numele "submit".
if(isset($_POST['submit']))
{

// Interogare SQL pentru a verifica dacă parola actuală este corectă pentru utilizatorul curent.
$sql=mysqli_query($con,"SELECT password FROM  users where password='".hash('sha256',$_POST['cpass'])."' && id='".$_SESSION['id']."'");

// Extrage rezultatul interogării într-un array.
$num=mysqli_fetch_array($sql);

// Verifică dacă a fost găsită o înregistrare în baza de date care să corespundă parolei actuale și ID-ului de sesiune.
if($num>0)
{

// Actualizează parola utilizatorului cu noua parolă criptată și actualizează data ultimei modificări.	
 $con=mysqli_query($con,"update users set password='".hash('sha256',$_POST['npass'])."', updateDate='$currentTime' where id='".$_SESSION['id']."'");

// Mesaj de succes care va fi afișat utilizatorului după ce parola a fost schimbată.
$_SESSION['msg1']="Parola a fost schimbată cu succes!";
}
else
{
 // Mesaj de eroare care va fi afișat utilizatorului dacă parola veche introdusă nu este corectă.
$_SESSION['msg1']="Vechea parolă nu se potrivește!";
}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Utilizator  | Schimbare Parolă</title>
	
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
<script type="text/javascript">

// Funcția valid() este folosită pentru a valida formularul pentru schimbarea parolei.
function valid()
{

// Verificarea dacă câmpul curent al parolei este gol
if(document.chngpwd.cpass.value=="")
{
alert("Câmpul curent al parolei este gol. Introduceți parola!");
document.chngpwd.cpass.focus();
return false;
}

// Verificarea dacă câmpul noii parole este gol
else if(document.chngpwd.npass.value=="")
{
alert("Câmpul noii parole este gol. Introduceți parola!");
document.chngpwd.npass.focus();
return false;
}

// Verificarea dacă câmpul parolei confirmate este gol
else if(document.chngpwd.cfpass.value=="")
{
alert("Câmpul parolei confirmate este gol. Introduceți parola!");
document.chngpwd.cfpass.focus();
return false;
}

// Verificarea dacă noua parolă și confirmarea parolei coincid
else if(document.chngpwd.npass.value!= document.chngpwd.cfpass.value)
{
alert("Câmpul Parolei și Confirmarea Parolei nu se potrivesc!");
document.chngpwd.cfpass.focus();
return false;
}

// Dacă toate condițiile sunt îndeplinite, returnează true pentru a permite trimiterea formularului
return true;
}
</script>

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
									<h1 class="mainTitle">Utilizator | Schimbă Parola</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Utilizator</span>
									</li>
									<li class="active">
										<span>Schimbă Parola</span>
									</li>
								</ol>
							</div>
						</section>
<!-- sfarsit: PAGINA TITLU -->

<!-- start: EXEMPLU -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Schimbă Parola</h5>
												</div>
												<div class="panel-body">
								<p style="color:red;"><?php echo htmlentities($_SESSION['msg1']);?>
								<?php echo htmlentities($_SESSION['msg1']="");?></p>	
													<form role="form" name="chngpwd" method="post" onSubmit="return valid();">
														<div class="form-group">
															<label for="exampleInputEmail1">
																Schimbă Parola
															</label>
							<input type="password" name="cpass" class="form-control"  placeholder="Introduceți Parola Actuală">
														</div>
														<div class="form-group">
															<label for="exampleInputPassword1">
																Parolă Nouă
															</label>
					<input type="password" name="npass" class="form-control"  placeholder="Parola Nouă">
														</div>
														
<div class="form-group">
															<label for="exampleInputPassword1">
																Confirm Parola
															</label>
									<input type="password" name="cfpass" class="form-control"  placeholder="Parolă Confirmată">
														</div>
														
														
														
														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Trimite
														</button>
													</form>
												</div>
											</div>
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
			<>
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
