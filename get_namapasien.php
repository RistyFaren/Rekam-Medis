<?php
include 'koneksi.php';
// Ambil nilai nama_pasien yang dikirim melalui AJAX
$selected2IDPasien = $_GET['id_pasien'];

// Query untuk mendapatkan nama_pasien berdasarkan id_pasien yang dipilih
$query = "SELECT nama_pasien FROM tbl_datadiri WHERE id_pasien = '$selected2IDPasien'";
$result = mysqli_query($koneksi, $query);
// Periksa apakah query berhasil
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $nama_pasien = $row['nama_pasien'];
    echo $nama_pasien;
} else {
    echo "Data tidak ditemukan";
}

// Tutup koneksi database
mysqli_close($koneksi);
?>