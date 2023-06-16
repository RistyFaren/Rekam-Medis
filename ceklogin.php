<?php
include 'koneksi.php';
/*** Cegah akses ke halaman login saat sedang login.*/
if(isset($_SESSION['is_login']) || isset($_COOKIE['_logged'])) {
    header('location: /');
}
if(isset($_POST['pesan'])){
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);

    if (empty($username) || empty($password)) {
        /*** Cek apakah formulir telah terisi data. */
        echo '<script>alert("Tolong lengkapi data!");
        window.location.href = "login.php";
        </script>';
    } else {
        $query = mysqli_query($koneksi, "SELECT username, password from tbl_user WHERE username = '$username' and password='$password'");
        $cek = mysqli_num_rows($query);
        if ($cek>0) {
            // login valid
            session_start(); // Mulai sesi
            $_SESSION['is_login'] = true;
            $row = mysqli_fetch_array($query);
            $_SESSION['username'] = $row ['username']; // Simpan username ke dalam sesi
            header('Location: ui_pasien.php');
            exit; // tambahkan pernyataan exit setelah header untuk menghentikan eksekusi skrip lebih lanjut
        } else {
            // username atau password salah
            header('Location: login.php?pesan=Username atau Password Salah');
            exit; // tambahkan pernyataan exit setelah header untuk menghentikan eksekusi skrip lebih lanjut
        }
    }
}    
?>
