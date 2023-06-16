<?php
include('koneksi.php');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query  = mysqli_query($koneksi,"select * from tbl_dokter");
$html   = '<center><h3>Daftar Nama Dokter</h3></center><hr/><br/>';
$html  .= '<table border="1" width="100%" style = "border-collapse:collapse">
 <tr bgcolor="#eee">
 <th>No.</th>
 <th>ID Dokter</th>
 <th>Nama</th>
 <th>Spesialis</th>
 <th>Tanggal Lahir</th>
 <th>Jenis Kelamin</th>
 <th>Alamat</th>
 <th>Telpon</th>
 </tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
 $html .= "<tr>
 <td>".$no."</td>
 <td>".$row['id_dokter']."</td>
 <td>".$row['nama_dokter']."</td>    
 <td>".$row['spesialis']."</td>    
 <td>".$row['tgl_lahir']."</td>    
 <td>".$row['kelamin']."</td>
 <td>".$row['alamat']."</td>    
 <td>".$row['no_telp']."</td>
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
$dompdf->stream('Data Dokter.pdf');
?>