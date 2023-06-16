<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="icon" href="favicon.ico"> -->
        <title>WEBSITE REKAM MEDIS</title>
        <link rel="Website icon">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
         <!-- Vendor CSS Files -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link href="vendor/animate.css/animate.min.css" rel="stylesheet">
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="css/style.css" rel="stylesheet">
        <!-- <link href="css/main.css" rel="stylesheet"> -->
        <style>
          .carousel-caption{
              top: 27%;
              transform: translateY(-40%);
              width: 70%;
          }
          /* .d-block{
              background: no-repeat center center scroll;
              -webkit-background-size: cover;
              background-size: cover;
              filter: blur(5px) ;
          } */
          .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(89, 89, 89, 0.5); /* Warna latar belakang overlay dengan transparansi */
            filter: blur(5px);
          }
          
        #header {
          background: #009688;
          transition: all 0.5s;
          z-index: 997;
          padding: 15px 0;
          top: 40px;
          box-shadow: 0px 2px 15px rgba(25, 119, 204, 0.1);
        }
        #header .logo {
          font-size: 30px;
          letter-spacing: 3.2px;
          margin: 0;
          padding: 0;
          line-height: 1;
          font-weight: 700;
          font-family: "Poppins";
        }
        #header .logo a {
          color: #ffffff;
        }
          #hero h1 {
            margin: 0;
            font-size: 48px;
            font-weight: 700;
            line-height: 56px;
            text-transform: uppercase;
            color: #fff; 
            font-weight: bold;
            margin-top: 25px;
            text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            }
            
            #hero h2 {
            color: #fff;
            margin: 10px 0 0 0;
            font-size: 23px;
            font-weight: bold;
            }

            #hero .btn-get-started {
            font-family: "Raleway", sans-serif;
            text-transform: uppercase;
            font-weight: bold;
            font-size: 14px;
            letter-spacing: 1px;
            display: inline-block;
            padding: 12px 35px;
            margin-top: 20px;
            border-radius: 50px;
            transition: 0.5s;
            color: #fff;
            background: #0c7a68;
            }

            #hero .btn-get-started:hover {
            background-color: #141212;
            border: 1px solid #000;
            }
            .nav-link{
              font-family: "Poppins";
              font-weight: bold;
              text-transform: uppercase;

            }
            .navbar a,
            .navbar a:focus {
              display: flex;
              align-items: center;
              justify-content: space-between;
              font-size: 14px;
              color: #ffffff;
              white-space: nowrap;
              transition: 0.4s;
              border-bottom: 2px solid #fff;
              padding: 5px 2px;
            }
            
            .appointment-btn {
            margin-left: 25px;
            background: #05312d;
            color: #009688;
            border-radius: 50px;
            padding: 8px 25px;
            white-space: nowrap;
            transition: 0.3s;
            font-size: 14px;
            display: inline-block;
          }
          .appointment-btn:hover {
            background-color: #141212;
            color: #141212;
;
          }
        </style>
    </head>
    
    <body>
          <!-- ======= Header ======= -->
    <header id="header" >
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto text-light">MEDIACARE</a></h1>
          <!-- Navbar -->
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="#carouselExampleDark">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#doctors">Dokter</a></li>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header>
  <!-- End Header -->

  <!-- carousel -->
  <div id="carouselExampleDark" class="carousel carousel-dark slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="images/c1.png" class="d-block w-100 h-50" alt="gambar 1">
      <div class="overlay"></div>
      <div class="carousel-caption d-none d-md-block">
        <section id="hero" class="d-flex align-items-center">
            <div class="container">
            <strong><h1>Selamat datang di MEDIACARE</h1></strong>
            <h2>"Kesembuhan Anda adalah prioritas kami."</h2>
            <a href="regis.php" class="btn-get-started scrollto">Masuk</a>
            </div>
        </section>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="images/cr2.png" class="d-block w-100 h-50" alt="gambar 2">
      <div class="overlay"></div>
      <div class="carousel-caption d-none d-md-block">
      <section id="hero" class="d-flex align-items-center">
            <div class="container">
            <strong><h1>Selamat datang di MEDIACARE</h1></strong>
            <h2>"Kesembuhan Anda adalah prioritas kami."</h2>
            <a href="regis.php" class="btn-get-started scrollto">Masuk</a>
            </div>
        </section>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/c3.png" class="d-block w-100 h-50" alt="gambar 3">
      <div class="overlay"></div>
      <div class="carousel-caption d-none d-md-block">
      <section id="hero" class="d-flex align-items-center">
            <div class="container">
            <strong><h1>Selamat datang di MEDIACARE</h1></strong>
            <h2>"Kesembuhan Anda adalah prioritas kami."</h2>
            <a href="regis.php" class="btn-get-started scrollto">Masuk</a>
            </div>
        </section>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

 <!-- ======= Doctors Section ======= -->
 <section id="doctors" class="doctors">
      <div class="container">

        <div class="section-title">
          <h2>Dokter</h2>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="images/d1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Diah Mira Indramaya, dr., Sp.KK</h4>
                <span>Spesialis Kulit dan Kelamin</span>
                <p>Jadwal Operasi Senin-Jumat pukul 08.00-16.00</p>
                
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="images/d2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Christinari Ratih, drg., Sp.KGA.</h4>
                <span>Spesialis Gigi Dan Mulut</span>
                <p>Jadwal Operasi Senin-Jumat pukul 08.00-16.00</p>
               
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="images/d3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Dr. Muhammad Ikhsan Chan </h4>
                <span>Spesialis Umum</span>
                <p>Jadwal Operasi Senin-Jumat pukul 08.00-16.00</p>
                
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="images/d4.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Ari Baskoro, dr., Sp.PD-KAI</h4>
                <span>Spesialis Penyakit Dalam</span>
                <p>Jadwal Operasi Senin-Jumat pukul 08.00-16.00</p>
                
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Doctors Section -->


     <!--FOOTER-->
     <div class="container-fluid mt-5 pb-5" style="background: #009688;">
          <footer class="text-center text-with pb-5" style="box-sizing: border-box; border-bottom: 1px solid #FFFFFF;">
            <div class="footer-text text-light">
              <hr>
              <p>OUR SOCIAL MEDIA</p>
        </hr>
            </div>
            <section class="text-center">
              <!-- Facebook -->
              <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>
              <!-- Twitter -->
              <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>
              <!-- Instagram -->
              <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>
              <!-- Youtube -->
              <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-youtube"></i></a>
            </section>
          </footer>
        </div>

  
  <main id="main">
    <script src="vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/glightbox/js/glightbox.min.js"></script>
    <script src="vendor/swiper/swiper-bundle.min.js"></script>
    <script src="vendor/php-email-form/validate.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <!-- Template Main JS File -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </body>
</html>