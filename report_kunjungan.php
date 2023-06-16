<?php
include ('koneksi.php');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query = mysqli_query($koneksi, "SELECT * FROM tbl_kunjungan");
$html = '<center><h3> Daftar Data Diri Pasien</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
<tr>
<th>No</th>
<th>ID Kunjungan</th>
<th>ID Pasien</th>
<th>Nama</th>
<th>Nama Poli</th>
<th>Tanggal</th>
</tr>';

$no = 1;
while ($row = mysqli_fetch_array($query)) {
    $html .= "<tr>
    <td>".$no."</td>
    <td>".$row['id_kunjungan']."</td>
    <td>".$row['id_pasien']."</td>
    <td>".$row['nama_pasien']."</td>
    <td>".$row['nama_poli']."</td>
    <td>".$row['tgl_janji']."</td>
    </tr>";
    $no++;
}
$html .= "</table>";

$dompdf->load_html($html);
$dompdf->set_paper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("Laporan_Data_Kunjungan.pdf");
?>
