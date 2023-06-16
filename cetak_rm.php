<?php
include ('koneksi.php');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query = mysqli_query($koneksi, "SELECT * FROM rekam_medis");
$html = '<center><h3> Daftar Rekam Medis</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
<tr>
<th>No</th>
<th>ID Rekam Medis</th>
<th>Nama Pasien</th>
<th>Nama Poli</th>
<th>Nama Dokter</th>
<th>Diagnosa</th>
</tr>';

$no = 1;
while ($row = mysqli_fetch_array($query)) {
    $html .= "<tr>
    <td>".$no."</td>
    <td>".$row['id_rm']."</td>
    <td>".$row['id_pasien']."</td>
    <td>".$row['id_poli']."</td>
    <td>".$row['id_dokter']."</td>
    <td>".$row['diagnosa']."</td>
    </tr>";
    $no++;
}
$html .= "</table>";

$dompdf->load_html($html);
$dompdf->set_paper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("Laporan_Rekam_Medis.pdf");
?>
