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
        <li><a class="app-menu__item " href="datadiri.php"><i class="app-menu__icon fa fa-user-circle-o"></i><span class="app-menu__label">Data Diri</span></a></li>
        <li><a class="app-menu__item active" href="buat_janji.php"><i class="app-menu__icon fa fa-briefcase"></i><span class="app-menu__label">Buat Janji</span></a></li>
      </ul>
    </aside>

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-stethoscope"></i>  Form Buat Janji </h1>
          <p>Silahkan isi data untuk membuat jadwal pertemuan</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Buat Janji</li>
         
        </ul>
      </div>
      <div class="row">
        <div class="col-md">
          <div class="tile">
            <h3 class="tile-title">Form Buat Janji</h3>
            <div class="tile-body">
            <?php
            include 'koneksi.php';
            $auto = mysqli_query($koneksi, "SELECT MAX(id_kunjungan) AS max_code FROM tbl_kunjungan");
            $data = mysqli_fetch_array($auto);
            $code = $data['max_code'];
            if ($code) {
              $urutan = (int)substr($code, 1,3);
              $urutan++;
            } else {
              $urutan = 1;
            }
            $huruf = "K";
            $id_kun = $huruf . sprintf("%03s", $urutan);

            ?>
            

              <form method="post" action="cetak_janji.php">
              <div class="form-group">
                  <label class="control-label">ID KUNJUNGAN</label>
                  <input class="form-control" type="text" value="<?php echo $id_kun?>" name="id_kunjungan" readonly>
                </div>
                <div class="form-group ">
                  <label class="control-label">ID Pasien</label>
                  <select class="form-control" id="id_pasien" multiple="" name = "id_pasien" onchange="Nama()">
                    <optgroup label="Pilih Nama Pasien untuk menampilkan ID" >
                    <?php
                            include 'koneksi.php';
                            $sql = "SELECT * FROM tbl_datadiri";
                            $result = mysqli_query($koneksi, $sql) or die (mysqli_error($koneksi));
                            while ($row = mysqli_fetch_array($result)){
                                echo "<option value = $row[id_pasien]> $row[id_pasien]</option>";
                            }
                        ?>
                    </optgroup>
                  </select>
                </div>
                <div class="form-group ">
                  <label class="control-label">Nama Pasien</label>
                  <input class="form-control" id="nama_pasien" name = "nama_pasien" readonly>
                    <script>
                    function Nama() {
                        var id_pasien = document.getElementById("id_pasien");
                        var nama_pasien = document.getElementById("nama_pasien");
                        var selected2IDPasien = id_pasien.options[id_pasien.selectedIndex].value;
                        // Buat objek AJAX
                        var xmlhttp = new XMLHttpRequest();
                        // Tentukan permintaan AJAX
                        xmlhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                nama_pasien.value = this.responseText;
                            }
                        };
                        // Kirim permintaan AJAX ke file get_harga.php dengan parameter id_obat yang dipilih
                        xmlhttp.open("GET", "get_namapasien.php?id_pasien=" + selected2IDPasien, true);
                        xmlhttp.send();
                    }
                    </script>
                </div>
                <div class="form-group ">
                  <label class="control-label">Nama Poli</label>
                  <select class="form-control" id="nama_poli" multiple="" name = "nama_poli">
                    <optgroup label="Pilih Nama Poli">
                        <?php
                            include 'koneksi.php';
                            $sql = "SELECT * FROM tbl_poli";
                            $result = mysqli_query($koneksi, $sql) or die (mysqli_error($koneksi));
                            while ($row = mysqli_fetch_array($result)){
                                echo "<option value = $row[nama_poli]> $row[nama_poli]</option>";
                            }
                        ?>
                    </optgroup>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Tanggal Janji</label>
                  <input class="form-control" id="demoDate"type="text" name="tgl_janji" placeholder="Masukkan Tanggal Janji" required>
                </div>
              
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit" name="tambah">Submit</button>
              <a class="btn btn-secondary" href="buat_janji.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>

            <!-- data -->
            <?php
              include 'koneksi.php';

              if (isset($_POST['tambah'])) {
                  $id_kunjungan = $_POST['id_kunjungan'];
                  $id_pasien = $_POST['id_pasien'];
                  $nama_pasien = $_POST['nama_pasien'];
                  $nama_poli = $_POST['nama_poli'];
                  $tgl_janji = $_POST['tgl_janji'];

                  $query = "INSERT INTO tbl_kunjungan (id_kunjungan,id_pasien, nama_pasien, nama_poli, tgl_janji) 
                  VALUES ('$id_kunjungan','$id_pasien', '$nama_pasien', '$nama_poli', '$tgl_janji')";

                  if (mysqli_query($koneksi, $query)) {
                    echo '<script>alert("Berhasil membuat janji!");
                    window.location.href = "cetak_janji.php";
                    </script>';
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
    <script type="text/javascript" src="plugins-js/select2.min.js"></script>
    <script type="text/javascript">
      $('#demoDate').datepicker({
      	format: "dd/mm/yyyy",
      	autoclose: true,
      	todayHighlight: true
      });
      $('#id_pasien').select2();
      $('#nama_poli').select2();
    </script>
    </body>
</html>