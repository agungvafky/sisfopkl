<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$nis = $_POST['nis'];
$password = md5($_POST['password']);


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from siswa where nis='$nis' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);


		// buat session login dan username
		$_SESSION['nis'] = $data['nis'];
		$_SESSION['password'] = $data['password'];
		$_SESSION['foto'] = $data['foto'];
		$_SESSION['nama'] = $data['nama'];
	
		// alihkan ke halaman dashboard admin
		header("location:siswa/index.php");
}else{
	header("location:index.php?pesan=gagal");
}

?>

