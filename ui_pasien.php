<?php
  include 'koneksi.php';
  session_start(); // Memulai sesi
  // Mengakses data dari sesi
  $username = $_SESSION['username'];

  $jumlah_produk=mysqli_query($koneksi,"SELECT COUNT(*) as id from tbl_dokter");
  $row = mysqli_fetch_array($jumlah_produk);
  $jum_dok = $row['id'];

  $jumlah_produk=mysqli_query($koneksi,"SELECT COUNT(*) as id from tbl_poli");
  $row = mysqli_fetch_array($jumlah_produk);
  $jum_poli = $row['id'];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta property="og:type" content="website">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>REKAM MEDIS MEDICARE</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="#">Mediacare</a><!--INI BLM PASTI-->
      
    <!-- Sidebar toggle button-->
      <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="index.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>

    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="images/admin.png" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?php echo $username; ?></p>  
          <p class="app-sidebar__user-designation">Pasien</p> 
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="ui_pasien.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Home</span></a></li>
        <li><a class="app-menu__item " href="datadiri.php"><i class="app-menu__icon fa fa-user-circle-o"></i><span class="app-menu__label">Data Diri</span></a></li>
        <li><a class="app-menu__item " href="buat_janji.php"><i class="app-menu__icon fa fa-briefcase" aria-hidden="true"></i><span class="app-menu__label">Buat Janji</span></a></li>
      </ul>
    </aside>

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>  Website Rekam Medis </h1>
          <p>RS Mediacare - Darmo Indah 20-F, Surabaya</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <!-- Card Header - Dropdown -->
      <div class="card">
        <div class="card-header">
          <h4>SELMAT DATANG!</h4>
        </div>
        <div class="card-body">
        <center><img class="mt-2" src="images/hospital2.png" alt="Card image cap" width="100px" height="100px">
        <center><h3 class="tile-title">RS MEDIACARE SURABAYA</h3>
        <center><b>"Silahkan isi data diri terlebih dulu sebelum membuat janji periksa"</b></center>
        </div>
      </div>
      <!--CARD--> 
      <div class="row pt-5">
        <div class="col-md-6">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-stethoscope fa-3x"></i>
            <div class="info">
              <h4>DOKTER</h4>
              <p><b><?php echo $jum_dok."";?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 ">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-hospital-o fa-3x"></i>
            <div class="info">
              <h4>POLI</h4>
              <p><b><?php echo $jum_poli."";?></b></p>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h4>Jadwal Poli</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped" id="sampleTable">
                  <thead>
                    <tr>
			   		          <th>No.</th>
                      <th>ID Poli</th>
                      <th>Nama Poli</th>
                      <th>Nama Dokter</th>
                      <th>Jam Operasi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        include 'koneksi.php';
                        $no = 1;
                        $sql = mysqli_query($koneksi, "SELECT * FROM tbl_poli, tbl_dokter WHERE tbl_poli.id_dokter = tbl_dokter.id_dokter") or die(mysqli_error($koneksi));
                        while($row = mysqli_fetch_array($sql)){
                            echo
                            "<tr>
                                <td>$no</td>
                                <td>$row[id_poli]</td>
                                <td>$row[nama_poli]</td>    
                                <td>$row[nama_dokter]</td>    
                                <td>$row[waktu]</td>       
                                </tr>";
                                $no++;
                            }
                        ?>
                  </tbody>
                </table>
              </div>
        </div>
      </div>
    </main>
    
    
    
    <!-- The javascript plugin to display page loading on top-->
    <script src="plugins-js/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="plugins-js/chart.js"></script>
    <script type="text/javascript">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="plugins-js/main.js"></script>
    </body>
</html>