<?php

// Include fișierul de configurare, care conține detalii de conectare la baza de date

include_once('mymedvet/include/config.php');

// Verifică dacă formularul a fost trimis

if(isset($_POST['submit']))
{

// Preia datele introduse de utilizator din formular

$name=$_POST['fullname'];
$email=$_POST['emailid'];
$mobileno=$_POST['mobileno'];
$dscrption=$_POST['description'];

// Execută interogarea SQL pentru a insera datele în tabela tblcontactus

$query=mysqli_query($con,"insert into tblcontactus(fullname,email,phoneNumber,message) value('$name','$email','$mobileno','$dscrption')");

// Afișează un mesaj de succes utilizatorului

echo "<script>alert('Informațile au fost adăugate cu succes.');</script>";

// Redirecționează utilizatorul către pagina principală

echo "<script>window.location.href ='index.php'</script>";

} ?>
<!doctype html>
<html lang="en">

<head>
<!-- Meta taguri pentru a defini setul de caractere și a face pagina responsiv -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Clinica - My Med Vet </title>

<!-- Linkuri către fișierele CSS externe -->

    <link rel="shortcut icon" href="customstyle/images/icon.png">
    <link rel="stylesheet" href="customstyle/css/bootstrap.min.css">
    <link rel="stylesheet" href="customstyle/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="customstyle/css/animate.css">
    <link rel="stylesheet" type="text/css" href="customstyle/css/style.css" />


</head>

<body>


        <!-- ################# Top Bar #######################--->

<section class="top-bar d-flex align-items-center fixed-top">
        <div class="container d-flex justify-content-between">
            <div class="contact-info d-flex align-items-center">

<!-- Informații de contact -->
                <i class="fas fa-envelope"></i> <a href="mailto:info.mymedvet@gmail.com">info.mymedvet@gmail.com</a>
                <i class="fas fa-phone"></i> +40 771 222 333
                <i class="fas fa-calendar-alt"></i> 07:00-20:00 (Luni-Vineri) | 08:00 - 14:00 (Sâmbătă) | Urgențe (Duminică)
            </div>
<!-- Linkuri către rețelele sociale -->
            <div class="d-none d-lg-flex social-links align-items-center">
                <a href="https://www.facebook.com/" target="_blank" class="facebook"><i class="fab fa-facebook"></i></a>
                <a href="https://www.instagram.com/" target="_blank" class="instagram"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
</section>

    <!-- ################# Header #######################--->
    
  <header id="menu-jk">
    
        <div id="nav-head" class="header-nav">
            <div class="container">
                <div class="row">
                        <div class="col-lg-2 col-md-3  col-sm-14" style="color:#0026ff; font-weight:bold; font-size:35px; margin-top: 1% !important;">MyMedVet
                       <a data-toggle="collapse" data-target="#menu" href="#menu" ><i class="fas d-block d-md-none small-menu fa-bars"></i></a>
                    </div>
                    <div id="menu" class="col-lg-10 col-md-9 d-none d-md-block nav-item">
                        <ul>
                            <li><a href="#">Acasă</a></li>
                            <li><a href="#about_us">Despre Noi</a></li>
                            <li><a href="#services">Servicii</a></li>
                            <li><a href="#petcover">Plan Asigurare</a></li>
                            <li><a href="#gallery">Galerie</a></li>
                            <li><a href="#contact_us">Contact</a></li>
                            <li><a href="#logins">Logare</a></li> 
                            <li><a href="mymedvet/user-login.php" class="btn btn-success" class="d-lg-block appoint">Programează-te</a></li> 
                        </ul>
                    </div> 
                 </div>
            </div>
        </div>
    </header>
    
 

      <!-- ################# SERVICII - CONSULTATII MEDICINA GENERALA #######################--->

