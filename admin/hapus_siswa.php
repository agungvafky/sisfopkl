<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$nis = $_GET['nis'];

 
// menghapus data dari database
 mysqli_query($koneksi,"delete from siswa where nis='$nis'");

 

echo "<script> alert('Data Siswa Berhasil di hapus');</script>";
echo "<script> window.location='siswa.php';</script>";

?>