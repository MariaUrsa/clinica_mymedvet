<?php
// Începe o sesiune PHP
session_start();

// Dezactivează raportarea erorilor
error_reporting(0);

// Include fișierul de configurare
include('include/config.php');

// Verifică dacă utilizatorul este autentificat, altfel redirecționează la pagina de deconectare
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{

// Verifică dacă a fost trimisă cererea de anulare a programării

if(isset($_GET['cancel']))
		  {
// Execută interogarea SQL pentru a anula programarea și actualizează starea utilizatorului

		          mysqli_query($con,"update appointment set userStatus='0' where id = '".$_GET['id']."'");

// Setează un mesaj în sesiune
                  $_SESSION['msg']="Programarea a fost anulată";
		  }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Utilizator | Istoric Programări</title>

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

<!-- start: SIDEBAR -->
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
				
<!-- start: TOP NAVBAR -->
					<?php include('include/header.php');?>

<!-- sfarsit: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">

<!-- start: TITLUL PAGINII -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Utilizator | Istoric Programări</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Utilizator </span>
									</li>
									<li class="active">
										<span>Istoric Programări</span>
									</li>
								</ol>
							</div>
						</section>
<!-- sfarsit: TITLUL PAGINII -->

<!-- start: EXEMPLU -->
						<div class="container-fluid container-fullw bg-white">
						

									<div class="row">
								<div class="col-md-12">

 <!-- Afișează mesajul din sesiune -->
									<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>	
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center">#</th>
												<th class="hidden-xs">Nume doc. veterinar</th>
												<th>Specializare</th>
												<th>Taxă consultație</th>
												<th>Dată/Timp Programare </th>
												<th>Dată Creare Programare </th>
												<th>Status</th>
												<th>Acțiune</th>
												
											</tr>
										</thead>
										<tbody>
<?php

// Execută interogarea SQL pentru a obține istoricul programărilor utilizatorului autentificat

$sql=mysqli_query($con,"select vetdoc.vetdocName as vetdocName,appointment.*  from appointment join vetdoc on vetdoc.id=appointment.vetdocId where appointment.userId='".$_SESSION['id']."'");
$cnt=1;

// Parcurge rezultatele interogării și afișează programările
while($row=mysqli_fetch_array($sql))
{
?>

											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php echo $row['vetdocName'];?></td>
												<td><?php echo $row['vetdocSpecialization'];?></td>
												<td><?php echo $row['consultancyFees'];?></td>
												<td><?php echo $row['appointmentDate'];?> / <?php echo
												 $row['appointmentTime'];?>
												</td>
												<td><?php echo $row['postingDate'];?></td>
												<td>

// Afișează statusul programării

<?php if(($row['userStatus']==1) && ($row['vetdocStatus']==1))  
{
	echo "Activ";
}
if(($row['userStatus']==0) && ($row['vetdocStatus']==1))  
{
	echo "Anulat de către dvs.";
}

if(($row['userStatus']==1) && ($row['vetdocStatus']==0))  
{
	echo "Anulat de către Doctor Veterinar";
}



												?></td>
												<td >
												<div class="visible-md visible-lg hidden-sm hidden-xs">
							<?php if(($row['userStatus']==1) && ($row['vetdocStatus']==1))  
{ ?>

													
	<a href="appointment-history.php?id=<?php echo $row['id']?>&cancel=update" onClick="return confirm('Sunteți sigur că doriți să anulați programarea?')"class="btn btn-primary btn-xs" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">Anulare</a>
	<?php } else {

		echo "Anulat";
		} ?>
												</div>
												<div class="visible-xs visible-sm hidden-md hidden-lg">
													<div class="btn-group" dropdown is-open="status.isopen">
														<button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" dropdown-toggle>
															<i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
														</button>
														<ul class="dropdown-menu pull-right dropdown-light" role="menu">
															<li>
																<a href="#">
																	Editează
																</a>
															</li>
															<li>
																<a href="#">
																	Partajează
																</a>
															</li>
															<li>
																<a href="#">
																	Șterge
																</a>
															</li>
														</ul>
													</div>
												</div></td>
											</tr>
											
											<?php 
$cnt=$cnt+1;
											 }?>
											
											
										</tbody>
									</table>
								</div>
							</div>
								</div>
						
<!-- sfarsit: EXEMPLU -->
<!-- sfarsit: SELECTAȚI CASETELE -->
						
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
<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
<!-- sfarsit: MAIN JAVASCRIPTS -->

<!-- start: JAVASCRIPT-uri NECESARE NUMAI PENTRU ACEASTĂ PAGINĂ -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
<!-- sfarsit: JAVASCRIPT-uri NECESARE NUMAI PENTRU ACEASTĂ PAGINĂ -->

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
		</script>
<!-- sfarsit: JavaScript Event Handlers pentru această pagină -->
<!-- sfarsit: JAVASCRIPT-uri -->
	</body>
</html>
<?php } ?>