<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta property="og:type" content="website">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>REKAM MEDIS MEDICARE - FORM OBAT</title>
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
            <li><a class="treeview-item active" href="data_dokter.php"><i class="icon fa fa-stethoscope"></i> Data Dokter </a></li>
            <li><a class="treeview-item" href="data_poli.php"><i class="icon fa fa-hospital-o"></i> Data Poli</a></li>
            <li><a class="treeview-item" href="data_obat.php"><i class="icon fa fa-medkit"></i> Data Obat</a></li>
            <li><a class="treeview-item" href="data_rekam_medis.php"><i class="icon fa fa-file-archive-o"></i> Data Rekam Medis</a></li>
            <li><a class="treeview-item" href="data_resep.php"><i class="icon fa fa-edit"></i> Data Resep</a></li>
            <li><a class="treeview-item" href="datapasien.php"><i class="icon fa fa-user"></i>Data Pasien</a></li>
            <li><a class="treeview-item" href="datakunjungan.php"><i class="icon fa fa-users"></i> Data Kunjungan</a></li>
          </ul>
        </li>
      </ul>
    </aside>

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-stethoscope"></i>  Form Data Obat </h1>
          <p>Silahkan isi data obat lalu tekan button submit</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Data Form</li>
          <li class="breadcrumb-item"><a href="data_obat.php">Data obat</a></li>
          <li class="breadcrumb-item"><a href="#">Tambah obat</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md">
          <div class="tile">
            <h3 class="tile-title">Form Tambah</h3>
            <div class="tile-body">
              <form method="post" action="">
              <div class="form-group">
                  <label class="control-label">ID Obat</label>
                  <input class="form-control" type="text" name="id_obat" placeholder="Masukkan ID Obat">
                </div>
                <div class="form-group">
                  <label class="control-label">Nama Obat</label>
                  <input class="form-control" type="text" name="nama_obat" placeholder="Masukkan nama obat">
                </div>
                <div class="form-group">
                  <label class="control-label">Keterangan</label>
                  <input class="form-control" type="text" name="keterangan" placeholder="Masukkan keterangan obat">
                </div>
                <div class="form-group">
                  <label class="control-label">Harga</label>
                  <input class="form-control" type="text" name="harga_obat" placeholder="Masukkan harga obat">
                </div>
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit" name="tambah">Submit</button>
              <a class="btn btn-secondary" href="data_obat.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
            <?php
              include 'koneksi.php';
              if(isset($_POST['tambah'])){
                  mysqli_query($koneksi,"insert into tbl_obat set
                  id_obat ='$_POST[id_obat]',
                  nama_obat ='$_POST[nama_obat]',
                  keterangan ='$_POST[keterangan]',
                  harga_obat ='$_POST[harga_obat]'
                  ") or die (mysqli_error($koneksi));

                  echo "
                  alert('Data Telah Tersimpan!');
                  <script> document.location = 'data_obat.php'</script>";
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