<section id="services_general" class="services">

    <div class="container">
        <div class="inner-title">
            <h2>
                <span style="color: #378899;">Consultații și Medicină Generală</span>
            </h2>
                </div>
                    <div class="wpb_text_column wpb_content_element">
                                    <div class="wpb_wrapper">
                                        <table class="pricing-table">
                                            <thead>
                                                <tr>
                                                    <th width="775">
                                                        <h3><span style="color: #FFF;"></span></h3>
                                                    </th>
                                                    <th width="116">
                                                        <h3><span style="color: #FFF;">Tarif (LEI)</span></h3>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Consultație medicină generală</td>
                                                    <td>50</td>
                                                </tr>
                                                <tr>
                                                    <td>Recontrol</td>
                                                    <td>40-80</td>
                                                </tr>
                                                <tr>
                                                    <td>Microcipare- Identificare</td>
                                                    <td>60</td>
                                                </tr>
                                                <tr>
                                                    <td>Carnet de sănătate</td>
                                                    <td>15</td>
                                                </tr>
                                                <tr>
                                                    <td>Pașaport</td>
                                                    <td>60</td>
                                                </tr>
                                                 <tr>
                                                    <td>Eliberare adeverință medicală (străinătate)</td>
                                                    <td>35</td>
                                                </tr>
                                                <tr>
                                                    <td>Eliberare rețetă</td>
                                                    <td>15</td>
                                                </tr>
                                                <tr>
                                                    <td>Consultație dermatologie</td>
                                                    <td>60</td>
                                                </tr>
                                                <tr>
                                                    <td>Consultație oncologică </td>
                                                    <td>160</td>
                                                </tr>
                                                <tr>
                                                    <td>Consultație neurologică</td>
                                                    <td>200</td>
                                                </tr>
                                                <tr>
                                                    <td>Consultație ortopedică </td>
                                                    <td>100</td>
                                                </tr>
                                                <tr>
                                                    <td>Consultație cardiologică</td>
                                                    <td>100</td>
                                                </tr>
                                                <tr>
                                                    <td>Consultație la domiciliu</td>
                                                    <td>180</td>
                                                </tr>
                                                <tr>
                                                    <td>Consultație - a doua părere</td>
                                                    <td>150</td>
                                                </tr>
                                                <tr>
                                                    <td>Ecografie abdominală</td>
                                                    <td>200</td>
                                                </tr>
                                                <tr>
                                                    <td>Ecografie cardiacă (ecocardiografie)</td>
                                                    <td>140</td>
                                                </tr>
                                                <tr>
                                                    <td>Ecografie A-FAST/ T-FAST</td>
                                                    <td>120</td>
                                                </tr>
                                                <tr>
                                                    <td>Ecografie recontrol</td>
                                                    <td>45-80</td>
                                                </tr>
                                                <tr>
                                                    <td>Endoscopie digestivă superioară (cu prelevare probe dupa caz)</td>
                                                    <td>900-1700</td>
                                                </tr>
                                                <tr>
                                                    <td>Endoscopie digestivă inferioară (cu pregătire)</td>
                                                    <td>800-1200</td>
                                                </tr>
                                                <tr>
                                                    <td>Endoscopie căi aeriene (animale de talie medie-mare)</td>
                                                    <td>500-1000</td>
                                                </tr>
                                                <tr>
                                                    <td>Cistoscopie (vizualizare / urolitiaza-eliminare cristale)</td>
                                                    <td>400-1500</td>
                                                </tr>
                                                <tr>
                                                    <td>Otovideoscopie (extracție corp străin / prelevare probe)</td>
                                                    <td>300-700</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <!-- ################# SERVICII  VACCINARI SI DEPARAZITARI #######################--->

<section id="services_vaccinari" class="services">

    <div class="container">
        <div class="inner-title">
            <h2>
                <span style="color: #378899;">VACCINĂRI ȘI DEPARAZITĂRI</span>
            </h2>
                </div>
                    <div class="wpb_text_column wpb_content_element">
                                    <div class="wpb_wrapper">
                                        <table class="pricing-table">
                                            <thead>
                                                <tr>
                                                    <th width="775">
                                                        <h3><span style="color: #FFF;"></span></h3>
                                                    </th>
                                                    <th width="116">
                                                        <h3><span style="color: #FFF;">Tarif (LEI)</span></h3>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Vaccinare câine monovalent/polivalent</td>
                                                    <td>65</td>
                                                </tr>
                                                <tr>
                                                    <td>Vaccinare câine antirabic</td>
                                                    <td>50</td>
                                                </tr>
                                                <tr>
                                                    <td>Vaccinare pisicî polivalent/antirabic</td>
                                                    <td>45</td>
                                                </tr>
                                                <tr>
                                                    <td>Vaccin tusa de canisa</td>
                                                    <td>80</td>
                                                </tr>
                                                 <tr>
                                                    <td>Deparazitare internă câine (în funcție de talie)</td>
                                                    <td>50-150</td>
                                                </tr>
                                                <tr>
                                                    <td>Deparazitare internă pisică</td>
                                                    <td>35-100</td>
                                                </tr>
                                                <tr>
                                                    <td>Deparazitare externă câine</td>
                                                    <td>60 - 160</td>
                                                </tr>
                                                <tr>
                                                    <td>Deparazitare externă pisică </td>
                                                    <td>35 - 90</td>
                                                </tr>
                                                <tr>
                                                    <td>Teste rapide boli infecțioase</td>
                                                    <td>60 - 170</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<!-- ################# SERVICII STOMATOLOGICE #######################--->

