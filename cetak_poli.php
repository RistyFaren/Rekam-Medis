<?php
include ('koneksi.php');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query = mysqli_query($koneksi, "SELECT * FROM tbl_poli");
$html = '<center><h3> List Poli </h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
<tr>
<th>No</th>
<th>ID Poli</th>
<th>Nama Poli</th>
<th>Waktu</th>
</tr>';

$no = 1;
while ($row = mysqli_fetch_array($query)) {
    $html .= "<tr>
    <td>".$no."</td>
    <td>".$row['id_poli']."</td>
    <td>".$row['nama_poli']."</td>
    <td>".$row['waktu']."</td>
    </tr>";
    $no++;
}
$html .= "</table>";

$dompdf->load_html($html);
$dompdf->set_paper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("Laporan_Data_Pasien.pdf");
?>
