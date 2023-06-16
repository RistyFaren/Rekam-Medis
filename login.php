<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-
        scale=1">
        <!-- <link rel="icon" href="favicon.ico"> -->
        <title>WEBSITE REKAM MEDIS</title>
        <link rel="Website icon">

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

        <style>
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
            .container-fluid {
                width: 100%;
                height: 100vh;
                background: #e6e6e6;
                background-size: cover;
                -webkit-background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
            .navbar a,
            .navbar a:focus {
              font-family: "Poppins";
              font-weight: bold;
              text-transform: uppercase;  
              display: flex;
              align-items: center;
              justify-content: space-between;
              font-size: 14px;
              color: #ffffff;
              white-space: nowrap;
              transition: 0.3s;
              border-bottom: 2px solid #fff;
              padding: 5px 2px;
            }
            .card{
                top: 10%;   
            }
            .card-header{
                font-weight: bold;
                padding bottom: 4px;
            }
            .btn{
                font-weight: bold;
                padding: 6px;
            }
            .card-footer, a{
                color: #009688;

            }
            </style>
        
    </head>
    
    <body>
     <!-- ======= Header ======= -->
     <header id="header" >
            <div class="container d-flex align-items-center">

            <h1 class="logo me-auto text-light">MEDIACARE</a></h1>

            <nav id="navbar" class="navbar">
                <ul>
                <li><a class="nav-link scrollto" href="index.php">Home</a></li>
            </div>
        </header>
        <!-- End Header -->
        <!-- create login -->
    <div class= "container-fluid">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
            <?php
            if(isset($_GET['pesan'])) {
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Login Gagal!</strong> <?php echo $_GET['pesan']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <?php } ?>
            <div class="card text-white mt-4">
        <div class="card-header bg-dark text-center font-weight-bold py-3">
            SELAMAT DATANG KEMBALI!
        </div>
        <div class="card-body bg-light text-dark py-4">
            <form action="ceklogin.php" method="POST">
                <label for="username" class="form-label">Username</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/></svg>
                        </span>
                            <input type="text" class="form-control" name ="username"
                            placeholder="Masukkan username"  aria-describedby="basic-addon3">
                    </div>   
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16">
                        <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z"/>
                        </svg>
                        </span>
                            <input type="password" class="form-control" name ="password"
                            placeholder="Masukkan password"  aria-describedby="basic-addon3">
                    </div>   
                    <div class= "row mb-3">
                        <button type="submit" class="btn btn-primary btn-block" name="pesan">Login</button>
                    </div>
            </form>
        </div>
        <div class="card-footer bg-light text-dark">
            <div class="text-center">
                Belum punya akun, silahkan <a href="regis.php">Registrasi</a>
            </div>
            <div class="text-center">
                Login sebagai <a href="loginadmin.php">Admin</a>
            </div>
        </div>
    </div>
    </div>
    </div>
    
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    </body>
</html>