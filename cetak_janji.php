<?php
include('koneksi.php');
require_once('dompdf/autoload.inc.php');
use Dompdf\Dompdf;
$dompdf=new Dompdf();

// Mengambil data baru yang diinput
$id_kunjungan = $_POST['id_kunjungan'];
$id_pasien = $_POST['id_pasien'];
$nama_pasien = $_POST['nama_pasien'];
$nama_poli = $_POST['nama_poli'];  
$tgl_janji = $_POST['tgl_janji'];

$sql = "INSERT INTO tbl_kunjungan (id_kunjungan, id_pasien, nama_pasien, nama_poli, tgl_janji) 
VALUES ('$id_kunjungan', '$id_pasien', '$nama_pasien', '$nama_poli', '$tgl_janji')";
mysqli_query($koneksi, $sql);

$html =
'<html><body>'.
'<h3>RS MEDIACARE - DARMO INDAH 20-F, SURABAYA </h3>'.
'Atas nama pasien <b>'.$nama_pasien.'</b>'.
'<br>ID Kunjungan </b>'.$id_kunjungan.'</b>'.
'<br>ID Pasien </b>'.$id_pasien.'</b>'.
'<br>Nama Poli </b>'.$nama_poli.'</b>'.
'<br>Tanggal janji </b>'.$tgl_janji.'</b>'.
'<br><b>Harap datang sebelum jam periksa<b>'.
'</html></body>';

$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream('Cetak_Janji '.$nama_pasien.'.pdf');
?>