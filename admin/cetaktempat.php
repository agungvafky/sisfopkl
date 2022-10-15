<?php

include('koneksi.php');
require_once("../dompdf/dompdf_config.inc.php");

function tgl_indo($tanggal){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);
  
  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun
 
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

 
$query = mysqli_query($koneksi,"select * from tempat ");
$html = ' <html>

<head>
<style>
@page { margin: 2cm 2cm 2cm 3cm; }
.style1{
  font-size: 17px;
  font-family:Arial;
}
</style>
</head>
<body>
<table border="0" style="width: 100%" cellspacing="0" cellpadding="0">
   
  
    <tr>

      <th align="center" width="60"><img src="../images/logosisfo.png" width="90" height="90"></th>
      <td colspan="7"><center><div class="style1"><b>SEKOLAH MENENGAH KEJURUAN (SMK) DARUL ULUM</b></div></center></b>
        <center><font size="17px" face="Arial"><b>MUARA KIAWAI PASAMAN BARAT</b></font></center>
        
      <center><font size="8.5px">Alamat: Jl.Sudirman Muara KIAWAI, Kec.Gunung Tuleh, HP 0813 6319 2771 kode pos 26371</font></center></td>
     
      
    <tr>
  </table>
  <hr>
<center><h3><u>Laporan Tempat PKL</u></center> 
  
  ';

  
$html .= '<center>

<br>
      <table border="1" width="100%" cellpadding="4" cellspacing="0">
       <tr>
          <th>No</th>
          <th>Nama Instansi</th>
          <th>Alamat</th>
        </tr>';

        $nok=1;
         while($row = mysqli_fetch_array($query))
         {
           $html .='<tr>
            <td align="center">'.$nok.'</td>
            <td>'.$row['nama_tempat'].'</td>
            <td>'.$row['alamat'].'</td>
            
        </tr>';
        $nok++;
      }

     $html .='</table> 

     <br>
        <table border="0" width="100%">
           <tr>
            <td width="55%"></td>
            <td>Muara Kiawai, '.tgl_indo(date('Y-m-d')).'<br>
            Kepala SMK Darul Ulum Muara Kiawai<br><br><br><br><br>
            <b><u>Roy Ihsan, S.Pd</u></b><br>
            
            </td>
           
        </tr>
        </table>
     </body>
        ';

        
   
$dompdf = new Dompdf();
$html .= '</html>';

$dompdf->load_Html($html);
// Setting ukuran dan orientasi kertas
$dompdf->set_Paper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('TempatPKL.pdf', array("Attachment"=>0));

?>