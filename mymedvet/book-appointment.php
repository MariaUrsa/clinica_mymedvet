<?php
// Începe o sesiune nouă sau reia o sesiune existentă
session_start();

// Dezactivează raportarea erorilor
//error_reporting(0);

// Include fișierul de configurare, care conține detalii despre baza de date și alte setări
include('include/config.php');

// Include fișierul pentru verificarea autentificării utilizatorului
include('include/checklogin.php');

// Apelul funcției pentru verificarea autentificării utilizatorului
check_login();

// Verifică dacă formularul a fost trimis
if(isset($_POST['submit']))
{

// Preia datele din formular și le stochează în variabile
$specialization=$_POST['Doctorspecialization'];
$doctorid=$_POST['doctor'];
$userid=$_SESSION['id'];
$fees=$_POST['fees'];
$appdate=$_POST['appdate'];
$time=$_POST['apptime'];
$userstatus=1; //Setează statusul utilizatorului la 1 (activ)
$docstatus=1; //Setează statusul doctorului la 1 (activ)

// Construiește și execută interogarea SQL pentru a insera o nouă programare în baza de date
$query=mysqli_query($con,"insert into appointment(vetdocSpecialization,vetdocId,userId,consultancyFees,appointmentDate,appointmentTime,userStatus,vetdocStatus) values('$specialization','$doctorid','$userid','$fees','$appdate','$time','$userstatus','$docstatus')");

// Verifică dacă interogarea a fost executată cu succes
	if($query)
	{

// Afișează un mesaj de alertă dacă programarea a fost realizată cu succes
		echo "<script>alert('Programarea dumneavoastră a fost realizată cu success');</script>";
	}

}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Utilizator  | Realizare Programare</title>
	

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


		<script>
// Funcția getdoctor este apelată când se selectează o specializare pentru a încărca medicii corespunzători

function getdoctor(val) {
	$.ajax({
// Specifică metoda HTTP pentru cerere
	type: "POST",

// URL-ul la care se trimite cererea
	url: "get_doctor.php",

// Datele trimise în cerere, în acest caz, ID-ul specializării selectate
	data:'specializationid='+val,

// Funcția de succes care este apelată atunci când cererea este finalizată cu succes
	success: function(data){

// Actualizează conținutul elementului cu ID-ul "doctor" cu datele primite de la server
		$("#doctor").html(data);
	}
	});
}
</script>	


<script>
// Funcția getfee este apelată când se selectează un doctor pentru a încărca taxa corespunzătoare

function getfee(val) {
	$.ajax({

// Specifică metoda HTTP pentru cerere
	type: "POST",

// URL-ul la care se trimite cererea
	url: "get_doctor.php",

// Datele trimise în cerere, în acest caz, ID-ul doctorului selectat
	data:'doctor='+val,

// Funcția de succes care este apelată atunci când cererea este finalizată cu succes
	success: function(data){

// Actualizează conținutul elementului cu ID-ul "fees" cu datele primite de la server
		$("#fees").html(data);
	}
	});
}
</script>	




	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">

<!-- start: TOP NAVBAR -->		
						<?php include('include/header.php');?>
					
<!-- sfarsit: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">

<!-- start: PAGINA TITLU -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Utilizator | Realizare Programare</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Utilizator</span>
									</li>
									<li class="active">
										<span>Realizare Programare</span>
									</li>
								</ol>
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
													<h5 class="panel-title">Realizare Programare</h5>
												</div>
												<div class="panel-body">

<!-- Afișează mesajul din sesiune, dacă există, și apoi resetează mesajul -->
					<p style="color:red;">
					<?php echo htmlentities($_SESSION['msg1']);?>
					<?php echo htmlentities($_SESSION['msg1']="");?>
						
					</p>	
<!-- Formă HTML pentru rezervarea unei programări -->
					<form role="form" name="book" method="post" >
														

 <!-- Grup de formă pentru selectarea specializării doctorului -->

<div class="form-group">
				<label for="DoctorSpecialization">
				Specializare Doc. Veterinar
				</label>

<!-- Dropdown pentru selectarea specializării -->

<!-- Atunci când se schimbă selecția, funcția getdoctor este apelată cu valoarea selectată -->				
<select name="Doctorspecialization" class="form-control" onChange="getdoctor(this.value);" required="required">
<option value="">Selectează Specializarea</option>


 <!-- pentru a popula dropdown-ul cu specializările din baza de date -->
<?php 

// Execută o interogare SQL pentru a obține toate specializările
$ret=mysqli_query($con,"select * from vetdocspecialization");

// Iterează prin rezultatele interogării
while($row=mysqli_fetch_array($ret))
{
?>

<!-- Fiecare opțiune din dropdown are valoarea și textul corespunzătoare specializării din baza de date -->
<option value="<?php echo htmlentities($row['specialization']);?>">
				<?php echo htmlentities($row['specialization']);?>
</option>
<?php } ?>
																
</select>
</div>




<div class="form-group">
			<label for="doctor">
					Doctori Veterinari
			</label>

<select name="doctor" class="form-control" id="doctor" onChange="getfee(this.value);" required="required">
		<option value="">Selectează Doc. Veterinar</option>
</select>
</div>


<div class="form-group">
			<label for="consultancyfees">
					Taxă Consultație
			</label>
<select name="fees" class="form-control" id="fees"  readonly>
						
</select>
</div>
														
<div class="form-group">
			<label for="AppointmentDate">
					Dată
			</label>
<input class="form-control datepicker" name="appdate"  required="required" data-date-format="yyyy-mm-dd">
	
</div>
														
<div class="form-group">
			<label for="Appointmenttime">
					Ora
					</label>
<input class="form-control" name="apptime" id="timepicker1" required="required">ex. : 10:00 AM
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
<!-- sfarsit: SETTINGS -->

		</div>
<!-- start: JAVASCRIPT-uri PRINICIPALE -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
<!-- sfarsit: JAVASCRIPT-uri PRINICIPALE -->

<!-- start: JAVASCRIPT-uri OBLIGATORII NUMAI PENTRU ACEASTĂ PAGINĂ -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
<!-- sfarsit: JAVASCRIPT-uri OBLIGATORII NUMAI PENTRU ACEASTĂ PAGINĂ -->
		
<!-- start: JAVASCRIPT-uri -->
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

// Inițializează pluginul datepicker pe elementele cu clasa 'datepicker'
			$('.datepicker').datepicker({

    format: 'yyyy-mm-dd', // Formatează data în formatul an-lună-zi
    startDate: '-1d' // Permite selectarea datelor începând cu 3 zile în urmă
});
		</script>

<!-- Script pentru inițializarea pluginului timepicker -->
		  <script type="text/javascript">

// Inițializează pluginul timepicker pe elementul cu id-ul 'timepicker1'
            $('#timepicker1').timepicker();
        </script>

<!-- sfarsit: JavaScript-uri Event Handlers pentru această pagină -->
<!-- sfarsit: JAVASCRIPT-uri -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

	</body>
</html>
