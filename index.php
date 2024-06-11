
<?php
include_once('mymedvet/include/config.php');
if(isset($_POST['submit']))
{
$name=$_POST['fullname'];
$email=$_POST['emailid'];
$mobileno=$_POST['mobileno'];
$dscrption=$_POST['description'];
$query=mysqli_query($con,"insert into tblcontactus(fullname,email,phoneNumber,message) value('$name','$email','$mobileno','$dscrption')");
echo "<script>alert('Your information succesfully submitted');</script>";
echo "<script>window.location.href ='index.php'</script>";

} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Clinica - My Med Vet </title>

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
                <i class="fas fa-envelope"></i> <a href="mailto:info.mymedvet@gmail.com">info.mymedvet@gmail.com</a>
                <i class="fas fa-phone"></i> +40 771 222 333
                <i class="fas fa-calendar-alt"></i> 07:00-20:00 (Luni-Vineri) | 08:00 - 14:00 (Sâmbătă) | Urgențe (Duminică)
            </div>
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
    
    <!-- ################# Slider #######################--->

    <div class="slider-detail">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>


            <div class="carousel-inner">
                <div class="carousel-item ">
                    <img class="d-block w-100" src="customstyle/images/slider/slider_2.jpeg" alt="Second slide">
                    <div class="carousel-cover"></div>
                    <div class="carousel-caption vdg-cur d-none d-md-block">
                        <h5 class="animated bounceInDown">Clinica My Med Vet</h5>
                        <h6 class="animated bounceInDown">Mereu acolo pentru voi</h6>


                    </div>
                </div>

                <div class="carousel-item active">
                    <img class="d-block w-100" src="customstyle/images/slider/slider3.jpeg" alt="Third slide">
                      <div class="carousel-cover"></div>
                    <div class="carousel-caption vdg-cur d-none d-md-block">
                        <h4 class="animated bounceInDown">Clinica My Med Vet</h4>
                        <h5 class="animated bounceInDown">Relaxați-vă, de restul avem noi grijă!</h5>


                    </div>
                </div>


            </div>

            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Următorul</span>
            </a>
        </div>


    </div>

<!-- ################# Despre Noi #######################--->
        
    <section id="about_us" class="about-us">
        <div class="row">

                <div class="col-lg-4 col-md-6 about-us-box">
                <img src="customstyle\images/desprenoi.jpeg">
            </div>

     
            <div class="col-md-6 about-us-box">
                <h3>Despre clinica noastră</h3>
                <br>
        <?php
            $ret=mysqli_query($con,"select * from tblpage where PageType='aboutus' ");
            while ($row=mysqli_fetch_array($ret)) {
            ?>

    <p><?php  echo $row['PageDescription'];?></p><?php } ?>

            </div>



        </div>


    </section>       

<!-- ################# Servicii #######################--->


    <section id="services" class="key-features department">
        <div class="container">
            <div class="inner-title">

                <h2>Serviciile noastre</h2>
                <h3><a href="services.php"><strong>Apăsați aici pentru prețuri</strong></a></h3>
                    
            </div>
               

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <a href="#petcover"><i class="fas fa-heartbeat"></i></a>
                        <h5><a href="#petcover">Asigurări veterinare</a></h5>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <a href="services.php" target="_blank"><i class="fas fa-ribbon"></i></a>
                        <h5><a href="services.php" target="_blank">Vaccinări și sterilizări</a></h5>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                       <i class="fab fa-monero"></i>
                        <h5><a href="services.php" target="_blank">Consultații veterinare și chirurgie</a></h5>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-capsules"></i>
                        <h5><a href="services.php" target="_blank">Tratamente veterinare</a></h5>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-prescription-bottle-alt"></i>
                        <h5><a href="services.php" target="_blank">Analize Laborator</a></h5>
                    </div>
                </div>



                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <a href="services.php"><i class="far fa-thumbs-up"></i></a>
                        <h5><a href="services.php" target="_blank">Stomatologie și Estetică</a></h5>

                    </div>
                </div>
            </div>

        </div>

    </section>
    
