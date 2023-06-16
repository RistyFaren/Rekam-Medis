<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta property="og:type" content="website">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>REKAM MEDIS MEDICARE - FORM RESEP</title>
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
          <p class="app-sidebar__user-name">Tenaga Medis</p> 
          <p class="app-sidebar__user-designation">Admin</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item active" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Data Form</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="data_dokter.php"><i class="icon fa fa-stethoscope"></i> Data Dokter </a></li>
            <li><a class="treeview-item" href="data_poli.php"><i class="icon fa fa-hospital-o"></i> Data Poli</a></li>
            <li><a class="treeview-item" href="data_obat.php"><i class="icon fa fa-medkit"></i> Data Obat</a></li>
            <li><a class="treeview-item" href="data_rekam_medis.php"><i class="icon fa fa-file-archive-o"></i> Data Rekam Medis</a></li>
            <li><a class="treeview-item active" href="data_resep.php"><i class="icon fa fa-edit"></i> Data Resep</a></li>
            <li><a class="treeview-item" href="datapasien.php"><i class="icon fa fa-user"></i>Data Pasien</a></li>
            <li><a class="treeview-item" href="datakunjungan.php"><i class="icon fa fa-users"></i> Data Kunjungan</a></li>
          </ul>
        </li>
      </ul>
    </aside>

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="icon fa fa-edit"></i>  Form Data Resep </h1>
          <p>Silahkan isi data resep lalu tekan button submit</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Data Form</li>
          <li class="breadcrumb-item"><a href="data_resep.php">Data Resep</a></li>
          <li class="breadcrumb-item"><a href="#">Tambah Resep</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md">
          <div class="tile">
            <h3 class="tile-title">Form Tambah</h3>
            <div class="tile-body">
            <?php
            include 'koneksi.php';
            $auto = mysqli_query($koneksi, "SELECT MAX(id_resep) AS max_code FROM tbl_resepobat");
            $data = mysqli_fetch_array($auto);
            $code = $data['max_code'];
            if ($code) {
              $urutan = (int)substr($code, 3,3);
              $urutan++;
            } else {
              $urutan = 1;
            }
            $huruf = "INV";
            $id_res = $huruf . sprintf("%03s", $urutan);
            ?>
              <form method="post" action="">
              <div class="form-group">
                  <label class="control-label">ID Resep Obat</label>
                  <input class="form-control" type="text" name="id_resep" value="<?php echo $id_res?>" readonly>
                </div>
                <div class="form-group">
                  <label class="control-label">Tanggal Resep</label>
                  <input class="form-control" id="demoDate" type="text" name="tgl_resep" placeholder="Masukkan tanggal resep">
                </div>
                <div class="form-group ">
                  <label class="control-label">Nama Pasien</label>
                  <select class="form-control" id="id_pasien" multiple="" name = "id_pasien">
                    <optgroup label="Pilih Nama Pasien">
                        <?php
                            include 'koneksi.php';
                            $sql = "SELECT * FROM tbl_datadiri";
                            $result = mysqli_query($koneksi, $sql) or die (mysqli_error($koneksi));
                            while ($row = mysqli_fetch_array($result)){
                                echo "<option value = $row[id_pasien]> $row[nama_pasien]</option>";
                            }
                        ?>
                    </optgroup>
                  </select>
                </div>
                <div class="form-group ">
                  <label class="control-label">Nama Obat</label>
                  <select class="form-control" id="id_obat" multiple="" name = "id_obat" onchange="Harga()">
                    <optgroup label="Pilih Nama Obat">
                        <?php
                            include 'koneksi.php';
                            $sql = "SELECT * FROM tbl_obat";
                            $result = mysqli_query($koneksi, $sql) or die (mysqli_error($koneksi));
                            while ($row = mysqli_fetch_array($result)){
                                echo "<option value = $row[id_obat]> $row[nama_obat]</option>";
                            }
                        ?>
                    </optgroup>
                  </select>
                </div>
                <div class="form-group ">
                  <label class="control-label">Harga Obat</label>
                  <input class="form-control" type="text" id="harga_obat" readonly="" name="harga_obat">
                  <script>
                    function Harga() {
                        var id_obat = document.getElementById("id_obat");
                        var harga_obat = document.getElementById("harga_obat");
                        var selected2NamaObat = id_obat.options[id_obat.selectedIndex].value;
                        // Buat objek AJAX
                        var xmlhttp = new XMLHttpRequest();
                        // Tentukan permintaan AJAX
                        xmlhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                harga_obat.value = this.responseText;
                            }
                        };
                        // Kirim permintaan AJAX ke file get_harga.php dengan parameter id_obat yang dipilih
                        xmlhttp.open("GET", "get_hargaobat.php?id_obat=" + selected2NamaObat, true);
                        xmlhttp.send();
                    }
                    </script>
                </div>
                <div class="form-group">
                  <label class="control-label">Jumlah</label>
                  <input class="form-control" type="text" name="jumlah" id="jumlah" placeholder="Masukkan jumlah obat" oninput="HitungSubTotal()">
                </div>
                <div class="form-group">
                  <label class="control-label">Sub Total</label>
                  <input class="form-control" type="text" name="sub_total" id="sub_total" readonly="">
                  <script>
                    function HitungSubTotal() {
                      var harga_obat = parseFloat(document.getElementById("harga_obat").value);
                      var jumlah = parseInt(document.getElementById("jumlah").value);
                      var sub_total = harga_obat * jumlah;

                      if (!isNaN(sub_total)) {
                        document.getElementById("sub_total").value = sub_total;
                      } else {
                        document.getElementById("sub_total").value = "";
                      }
                    }
                  </script>
                </div>
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit" name="tambah">Submit</button>
              <a class="btn btn-secondary" href="data_resep.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
            <?php
              include 'koneksi.php';
              if(isset($_POST['tambah'])){
                  mysqli_query($koneksi,"insert into tbl_resepobat set
                  id_resep ='$_POST[id_resep]',
                  tgl_resep ='$_POST[tgl_resep]',
                  id_pasien ='$_POST[id_pasien]',
                  id_obat ='$_POST[id_obat]',
                  harga_obat ='$_POST[harga_obat]',
                  jumlah ='$_POST[jumlah]',
                  sub_total ='$_POST[sub_total]'
                  ") or die (mysqli_error($koneksi));

                  echo "
                  alert('Data Telah Tersimpan!');
                  <script> document.location = 'data_resep.php'</script>";
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
      $('#id_obat').select2();

    </script>
    </body>
</html>