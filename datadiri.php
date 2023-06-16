<?php
  include 'koneksi.php';
  session_start(); // Memulai sesi
  // Mengakses data dari sesi
  $username = $_SESSION['username'];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta property="og:type" content="website">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>REKAM MEDIS MEDICARE - FORM DOKTER</title>
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
        <li><a class="app-menu__item " href="ui_pasien.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Home</span></a></li>
        <li><a class="app-menu__item active" href="datadiri.php"><i class="app-menu__icon fa fa-user-circle-o"></i><span class="app-menu__label">Data Diri</span></a></li>
        <li><a class="app-menu__item " href="buat_janji.php"><i class="app-menu__icon fa fa-briefcase" aria-hidden="true"></i><span class="app-menu__label">Buat Janji</span></a></li>
      </ul>
    </aside>

    <<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-stethoscope"></i>  Form Data Diri </h1>
          <p>Silahkan isi data diri pasien</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Data Diri</li>
         
        </ul>
      </div>
      <div class="row">
        <div class="col-md">
          <div class="tile">
            <h3 class="tile-title">Form Data Diri</h3>
            <div class="tile-body">
            <?php
            include 'koneksi.php';
            $auto = mysqli_query($koneksi, "SELECT MAX(id_pasien) AS max_code FROM tbl_datadiri");
            $data = mysqli_fetch_array($auto);
            $code = $data['max_code'];
            if ($code) {
              $urutan = (int)substr($code, 2,3);
              $urutan++;
            } else {
              $urutan = 1;
            }
            $huruf = "PS";
            $id_pas = $huruf . sprintf("%03s", $urutan);

            ?>
              <form method="post" action="">
              <div class="form-group">
                  <label class="control-label">ID Pasien</label>
                  <input class="form-control" type="text" value="<?php echo $id_pas?>" name="id_pasien" readonly>
                </div>
                <div class="form-group">
                  <label class="control-label">Name</label>
                  <input class="form-control" type="text" name="nama_pasien" placeholder="Masukkan nama lengkap" Required>
                </div>
                <div class="form-group">
                  <label class="control-label">Tanggal Lahir</label>
                  <input class="form-control" id="demoDate" type="text" name="tgl_lahir" placeholder="Masukkan tanggal lahir" Required>
                </div>
                <div class="form-group">
                  <label class="control-label">Umur</label>
                  <input class="form-control" type="text" name="umur" placeholder="Masukkan tanggal lahir" Required>
                </div>
                <div class="form-group">
                  <label class="control-label">Jenis Kelamin</label>                 
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="kelamin" value = "L">Laki-laki
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="kelamin" value = "P">Perempuan
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Alamat</label>
                  <textarea class="form-control" type="text" rows="4" name="alamat" placeholder="Masukkan alamat" Required></textarea>
                </div>
                <div class="form-group">
                  <label class="control-label">No Telp.</label>
                  <input class="form-control" type="text" name="no_telp" placeholder="Masukkan no telpon" Required>
                </div>
              
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit" name="tambah">Submit</button>
              <a class="btn btn-secondary" href="data_dokter.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
            <?php
                    include 'koneksi.php';
                    if(isset($_POST['tambah'])){
                        $id_pasien = $_POST['id_pasien'];
                        $nama_pasien = $_POST['nama_pasien'];
                        $tgl_lahir = $_POST['tgl_lahir'];
                        $umur = $_POST['umur'];
                        $kelamin = $_POST['kelamin'];
                        $alamat = $_POST['alamat'];
                        $no_telp = $_POST['no_telp'];

                        $query = "INSERT INTO tbl_datadiri (id_pasien, nama_pasien, tgl_lahir, umur, kelamin, alamat, no_telp)
                                VALUES ('$id_pasien', '$nama_pasien', '$tgl_lahir', '$umur', '$kelamin', '$alamat', '$no_telp')";

                        if(mysqli_query($koneksi, $query)){
                            echo "<script>alert('Data Telah Tersimpan!');</script>";
                            echo "<script>document.location = 'ui_pasien.php';</script>";
                        } else {
                            die(mysqli_error($koneksi));
                        }
                    }
                ?>

            </form>
            
          </div>
        </div>
    </main>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="plugins-js/main.js"></script>
    <script src="plugins-js/pace.min.js"></script>
    <!-- Data Tabel Pluggin -->
    <script type="text/javascript" src="plugins-js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
      $('#demoDate').datepicker({
      	format: "dd/mm/yyyy",
      	autoclose: true,
      	todayHighlight: true
      });
    </script>
    </body>
</html>