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

// Verifică dacă formularul a fost trimis prin butonul cu numele 'submit'
if(isset($_POST['submit']))
{

// Preia numele, adresa, orașul și gen-ul din formularul trimis prin POST
	$fname=$_POST['fname'];
$address=$_POST['address'];
$city=$_POST['city'];
$gender=$_POST['gender'];

// Actualizează numele, adresa, orașul și gen-ul în baza de date pentru utilizatorul autentificat în sesiunea curentă
$sql=mysqli_query($con,"update users set fullName='$fname',address='$address',city='$city',gender='$gender' where id='".$_SESSION['id']."'");

// Verifică dacă interogarea MySQL pentru actualizarea adresei de email s-a efectuat cu succes
if($sql)
{
// Mesaj de succes în cazul în care actualizarea a avut loc cu succes
$msg="Profilul s-a actualizat cu succes!";


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
<?php if($msg) { echo htmlentities($msg);}?> </h5>
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Editare Profil</h5>
												</div>
												<div class="panel-body">

<?php 
//interogare către baza de date pentru a selecta toate informațiile din tabelul users 
$sql=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
while($data=mysqli_fetch_array($sql))
{
?>

//Afișează datele utilizatorului, folosind funcția htmlentities() pentru a asigura că orice caractere HTML speciale sunt convertite în entități HTML sigure, prevenind astfel atacurile (Cross-Site Scripting).
<h4>Profil <?php echo htmlentities($data['fullName']);?> </h4>
<p><b>Data de Înregistrare Profil: </b><?php echo htmlentities($data['regDate']);?></p>
<?php if($data['updateDate']){?>
<p><b>Data ultimei actualizări a profilului: </b><?php echo htmlentities($data['updateDate']);?></p>
<?php } ?>
<hr />													

<form role="form" name="edit" method="post">
													

<div class="form-group">
															<label for="fname">
																 Nume Complet Utilizator
															</label>
	<input type="text" name="fname" class="form-control" value="<?php echo htmlentities($data['fullName']);?>" >
														</div>


<div class="form-group">
															<label for="address">
																 Adresă
															</label>
					<textarea name="address" class="form-control"><?php echo htmlentities($data['address']);?></textarea>
														</div>
<div class="form-group">
															<label for="city">
																 Oraș
															</label>
		<input type="text" name="city" class="form-control" required="required"  value="<?php echo htmlentities($data['city']);?>" >
														</div>
	
<div class="form-group">
									<label for="gender">
																Gen
															</label>

<select name="gender" class="form-control" required="required" >
<option value="<?php echo htmlentities($data['gender']);?>"><?php echo htmlentities($data['gender']);?></option>
<option value="male">Masculin</option>	
<option value="female">Feminin</option>	
</select>

														</div>

<div class="form-group">
									<label for="fess">
																E-mail Utilizator
															</label>
					<input type="email" name="uemail" class="form-control"  readonly="readonly"  value="<?php echo htmlentities($data['email']);?>">
					<a href="change-emaild.php">Actualizare E-mail</a>
														</div>



														
														
														
														
														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Actualizare
														</button>
													</form>
													<?php } ?>
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