<section id="services_vaccinari" class="services">

    <div class="container">
        <div class="inner-title">
            <h2>
                <span style="color: #378899;">STOMATOLOGIE</span>
            </h2>
                </div>
                    <div class="wpb_text_column wpb_content_element">
                                    <div class="wpb_wrapper">
                                        <table class="pricing-table">
                                            <thead>
                                                <tr>
                                                    <th width="775">
                                                        <h3><span style="color: #FFF;"></span></h3>
                                                    </th>
                                                    <th width="116">
                                                        <h3><span style="color: #FFF;">Tarif (LEI)</span></h3>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Extracții premolari sau molari</td>
                                                        <td>650-1600</td>
                                                </tr>
                                            <tr>
                                                    <td>Extracții incisivi</td>
                                                        <td>650-1300</td>
                                            </tr>
                                                <tr>
                                                    <td>Extractii canini</td>
                                                            <td>600-750</td>
                                                </tr>
                                            <tr>
                                                    <td>Închidere fisură oronazală</td>
                                                            <td>780-1300</td>
                                            </tr>
                                                <tr>
                                                    <td>Excizie chist glandă salivară</td>
                                                            <td>1600-2600</td>
                                                </tr>
                                            <tr>
                                                     <td>Detartraj pisică</td>
                                                        <td>400</td>
                                            </tr>
                                                <tr>
                                                    <td>Detartraj câine</td>
                                                            <td>500</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- ################# SERVICII ESTETICA #######################--->

<section id="services_vaccinari" class="services">

    <div class="container">
        <div class="inner-title">
            <h2>
                <span style="color: #378899;">ESTETICĂ</span>
            </h2>
                </div>
                    <div class="wpb_text_column wpb_content_element">
                                    <div class="wpb_wrapper">
                                        <table class="pricing-table">
                                            <thead>
                                                <tr>
                                                    <th width="775">
                                                        <h3><span style="color: #FFF;"></span></h3>
                                                    </th>
                                                    <th width="116">
                                                        <h3><span style="color: #FFF;">Tarif (LEI)</span></h3>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Spălat - Tuns - Coafat pisică</td>
                                                        <td>70</td>
                                                </tr>
                                            <tr>
                                                    <td>Spălat - Tuns - Coafat câine (talie mică spre mare)</td>
                                                        <td>75 - 300</td>
                                            </tr>
                                                <tr>
                                                    <td>Curăţat ochii </td>
                                                            <td>20</td>
                                                </tr>
                                            <tr>
                                                    <td>Descâlcit blană</td>
                                                            <td>50 pe oră</td>
                                            </tr>
                                                <tr>
                                                    <td>Curăţat urechi</td>
                                                            <td>30</td>
                                                </tr>
                                            <tr>
                                                     <td>Măşti tratament blană (talie mică spre mare)</td>
                                                        <td>40 - 100</td>
                                            </tr>
                                                <tr>
                                                    <td>Curăţat și tratament pernuţe </td>
                                                            <td>45</td>
                                                </tr>
                                            <tr>
                                                    <td>Tăiat unghii</td>
                                                            <td>25</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<!-- ################# SERVICII ANALIZE LABORATOR #######################--->

