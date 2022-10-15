<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$nip = $_GET['nip'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from pembimbing where nip='$nip'");
 
// mengalihkan halaman kembali ke index.php
echo "<script> alert('Data berhasil dihapus,');</script>";
echo "<script> window.location='pembimbing.php';</script>"; 
?>