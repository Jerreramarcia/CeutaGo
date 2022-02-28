<?php
session_start();



require_once("class/database.php");

$db = new database();
$dbUsers = new database();
$db = $db->connect();

$userCount = $dbUsers->getUsers($db);

if(isset($_POST['cierra'])){

    session_destroy();
    header("location:index.php");

}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <script src="class/jquery-3.5.1.min.js"></script>
    <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CeutaGo - Inicio</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Favicons -->
    <!-- JUANMA: LOGOS-->
  <link href="assets/img/logos/logo.png" rel="icon">
  <link href="assets/img/logos/logo.png" rel="apple-touch-icon">
    <!-- -->
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio - v3.7.0
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="assets/img/logos/logo.png" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.php">
                <?php
                /*
                 *
                 * Aqui se hace comprobacion de si se inicia sesion para poder poner boton o info de usuario
                 *
                 * */
                if(isset($_SESSION["user"])) {
                    require_once("class/usuario.php");
                    $userID = $_SESSION["user"];
                    $user = new usuario();
                    $name = $user->getName($userID);
                    echo $name;
                    echo "<br>";
                    echo "<p style='font-size: 20px' id='Example'> " . $user->getPoints($userID) . " puntos</p>";
                    ?>

                    <form method="post" action="userGest/login.php">
                        <button type="submit" class="btn btn-success">Cerrar sesion</button>
                    </form>

                    <?php



                }
                else{
                ?>

                    <a href="userGest/login.php">Iniciar Sesión</a>
                <?php

                    }
                    ?>


            </a></h1>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Inicio</span></a></li>
          <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Cómo funciona</span></a></li>
          <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Por dónde empezar ...</span></a></li>
          <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>¡A gastar puntos!</span></a></li>
            <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Colaboraciones</span></a></li>
          <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contacto</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1>CeutaGo</h1>
    </div>

      <p style="color: black">Ceuta con <span class="typed" style="background: linear-gradient(lightblue,dodgerblue); color: black" data-typed-items=" mejor precio, mejores lugares, la mejor compañía"></span></p>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>Cómo funciona</h2>
          <p>Nuestro objetivo es dar a hacer que los viajes a Ceuta sean lo mas enriquecedores posibles. Premiando descubrir la ciudad y los lugares que esconde</p>
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="assets/img/background/ceutaMirador.jpg" class="img-fluid" alt="Imagen obtenida de: https://www.minube.com/fotos/ceuta-c233258#">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3>Conoce Ceuta y gana puntos completando tareas</h3>
            <p style="font-weight: bold">
              ¿Qué son los puntos?
                <p>
                  Los puntos se consiguen visitandos puntos de interés en la ciudad, así como disfrutando de su gastronomía.
                  Estos puntos se podrán usar para recibir <b>descuentos en tiendas</b> o incluso para <b>rebajar el precio del billete de barco.</b>
                </p>
            </p>
            <div class="row">

              <div class="col-lg-6">
                  <br>
                <ul>
                  <li>No residentes</li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Zona de interés:</strong> <span> 200 puntos</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Gastronomía:</strong> <span> 100 puntos</span></li>

                </ul>
              </div>
              <div class="col-lg-6">
                  <br>
                <ul>
                  <li>Residentes</li>

                  <li><i class="bi bi-chevron-right"></i> <strong>Zona de interés:</strong> <span>100 puntos</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Gastronomía:</strong> <span> 200 puntos</span></li>

                </ul>
              </div>
            </div>
            <p>
              Sin embargo, estos puntos tienen un límite de adquisición mensual, por lo que ¡aprovecha e intenta obtener el máximo durante tu viaje!
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Facts Section ======= -->
    <section id="facts" class="facts">
      <div class="container">

        <div class="section-title">
          <h2>Datos</h2>
          <p>RELLENAR NO SE TE OLVIDE PONER ALGUN TIPO DE TEXTO LINEA 167</p>
        </div>

        <div class="row no-gutters">

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $userCount?>" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Usuarios registrados</strong></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="count-box">
              <i class="bi bi-journal-richtext"></i>

                <?php
                    $totalTasks = $dbUsers->getTasks($db);

                ?>

              <span data-purecounter-start="0" data-purecounter-end="<?php echo $totalTasks?>" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Lugares de interés</strong> (propios)</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="count-box">
              <i class="bi bi-headset"></i>
              <span data-purecounter-start="1.0" data-purecounter-end="24" data-purecounter-duration="5" class="purecounter"></span>
              <p><strong>Atención las 24 horas (salvo martes y jueves)</strong></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="300">
            <div class="count-box">
              <i class="bi bi-people"></i>
                <!--ID 1X0-->
                <?php
                    $totalPoints = $dbUsers->getPoints($db); //Funcion que recoge los puntos desde la tabla task
                    if(is_nan($totalPoints)){
                        $totalPoints = 0;
                    }
                ?>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $totalPoints?>" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong></strong> puntos obtenidos por los usuarios</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Facts Section -->
      <!-- HE PENSADO QUE ESTA PARTE NO SABIA BIEN COMO INTEGRARLA Y METER INFO POR LO QUE
           LA HE OMITIDO PERO SI TIENES ALGO EN MENTE DALE (ME REFIERO A ESE SECTION COMENTADO-->


    <!-- ======= Skills Section =======
    <section id="skills" class="skills section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Skills</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row skills-content">

          <div class="col-lg-6" data-aos="fade-up">

            <div class="progress">
              <span class="skill">HTML <i class="val">70%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">C++ <i class="val">80%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">PHP <i class="val">75%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

            <div class="progress">
              <span class="skill">Python <i class="val">50%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">Redes <i class="val">30%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">Photoshop <i class="val">60%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

          </div>

        </div>

      </div>
    </section>
    -->
    <!-- End Skills Section -->

    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
      <div class="container">

        <div class="section-title">
          <h2>Por dónde empezar ...</h2>
          <p>Si eres nuevo en la ciudad y no sabes que visitar, aquí te dejamos algunas recomendaciones</p>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-up">
            <h3 class="resume-title">Gastronomía</h3>


            <div class="resume-item">
              <h4>Restaurante Oasis</h4>
              <h5>€€ - €€€</h5>
              <p><em>Carretera San Antonio Monte Hacho s/n., 51001 Ceuta España</em></p>
                <svg class="RWYkj d H0" viewBox="0 0 128 24" width="88" height="16" aria-label="4,5 de 5 burbujas" title="4,5 de 5 burbujas"><path d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12z" transform=""></path><path d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12z" transform="translate(26 0)"></path><path d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12z" transform="translate(52 0)"></path><path d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12z" transform="translate(78 0)"></path><path d="M 12 0C5.389 0 0 5.389 0 12c0 6.62 5.389 12 12 12 6.62 0 12-5.379 12-12S18.621 0 12 0zm0 2a9.984 9.984 0 0110 10 9.976 9.976 0 01-10 10z" transform="translate(104 0)"></path></svg>
                <a href="https://www.tripadvisor.es/Restaurant_Review-g187504-d4106783-Reviews-Oasis-Ceuta.html"><span class="eBTWs">460<!-- --> opiniones</span></a>

            </div>
            <div class="resume-item">
              <h4>Restaurante Bugao</h4>
              <h5>€€€€</h5>
              <p><em>15, Calle Independencia 51001, 51001 Ceuta España</em></p>
                <svg class="RWYkj d H0" viewBox="0 0 128 24" width="88" height="16" aria-label="4,0 de 5 burbujas" title="4,0 de 5 burbujas"><path d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12z" transform=""></path><path d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12z" transform="translate(26 0)"></path><path d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12z" transform="translate(52 0)"></path><path d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12z" transform="translate(78 0)"></path><path d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12zm0 2a9.983 9.983 0 019.995 10 10 10 0 01-10 10A10 10 0 012 12 10 10 0 0112 2z" transform="translate(104 0)"></path></svg>
                <a href="https://www.tripadvisor.es/Restaurant_Review-g187504-d7059746-Reviews-Restaurante_Bugao-Ceuta.html"><span class="eBTWs">214<!-- --> opiniones</span></a>
            </div>

              <div class="resume-item">
                  <h4>El Camaron</h4>
                  <h5>€</h5>
                  <p><em>Lugar Grupo Juan Carlos I 42 Bajo, 51002 Ceuta España</em></p>
                  <svg class="RWYkj d H0" viewBox="0 0 128 24" width="88" height="16" aria-label="4,5 de 5 burbujas" title="4,5 de 5 burbujas"><path d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12z" transform=""></path><path d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12z" transform="translate(26 0)"></path><path d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12z" transform="translate(52 0)"></path><path d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12z" transform="translate(78 0)"></path><path d="M 12 0C5.389 0 0 5.389 0 12c0 6.62 5.389 12 12 12 6.62 0 12-5.379 12-12S18.621 0 12 0zm0 2a9.984 9.984 0 0110 10 9.976 9.976 0 01-10 10z" transform="translate(104 0)"></path></svg>
                  <a href="https://www.tripadvisor.es/Restaurant_Review-g187504-d8389330-Reviews-El_Camaron-Ceuta.html"><span class="eBTWs">46<!-- --> opiniones</span></a>
              </div>
          </div>




          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
              <h3 class="resume-title">Turismo</h3>
              <div class="resume-item">
                  <h4>El Conjunto Monumental de las Murallas Reales</h4>
                  <h5>"N.º 1 de 157 cosas que hacer en Ceuta" (tripadvisor)</h5>
                  <p><em>Plaza de Armas de las Murallas Reales, Av. San Francisco Javier, 3, 51001 Ceuta</em></p>
                  <svg class="RWYkj d H0" viewBox="0 0 128 24" width="88" height="16" aria-label="" title=""><path d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12z" transform=""></path><path d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12z" transform="translate(26 0)"></path><path d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12z" transform="translate(52 0)"></path><path d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12z" transform="translate(78 0)"></path><path d="M 12 0C5.389 0 0 5.389 0 12c0 6.62 5.389 12 12 12 6.62 0 12-5.379 12-12S18.621 0 12 0zm0 2a9.984 9.984 0 0110 10 9.976 9.976 0 01-10 10z" transform="translate(104 0)"></path></svg>
                  <a href="https://www.tripadvisor.es/Attraction_Review-g187504-d546200-Reviews-El_Conjunto_Monumental_de_las_Murallas_Reales-Ceuta.html"> <span class="WlYyy diXIH bGusc dDKKM"><span class="cfIVb">316 opiniones</span></span></a>
              </div>


            <div class="resume-item">
              <h4>Parque Marítimo del Mediterráneo</h4>
              <h5>
                  "N.º 2 de 157 cosas que hacer en Ceuta" (tripadvisor)</h5>
              <p><em>Parque Marítimo del Mediterráneo, Avenida Compañía de Mar, s/n, 51004 Ceuta</em></p>
                <svg class="RWYkj d H0" viewBox="0 0 128 24" width="88" height="16" aria-label="" title=""><path d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12z" transform=""></path><path d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12z" transform="translate(26 0)"></path><path d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12z" transform="translate(52 0)"></path><path d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12z" transform="translate(78 0)"></path><path d="M 12 0C5.389 0 0 5.389 0 12c0 6.62 5.389 12 12 12 6.62 0 12-5.379 12-12S18.621 0 12 0zm0 2a9.984 9.984 0 0110 10 9.976 9.976 0 01-10 10z" transform="translate(104 0)"></path></svg>
                <a href="https://www.tripadvisor.es/Attraction_Review-g187504-d2363680-Reviews-Parque_Maritimo_del_Mediterraneo-Ceuta.html"><span class="WlYyy diXIH bGusc dDKKM"><span class="cfIVb">326 opiniones</span></span></a>
            </div>

              <div class="resume-item">
                  <h4>Playa de la Ribera</h4>
                  <h5>"N.º 5 de 157 cosas que hacer en Ceuta" (tripadvisor)</h5>
                  <p><em>Playa de la Ribera, 51001 Ceuta</em></p>
                  <svg class="RWYkj d H0" viewBox="0 0 128 24" width="88" height="16" aria-label="" title=""><path d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12z" transform=""></path><path d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12z" transform="translate(26 0)"></path><path d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12z" transform="translate(52 0)"></path><path d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12z" transform="translate(78 0)"></path><path d="M 12 0C5.389 0 0 5.389 0 12c0 6.62 5.389 12 12 12 6.62 0 12-5.379 12-12S18.621 0 12 0zm0 2a9.984 9.984 0 0110 10 9.976 9.976 0 01-10 10z" transform="translate(104 0)"></path></svg>
                  <a href="https://www.tripadvisor.es/Attraction_Review-g187504-d9867106-Reviews-Playa_de_la_Ribera-Ceuta.html"><span class="WlYyy diXIH bGusc dDKKM"><span class="cfIVb">50 opiniones</span></span></a>
              </div>


          </div>
        </div>

      </div>
    </section><!-- End Resume Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container">

        <div class="section-title">
          <h2>¡A gastar puntos!</h2>
            <p>Ya has visitado los diferentes <b>puntos</b> de interés y has conseguido esos tan preciados puntos, ahora es el momento de gastarlos</p>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">Tiendas</li>
              <li data-filter=".filter-card">Billetes de barco</li>
            </ul>
          </div>
        </div>





          <!-- TIENDAS Y BARCOS-->
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/canjear/zara.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                  <form method="post" action="#portfolio">

                      <button type="button" class="btn btn-success" onclick="alerta()">Canjear 10% descuento</button>
                      <input type="hidden" id="zara" name="zara" value="1000">
                      <input type = "hidden" id="user" value="<?php echo $_SESSION['user']?>" >
                      <script type="application/javascript">
                          function alerta(){
                              var valueShop = document.getElementById("zara").value;
                              var idUser = document.getElementById("user").value;

                              $.ajax({
                                  type : "POST",  //type of method
                                  url  : "class/redeem.php",  //your page
                                  data : { user : idUser, value : valueShop  },// passing the values
                                  success: function(res){

                                      swal(res);
                                  }
                              });
                          }
                      </script>
                  </form>
                <a href="https://www.zara.com/es/" title="Página oficial"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/canjear/balearia.png" class="img-fluid" alt="">
              <div class="portfolio-links">

                  <form method="post" action="#portfolio">

                      <button type="button" class="btn btn-success" onclick="alerta()">Canjear 50% descuento</button>
                      <input type="hidden" id="balearia" name="balearia" value="1000">
                      <input type = "hidden" id="user" value="<?php echo $_SESSION['user']?>" >
                      <script type="application/javascript">
                          function alerta(){
                              var valueShop = document.getElementById("balearia").value;
                              var idUser = document.getElementById("user").value;

                              $.ajax({
                                  type : "POST",  //type of method
                                  url  : "class/redeem.php",  //your page
                                  data : { user : idUser, value : valueShop  },// passing the values
                                  success: function(res){
                                      swal(res);
                                  }
                              });
                          }
                      </script>
                  </form>

                <a href="https://www.balearia.com/es" title="Página oficial"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/canjear/mercadona.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">

                  <form method="post" action="#portfolio">

                      <button type="button" class="btn btn-success" onclick="alerta()">Canjear 10% descuento</button>
                      <input type="hidden" id="mercadona" name="mercadona" value="1000">
                      <input type = "hidden" id="user" value="<?php echo $_SESSION['user']?>" >
                      <script type="application/javascript">
                          function alerta(){
                              var valueShop = document.getElementById("mercadona").value;
                              var idUser = document.getElementById("user").value;

                              $.ajax({
                                  type : "POST",  //type of method
                                  url  : "class/redeem.php",  //your page
                                  data : { user : idUser, value : valueShop  },// passing the values
                                  success: function(res){
                                      swal(res);

                                  }
                              });
                          }
                      </script>
                  </form>

                <a href="https://www.mercadona.es/" title="Página oficial"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/canjear/frs.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">

                  <form method="post" action="#portfolio">

                      <button type="button" class="btn btn-success" onclick="alerta()">Canjear 50% descuento</button>
                      <input type="hidden" id="frs" name="frs" value="1000">
                      <input type = "hidden" id="user" value="<?php echo $_SESSION['user']?>" >
                      <script type="application/javascript">
                          function alerta(){
                              var valueShop = document.getElementById("frs").value;
                              var idUser = document.getElementById("user").value;

                              $.ajax({
                                  type : "POST",  //type of method
                                  url  : "class/redeem.php",  //your page
                                  data : { user : idUser, value : valueShop  },// passing the values
                                  success: function(res){
                                      swal(res);
                                  }
                              });
                          }
                      </script>
                  </form>
                <a href="https://www.frs.es/" title="Página oficial"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/canjear/daily-price.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">

                  <form method="post" action="#portfolio">

                      <button type="button" class="btn btn-success" onclick="alerta()">Canjear 10% descuento</button>
                      <input type="hidden" id="daily-price" name="daily-price" value="1000">
                      <input type = "hidden" id="user" value="<?php echo $_SESSION['user']?>" >
                      <script type="application/javascript">
                          function alerta(){
                              var valueShop = document.getElementById("daily-price").value;
                              var idUser = document.getElementById("user").value;

                              $.ajax({
                                  type : "POST",  //type of method
                                  url  : "class/redeem.php",  //your page
                                  data : { user : idUser, value : valueShop  },// passing the values
                                  success: function(res){
                                      swal(res);
                                  }
                              });
                          }
                      </script>
                  </form>

                <a href="https://www.facebook.com/groups/zerogame/" title="Página oficial"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/canjear/primor.png" class="img-fluid" alt="">
              <div class="portfolio-links">


                  <form method="post" action="#portfolio">

                      <button type="button" class="btn btn-success" onclick="alerta()">Canjear 25% descuento</button>
                      <input type="hidden" id="primor" name="primor" value="1000">
                      <input type = "hidden" id="user" value="<?php echo $_SESSION['user']?>" >
                      <script type="application/javascript">
                          function alerta(){
                              var valueShop = document.getElementById("primor").value;
                              var idUser = document.getElementById("user").value;

                              $.ajax({
                                  type : "POST",  //type of method
                                  url  : "class/redeem.php",  //your page
                                  data : { user : idUser, value : valueShop  },// passing the values
                                  success: function(res){
                                      swal(res);
                                  }
                              });
                          }
                      </script>
                  </form>

                <a href="https://www.primor.eu/" title="Página oficial"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>



        </div>

      </div>
    </section><!-- End Portfolio Section -->
      <!-- ======= Services Section ======= -->
      <section id="services" class="services">
          <div class="container">

              <div class="section-title">
                  <h2>Colaboraciones</h2>
                  <p>Estas son algunas con las empresas que hemos colaborado para:</p>
              </div>

              <div class="row">
                  <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
                      <div class="icon"><i class="bi bi-briefcase"></i></div>
                      <h4 class="title"><a href=""> Correos</a></h4>
                      <p class="description">Correos ha decidido que nos apoyara dando puntos a los miembros que tengan pedidos.</p>
                  </div>
                  <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                      <div class="icon"><i class="bi bi-card-checklist"></i></div>
                      <h4 class="title"><a href="">Happy Ceuta</a></h4>
                      <p class="description">Happy Ceuta ha decido que nos ayudara en el tema de los restaurantes más conocido de la ciudad.</p>
                  </div>
                  <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                      <div class="icon"><i class="bi bi-bar-chart"></i></div>
                      <h4 class="title"><a href="">Telefonica</a></h4>
                      <p class="description">Telefonica se encargara del tema de los lugares más famosos de Ceuta.</p>
                  </div>
                  <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                      <div class="icon"><i class="bi bi-binoculars"></i></div>
                      <h4 class="title"><a href="">Balearias</a></h4>
                      <p class="description">Balearias aporta a los miembros grandes descuentos en sus viajes para que vuelvan con más ganas.</p>
                  </div>
                  <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                      <div class="icon"><i class="bi bi-brightness-high"></i></div>
                      <h4 class="title"><a href="">Endesa</a></h4>
                      <p class="description">Endesa igual que Telefonica nos ayudara con los lugares de Ceuta.</p>
                  </div>
                  <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
                      <div class="icon"><i class="bi bi-calendar4-week"></i></div>
                      <h4 class="title"><a href="">UGR</a></h4>
                      <p class="description">La UGR propaga esta nueva forma de visitar la ciudad a los nuevos estudiantes que vienen de afuera</p>
                  </div>
              </div>

          </div>
      </section><!-- End Services Section -->





      <!-- ======= CREACION DEL APARTADO DE TAREAS ======= -->
      <section id="testimonials" class="testimonials section-bg">
          <div class="container">
              <?php

              if(isset($_SESSION["user"])){

              $usuario = $_SESSION['user'];
              $sql = "SELECT * FROM tasks WHERE user_id = $usuario";



              $resul = $db->query($sql);
              ?>

              <div class="section-title">
                  <h2>Tareas</h2>
                  <p>Al darte de alta en nuestro sistema se te han asignado las siguientes misiones.</p>
              </div>

              <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                  <div class="swiper-wrapper">
                      <?php
                      while($row = $resul->fetch_assoc()) {

                          $lugar = $row['task_id'];
                          $puntos = $row['points'];
                          $estado = $row['status'];
                          $detalle = $row['name'];

                          $sql = "SELECT nombre FROM puestos WHERE id_puestos = $lugar";

                          $datos = $db->query($sql);
                          $datos = $datos->fetch_assoc();
                          $lugar = $datos['nombre'];

                          ?>

                          <div class="swiper-slide">
                              <div class="testimonial-item" data-aos="fade-up" data-aos-delay="400">
                                  <p>
                                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                      <?php
                                      echo $detalle;
                                      ?>
                                      <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                  </p>
                                  <h2><?php
                                      echo $lugar;
                                      ?>
                                  </h2>
                                  <h3><?php
                                      echo $puntos;
                                      ?></h3>
                              </div>
                          </div><!-- End testimonial item -->

                          <?php
                      }
                      }
                      ?>

                  </div>
                  <div class="swiper-pagination"></div>
              </div>

          </div>
      </section><!-- End Testimonials Section -->

    <!--

        JUANMA: PUEDES LITERAL COGER ENTERA LA SECCION DE CONTACTO
     -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contacto</h2>
          <p>Si por algún casual sigues con duda sobre algún aspecto, no tengas miedo de preguntarnos. Rellena el formulario y nuestro equipo de asistencia responderá lo antes posible</p>
        </div>

        <div class="row" data-aos="fade-in">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Localización:</h4>
                <p>Calle Real 204, Ceuta, 51001</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@ceutago.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Teléfono:</h4>
                <p>+34 645 786 555</p>
              </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3232.377248739633!2d-5.307044484398877!3d35.8887752261681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0ca4016133f74d%3A0x65eea5f4fc1bed18!2sC.%20Real%2C%2051001%20Ceuta!5e0!3m2!1ses!2ses!4v1645954204418!5m2!1ses!2ses" style="border:0; width: 100%; height: 290px;" allowfullscreen ></iframe>

            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Nombre</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Asunto</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group">
                <label for="name">Mensaje</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>