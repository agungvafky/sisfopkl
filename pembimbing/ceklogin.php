<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$nip = $_POST['nip'];
$pasword_p = md5($_POST['pasword_p']);


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from pembimbing where nip='$nip' and pasword_p='$pasword_p'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);


		// buat session login dan username
		$_SESSION['nip'] = $data['nip'];
		$_SESSION['pasword_p'] = $data['pasword_p'];
		$_SESSION['foto'] = $data['foto'];
		$_SESSION['nama_p'] = $data['nama_p'];
	
		// alihkan ke halaman dashboard admin
		header("location:home.php");
}else{
	header("location:index.php?pesan=gagal");
}

?>

