<?php
include ('koneksi.php');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query = mysqli_query($koneksi, "SELECT * FROM tbl_datadiri");
$html = '<center><h3> Daftar Data Diri Pasien</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
<tr>
<th>No</th>
<th>ID Pasien</th>
<th>Nama</th>
<th>Tanggal Lahir</th>
<th>Umur</th>
<th>Jenis Kelamin</th>
<th>Alamat</th>
<th>No. Telepon</th>
</tr>';

$no = 1;
while ($row = mysqli_fetch_array($query)) {
    $html .= "<tr>
    <td>".$no."</td>
    <td>".$row['id_pasien']."</td>
    <td>".$row['nama_pasien']."</td>
    <td>".$row['tgl_lahir']."</td>
    <td>".$row['umur']."</td>
    <td>".$row['kelamin']."</td>
    <td>".$row['alamat']."</td>
    <td>".$row['no_telp']."</td>
    </tr>";
    $no++;
}
$html .= "</table>";

$dompdf->load_html($html);
$dompdf->set_paper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("Laporan_Data_Pasien.pdf");
?>