<!-- ################# Plan Asigurare #######################--->

    <section id="petcover" class="petcover">
    <div class="container">
        <div class="inner-title">
        <h2>Plan de Asigurare - Petcover</h2>
        <p>Asigurati animalul de companie pentru orice eventualitate (preventie sau boala)</p>
      </div>
         <div class="row">
                <!-- Card pentru Planul Basic -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-70">
                        <img src="customstyle\images\paw-basic.jpg" class="card-img-top custom-img-size" alt="Plan Basic">
                        <div class="card-body">
                            <h5 class="card-title">Plan Basic</h5>
                            <ul class="list-unstyled mt-4 mb-4">
                                <li>- Consultație amănunțită x2/an</li>
                                <li>- Vaccinuri anuale</li>
                                <li>- Examen hematologic x1/an</li>
                                <li>- Profil biochimic complet x1/an</li>
                                <li>- Examen coproparazitologic x2/an</li>
                                <li>- Deparazitare x2/an</li>
                                <li>- Vizite medicale x3/an</li>
                            </ul>
                        </div>
                        <div class="p-section11">
                            <h6>396 Lei/ an - cu Discount</h6>
                        </div>
                        <div class="p-section1">
                            <h6>36 Lei/ lună</h6>
                        </div>
                    </div>
                </div>

                <!-- Card pentru Planul Normal -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-70">
                        <img src="customstyle\images\paw-standard.jpg" class="card-img-top custom-img-size" alt="Plan Normal">
                        <div class="card-body">
                            <h5 class="card-title">Plan Normal</h5>
                            <ul class="list-unstyled mt-4 mb-4">
                                <li>- Consultație amănunțită x2/an</li>
                                <li>- Vaccinuri anuale</li>
                                <li>- Examen hematologic x1/an</li>
                                <li>- Profil biochimic complet x1/an</li>
                                <li>- Examen coproparazitologic x2/an</li>
                                <li>- Deparazitare x2/an</li>
                                <li>- Vizite medicale x3/an</li>
                                <li>- Teste rapide boli infecțioase și urină</li>
                                <li>- Teste urină</li>
                                <li>- Tratament complet estetică x1/an</li>
                            </ul>
                        </div>
                        <div class="p-section12">
                            <h6>528 Lei/ an - cu Discount</h6>
                        </div>
                        <div class="p-section2">
                            <h6>48 Lei/ lună</h6>
                        </div>
                    </div>
                </div>

                <!-- Card pentru Planul Premium -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-70">
                        <img src="customstyle\images\paw-premium.jpg" class="card-img-top custom-img-size" alt="Plan Premium">
                        <div class="card-body">
                            <h5 class="card-title">Plan Premium</h5>
                            <ul class="list-unstyled mt-4 mb-4">
                                <li>- Consultație amănunțită x2/an</li>
                                <li>- Vaccinuri anuale</li>
                                <li>- Examen hematologic x1/an</li>
                                <li>- Profil biochimic complet x1/an</li>
                                <li>- Examen coproparazitologic x2/an</li>
                                <li>- Deparazitare x2/an</li>
                                <li>- Vizite medicale x1/lună</li>
                                <li>- Teste rapide boli infecțioase și urină</li>
                                <li>- Igienizare orală - detartaj cu ultrasunete</li>
                                <li>- Ecografie</li>
                                <li>- Teste tiroidă</li>
                                <li>- Tratament complet estetică x1/an</li>
                            </ul>
                        </div>
                        <div class="p-section13">
                            <h6>649 Lei/ an - cu Discount</h6>
                        </div>
                        <div class="p-section3">
                            <h6>59 Lei/ lună</h6>
                        </div>
                    </div>


                </div>
            </div>


            </div>

        </div>

    </div>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
        </section> 
    
    
    <!-- ################# Galerie #######################--->

        <div id="gallery" class="gallery">    
           <div class="container">
              <div class="inner-title">

                <h2>Galerie</h2>
                <p>Ofertele noastre - pentru toate tipurile de animale de companie</p>
            </div>
              <div class="row">
                

        <div class="gallery-filter d-none d-sm-block">
            <button class="btn btn-default filter-button" data-filter="all">Toate</button>
            <button class="btn btn-default filter-button" data-filter="hdpe">Detartraj canin/felin</button>
            <button class="btn btn-default filter-button" data-filter="sprinkle">Vaccinări și Sterilizări</button>
            <button class="btn btn-default filter-button" data-filter="spray">Estetică</button>
            <button class="btn btn-default filter-button" data-filter="irrigation">Consultații</button>
        </div>
        <br/>



            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                <img src="customstyle/images/galerie/99_detartraj_pisica.jpg" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sprinkle">
                <img src="customstyle/images/galerie\103_vaccinare_anuala_canina.jpg" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                <img src="customstyle/images/galerie/100_detartraj.jpg" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sprinkle">
                <img src="customstyle/images/galerie\105_vaccinare_anuala_felina.jpg" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation">
                <img src="customstyle/images/galerie\109_consult_pasari.jpg" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter spray">
                <img src="customstyle/images/galerie\101_estetica_canina.jpg" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation">
                <img src="customstyle/images/galerie\110_consultatii.jpg" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sprinkle">
                <img src="customstyle/images/galerie\104_sterilizare.jpg" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation">
                <img src="customstyle/images/galerie\107_consult_reptile.jpg" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter spray">
                <img src="customstyle/images/galerie\102_estetica_pisica.jpg" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sprinkle">
                <img src="customstyle/images/galerie\106_sterilizare_caini.jpg" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation">
                <img src="customstyle/images/galerie\108_consult_iepuri.jpg" class="img-responsive">
            </div>

        </div>
    </div>
       
       </div>

    <!-- ################# Contact #######################--->
    
    <section id="contact_us" class="contact-us-single">
        <div class="container">
              <div class="inner-title">
                <h2>Contact și Hartă Locație</h2>

    
            <div  class="mt-5 mb-4 cop-ck">
        <h2>Formular Contact</h2>
                <form method="post">

                    <div class="row cf-ro">
                        <div  class="col-sm-4"><label>Introduceți Numele :</label></div>
                        <div class="col-sm-8"><input type="text" placeholder="Nume/Prenume complet" name="fullname" class="form-control input-sm" required ></div>
                    </div>

                    <div  class="row cf-ro">
                        <div  class="col-sm-4"><label>Adresa E-mail :</label></div>
                        <div class="col-sm-8"><input type="text" name="emailid" placeholder="Exemplu: nume.prenume@gmail.com" class="form-control input-sm"  required></div>
                    </div>

                     <div  class="row cf-ro">
                        <div  class="col-sm-4"><label>Număr Telefon:</label></div>
                        <div class="col-sm-8">
                        <input type="text" name="mobileno" placeholder="Numar telefon mobil sau fix" class="form-control input-sm" required ></div>
                    </div>

                    <div  class="row cf-ro">
                        <div  class="col-sm-4"><label>Introduceți Mesajul:</label></div>
                        <div class="col-sm-8">
                          <textarea rows="5" placeholder="Scrieti-ne despre ce este vorba" class="form-control input-sm" name="description" required></textarea>
                        </div>
                    </div>

                     <div  class="row cf-ro">
                        <div  class="col-sm-4"></div>
                        <div class="col-sm-5">
                         <button class="btn btn-success btn-sm" type="submit" name="submit">Trimite-ti Mesajul</button>
                        </div>
                    </div>
            </form>
        
            </div>
            </div>

            <div  class="col-sm-12 mt-5 mb-4">
                <h3>Locație Hartă</h3>
                <p>Str. Magherean nr. 17, Arad, 310241 Romania</p>
        <br>
        <div class="mapouter"><div class="gmap_canvas"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2764.1349155816124!2d21.333068099999995!3d46.148059499999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474599414d2d86bf%3A0x9c7c5c4d97b319de!2sStrada%20Magherean%2017%2C%20Arad%2C%20Rum%C3%A4nien!5e0!3m2!1sde!2sde!4v1716836109608!5m2!1sde!2sde" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
            </div>
        </div>
        </div>
        </section>

    <!-- ################# Logare #######################--->
    
    
     <section id="logins" class="our-blog container-fluid flex">
        <div class="container">
        <div class="inner-title">

                <h2>Logare Cont</h2>
            </div>
            <div class="col-sm-12 blog-cont">
                <div class="row no-margin">
                    <div class="col-sm-4 blog-smk">
                        <div class="blog-single">

                                <img src="customstyle/images/client5.jpg" alt="">

                            <div class="blog-single-det">
                                <h6>Cont Client</h6>
                                <a href="mymedvet/user-login.php" target="_blank">
                                    <button class="btn btn-success btn-sm">Apasa aici</button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 blog-smk">
                        <div class="blog-single">

                                <img src="customstyle/images/docvet.jpg" alt="">

                            <div class="blog-single-det">
                                <h6>Cont Veterinar</h6>
                                <a href="mymedvet/doctor" target="_blank">
                                    <button class="btn btn-success btn-sm">Apasa aici</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-4 blog-smk">
                        <div class="blog-single">

                                <img src="customstyle/images/admin1.png" alt="">

                            <div class="blog-single-det">
                                <h6>Cont Admin</h6>
                    
                                <a href="mymedvet/admin" target="_blank">
                                    <button class="btn btn-success btn-sm">Apasa aici</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>


            </div>
            
        </div>


    </section>  
    

    
    
    <!-- ################# Footer #######################--->


    <footer class="footer">
    <div class="container">
        <div class="row">
            <!-- Link-uri Utile -->
            <div class="col-md-3 col-sm-8">
                <h2>Link-uri Utile</h2>
                <ul class="list-unstyled link-list">
                    <li><a ui-sref="about_us" href="#about_us">Despre Noi<i class="fa fa-angle-right"></i></a></li>
                    <li><a ui-sref="portfolio" href="#services">Servicii<i class="fa fa-angle-right"></i></a></li>
                    <li><a ui-sref="products" href="#logins">Logare<i class="fa fa-angle-right"></i></a></li>
                    <li><a ui-sref="gallery" href="#gallery">Galerie<i class="fa fa-angle-right"></i></a></li>
                    <li><a ui-sref="contact_us" href="#contact_us">Contact<i class="fa fa-angle-right"></i></a></li>
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