<section id="services_vaccinari" class="services">

    <div class="container">
        <div class="inner-title">
            <h2>
                <span style="color: #378899;">ANALIZE LABORATOR</span>
            </h2>
                </div>
                    <div class="wpb_text_column wpb_content_element">
                                    <div class="wpb_wrapper">
                                        <table class="pricing-table">
                                            <thead>
                                                <tr>
                                                    <th width="775">
                                                        <h3><span style="color: #FFF;"></span></h3>
                                                    </th>
                                                    <th width="116">
                                                        <h3><span style="color: #FFF;">Tarif (LEI)</span></h3>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                    <td>Examene de laborator (externe clinicii)</td>
                                                        <td>20 - 1800</td>
                                            </tr>
                                            <tr>
                                                    <td>Hemoleucograma</td>
                                                        <td>70</td>
                                            </tr>
                                                <tr>
                                                    <td>Profil diagnostic complet (biochimie) </td>
                                                            <td>250</td>
                                                </tr>
                                            <tr>
                                                    <td>Profil diagnostic (Prep II)</td>
                                                            <td>180</td>
                                            </tr>
                                                <tr>
                                                    <td>Profil Avian/Reptile</td>
                                                            <td>200</td>
                                                </tr>
                                            <tr>
                                                     <td>Sumar urina (biochimie+sediment)</td>
                                                        <td>100</td>
                                            </tr>
                                                <tr>
                                                    <td>Sumar urina complex (Abaxis) </td>
                                                            <td>125</td>
                                                </tr>
                                            <tr>
                                                    <td>Recontrol sumar urina (examen biochimic simplu)</td>
                                                            <td>50</td>
                                            </tr>

                                                 <tr>
                                                    <td>Examen coproparazitologic </td>
                                                            <td>80</td>
                                                </tr>
                                            <tr>
                                                    <td>Test supresie cu dexametazona</td>
                                                            <td>350</td>
                                            </tr>
                                                <tr>
                                                    <td>Test simulare cu ACTH (manopera)</td>
                                                            <td>350</td>
                                                </tr>
                                            <tr>
                                                     <td>Microhematocrit (fara recoltare)</td>
                                                        <td>25</td>
                                            </tr>
                                                <tr>
                                                    <td>Examen citopatologic (citologie) </td>
                                                            <td>100 - 450</td>
                                                </tr>
                                            <tr>
                                                    <td>Coagulometrie (fara recoltare)</td>
                                                            <td>200</td>
                                            </tr>
                                                  <tr>
                                                    <td>Examen histopatologic </td>
                                                            <td>300 - 700</td>
                                                </tr>
                                            <tr>
                                                    <td>Micocultura si antimicograma (laborator clinică)</td>
                                                            <td>200</td>
                                            </tr>
                                                <tr>
                                                    <td>Cultura si antibiograma (laborator clinică)</td>
                                                            <td>350</td>
                                                </tr>
                                            <tr>
                                                     <td>Test Cross-match</td>
                                                        <td>220</td>
                                            </tr>
                                                <tr>
                                                    <td>Test Coombs-câine </td>
                                                            <td>250</td>
                                                </tr>
                                            <tr>
                                                    <td>Determinare grupă sanguină pisică</td>
                                                            <td>200</td>
                                            </tr>
                                            <tr>
                                                    <td>Determinare grupă sanguină câine </td>
                                                            <td>200</td>
                                            </tr>
                                            <tr>
                                                    <td>Interpretare frotiu sânge (păsări/reptile) </td>
                                                            <td>120</td>
                                            </tr>
                                            <tr>
                                                    <td>Curba glicemie (fara restul terapiei) </td>
                                                            <td>160</td>
                                            </tr>
                                            <tr>
                                                    <td>ASTRUP </td>
                                                            <td>140</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<!-- ################# SERVICII CHIRURGIE #######################--->

