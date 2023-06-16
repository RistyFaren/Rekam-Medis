<?php
include ('koneksi.php');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query = mysqli_query($koneksi, "SELECT * FROM tbl_resepobat 
INNER JOIN tbl_datadiri ON tbl_resepobat.id_pasien = tbl_datadiri.id_pasien
INNER JOIN tbl_obat ON tbl_resepobat.id_obat = tbl_obat.id_obat");
$html = '<center><h3> List Poli </h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
<tr>
<th>No</th>
<th>ID Resep</th>
<th>Tgl Resep</th>
<th>Nama Pasien</th>
<th>Nama Obat</th>
<th>Harga Obat</th>
<th>Jumlah</th>
<th>Subtotal</th>
</tr>';

$no = 1;
while ($row = mysqli_fetch_array($query)) {
    $html .= "<tr>
    <td>".$no."</td>
    <td>".$row['id_resep']."</td>
    <td>".$row['tgl_resep']."</td>
    <td>".$row['nama_pasien']."</td>
    <td>".$row['nama_obat']."</td>
    <td>".$row['harga_obat']."</td>
    <td>".$row['jumlah']."</td>
    <td>".$row['sub_total']."</td>
   
    </tr>";
    $no++;
}
$html .= "</table>";

$dompdf->load_html($html);
$dompdf->set_paper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("Laporan_Data_Pasien.pdf");
?>
