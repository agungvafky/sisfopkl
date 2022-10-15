<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id_tempat = $_GET['id_tempat'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from tempat where id_tempat='$id_tempat'");
 
// mengalihkan halaman kembali ke index.php
echo "<script> alert('Berhasil dihapus');</script>";
echo "<script> window.location='tempat.php';</script>"; 
?>