<?php
// Ambil nilai nama_obat yang dikirim melalui AJAX
$selected2NamaObat = $_GET['id_obat'];

// Buat koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "rekam_medis");

// Query untuk mendapatkan harga berdasarkan nama obat yang dipilih
$query = "SELECT harga_obat FROM tbl_obat WHERE id_obat = '$selected2NamaObat'";
$result = mysqli_query($conn, $query);

// Periksa apakah query berhasil
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $harga_obat = $row['harga_obat'];
    echo $harga_obat;
} else {
    echo "Data tidak ditemukan";
}

// Tutup koneksi database
mysqli_close($conn);
?>