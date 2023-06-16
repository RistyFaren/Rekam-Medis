<?php
include('koneksi.php');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query  = mysqli_query($koneksi,"select * from tbl_obat");
$html   = '<center><h3>Daftar Obat</h3></center><hr/><br/>';
$html  .= '<table border="1" width="100%" style = "border-collapse:collapse">
 <tr bgcolor="#eee">
 <th>No.</th>
 <th>ID Obat</th>   
 <th>Nama Obat</th>
 <th>Keterangan</th>
 <th>Harga</th>
 </tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
 $html .= "<tr>
 <td>".$no."</td>
 <td>".$row['id_obat']."</td>
 <td>".$row['nama_obat']."</td>    
 <td>".$row['keterangan']."</td>    
 <td>".$row['harga_obat']."</td>    
 </tr>";
 $no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('Data Obat.pdf');
?>