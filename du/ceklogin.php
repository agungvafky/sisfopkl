<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$id_tempat = $_POST['id_tempat'];
$password_tempat = md5($_POST['password_tempat']);


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from tempat where id_tempat='$id_tempat' and password_tempat='$password_tempat'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);


		// buat session login dan username
		$_SESSION['id_tempat'] = $data['id_tempat'];
		$_SESSION['password_tempat'] = $data['password_tempat'];
		$_SESSION['foto'] = $data['foto'];
		$_SESSION['nama_tempat'] = $data['nama_tempat'];
	
		// alihkan ke halaman dashboard admin
		header("location:home.php");
}else{
	header("location:index.php?pesan=gagal");
}

?>

