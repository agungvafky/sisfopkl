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

$lokasi=$_GET['lokasi'];
$pembimbing=$_GET['pembimbing'];
$kelas=$_GET['kelas'];
$tanggal_awal=$_GET['tanggal_awal'];
$tanggal_akhir=$_GET['tanggal_akhir'];
$id_tempat=$_GET['id_tempat'];

$query = mysqli_query($koneksi,"SELECT * FROM pkl join siswa on pkl.nis=siswa.nis join kelas on siswa.id_kelas=kelas.id_kelas join pembimbing on pkl.nip=pembimbing.nip join tempat on pkl.id_tempat=tempat.id_tempat where nilai!='0' and kelas.id_kelas='$kelas' and pkl.id_tempat='$id_tempat' and pembimbing.nip='$pembimbing' and tgl_mulai between '$tanggal_awal' AND '$tanggal_akhir' ORDER BY no DESC");

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
<center><h3><u>Nilai Siswa PKL</u></center> 
  
  ';

  
$html .= '<center>

<br>
      <table border="1" width="100%" cellpadding="4" cellspacing="0">
       <tr>
          <th>No</th>
          <th>NIS</th>
          <th>Nama Siswa</th>
          <th>Kelas</th>
          <th>Lokasi</th>
          <th>Pembimbing</th>
          <th>Nilai</th>
           <th>Keterangan</th>
        </tr>';

        $nok=1;
         while($row = mysqli_fetch_array($query))
         {
           $html .='<tr>
            <td align="center">'.$nok.'</td>
            <td>'.$row['nis'].'</td>
            <td>'.$row['nama'].'</td>
            <td>'.$row['nama_kelas'].' '.$row['jurusan'].'</td>
            <td>'.$row['nama_tempat'].'</td>
            <td>'.$row['nama_p'].'</td>
            <td>'.$row['nilai'].'</td>
            <td>'.$row['keterangan'].'</td>
            
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
$dompdf->stream('Nilai.pdf', array("Attachment"=>0));

?>