<section id="services_vaccinari" class="services">

    <div class="container">
        <div class="inner-title">
            <h2>
                <span style="color: #378899;">CHIRURGIE</span>
            </h2>
                </div>
                    <div class="wpb_text_column wpb_content_element">
                                    <div class="wpb_wrapper">
                                        <table class="pricing-table">
                                            <thead>
                                                <tr>
                                                    <th width="775">
                                                        <h3><span style="color: #FFF;"></span></h3>
                                                    </th>
                                                    <th width="116">
                                                        <h3><span style="color: #FFF;">Tarif (LEI)</span></h3>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <td width="528"><strong>ORTOPEDIE ȘI NEUROCHIRURGIE (cu anestezie)</strong></td>
                                        <td width="94"></td>
                                            <tr>
                                                    <td>Fractura – reducere închisă</td>
                                                        <td>720 - 1000</td>
                                            </tr>
                                            <tr>
                                                    <td>Fractura – pining, șuruburi, fixator extern</td>
                                                        <td>1200 - 3500</td>
                                            </tr>
                                                <tr>
                                                    <td>Fractură – remediere cu plăcuțe</td>
                                                            <td>1000 - 3200</td>
                                                </tr>
                                            <tr>
                                                    <td>Luxație – repunere închisă</td>
                                                            <td>400</td>
                                            </tr>
                                                <tr>
                                                    <td>Luxație -repunere deschisă</td>
                                                            <td>800 - 1200</td>
                                                </tr>
                                        <td width="528"><strong>PIELE</strong></td>
                                        <td width="94"></td>
                                            <tr>
                                                    <td>Tratare plaga</td>
                                                        <td>120 - 1000</td>
                                            </tr>
                                            <tr>
                                                    <td>Abcese – explorare și drenaj</td>
                                                        <td>100 - 600</td>
                                            </tr>
                                                <tr>
                                                    <td>Tratament cutanat</td>
                                                            <td>200 - 2000</td>
                                                </tr>
                                            <tr>
                                                    <td>Extractie corp străin interdigital</td>
                                                            <td>220 - 600</td>
                                            </tr>
                                                <tr>
                                                    <td>Excizie formațiuni cutanate mici</td>
                                                            <td>300 - 800</td>
                                                </tr>
                                           <td width="528"><strong>Alte manopere chirurgicale</strong></td>
                                        <td width="94">200 - 3500</td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <!-- ################# Footer #######################--->


    <footer class="footer">
    <div class="container">
        <div class="row">
            <!-- Link-uri Utile -->
            <div class="col-md-3 col-sm-8">
                <h2>Link-uri Utile</h2>
            <ul class="list-unstyled link-list">
                    <li><a ui-sref="about_us" href="index.php">Despre Noi<i class="fa fa-angle-right"></i></a></li>
                    <li><a ui-sref="portfolio" href="index.php">Servicii<i class="fa fa-angle-right"></i></a></li>
                    <li><a ui-sref="products" href="index.php">Logare<i class="fa fa-angle-right"></i></a></li>
                    <li><a ui-sref="gallery" href="index.php">Galerie<i class="fa fa-angle-right"></i></a></li>
                    <li><a ui-sref="contact_us" href="index.php">Contact<i class="fa fa-angle-right"></i></a></li>
                </ul>
            </div>

            <!-- Contacteaza-ne -->
            <div class="col-md-3 col-sm-8 map-img">
                <h2>Contacteaza-ne</h2>
                <address class="md-margin-bottom-40">
                    <?php
                    $ret = mysqli_query($con, "select * from tblpage where PageType='contactus' ");
                    while ($row = mysqli_fetch_array($ret)) {
                    ?>
                    <?php echo $row['PageDescription']; ?> <br><br>
                    Telefon: <?php echo $row['MobileNumber']; ?> <br><br>
                    E-mail: <a href="mailto:<?php echo $row['Email']; ?>" class=""><?php echo $row['Email']; ?></a><br><br>
                    Program: <?php echo $row['OpeningTime']; ?>
                </address>
                <?php } ?>
            </div>

            <!-- Hartă -->
            <div class="col-md-3 col-sm-8">
                <h2>Localizare</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2764.1349155816124!2d21.333068099999995!3d46.148059499999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474599414d2d86bf%3A0x9c7c5c4d97b319de!2sStrada%20Magherean%2017%2C%20Arad%2C%20Rum%C3%A4nien!5e0!3m2!1sde!2sde!4v1716836109608!5m2!1sde!2sde" width="170%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

            <!-- Conectați-vă cu noi -->
            <div class="col-md-5 col-sm-8">
                <h2>Conectați-vă cu noi</h2>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="https://www.facebook.com/index.php/" class="social-link facebook-logo"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="list-inline-item"><a href="https://www.instagram.com/?hl=en" class="social-link instagram-logo"><i class="fab fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="https://accounts.google.com/v3/signin/identifier?ifkv=AS5LTAQ0jgYiWL9x6DFHmmosD8uhFprjRwPY91SuzWRj8ESZJlt6A2VEGGJIxdF2YYjAJ97oXtld&service=mail&flowName=GlifWebSignIn&flowEntry=ServiceLogin&dsh=S788912565%3A1717678496013480&ddm=0" class="social-link mail-logo"><i class="fas fa-envelope"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>


    <div class="copy">
            <div class="container">
         <div class="bg-header py-2 text-center text-white">
      <p class="p-0 m-0"> Clinica My Med Vet &copy; <?php echo date('Y')?> - Ursa Maria Ruxanda</p>
    </div>
                
     
            </div>

        </div>
    
    </body>

<script src="customstyle/js/jquery-3.2.1.min.js"></script>
<script src="customstyle/js/popper.min.js"></script>
<script src="customstyle/js/bootstrap.min.js"></script>
<script src="customstyle/plugins/scroll-nav/js/jquery.easing.min.js"></script>
<script src="customstyle/plugins/scroll-nav/js/scrolling-nav.js"></script>
<script src="customstyle/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="customstyle/js/script.js"></script>

</html>