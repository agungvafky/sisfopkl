<!DOCTYPE html>
<html lang="en">

<head>
<?php include('partial2/head.php');
 include "koneksi.php";
 ?>
</head>

<body>
    <?php 
    session_start();
 
    // cek apakah yang mengakses halaman ini sudah login
    if($_SESSION['id_tempat']==""){
        header("location:index.php?pesan=gagal");
    }
 
    ?>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        
            <?php include('partial2/topbar.php'); ?>
        </div>
        <!--**********************************
            topbar end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
           <?php include('partial2/sidebar.php'); ?>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Laporan Nilai Siswa Praktek Kerja Lapangan</h4>
                               
                                    <p align="right">

                                         <a href="nilaipkl.php">
                                            <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-arrow-left"></i>&nbsp; Kembali</button>
                                        </a>

                                         <a href="cetaknilai.php?id_tempat=<?php echo $_SESSION['id_tempat'] ?>" target="_blank">
                                            <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-file"></i> Cetak</button>
                                        </a>
                                        
                                     <form method="post" action="">
                                         <div class="form-row">
                                        
                                            <input type="hidden" name="lokasi">
                                           
                                            <div class="form-group col-md-3">
                                                <label>Pembimbing</label>
                                                <select id="kategori" name="pembimbing" class="form-control">
                                                     <option disabled="" selected="">--Pilih disini--</option>
                                                    <?php

                                                        $datad = mysqli_query($koneksi,"select * from pembimbing");
                                                        while($data = mysqli_fetch_array($datad))
                                                    { ?>
                                                        <option value="<?php echo $data['nip'];?>"><?php echo $data['nama_p'];?></option>
                                                    <?php } ?>
                                                    
                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label>Kelas</label>
                                                <select id="kelas" name="kelas" class="form-control">
                                                     <option disabled="" selected="">--Pilih disini--</option>
                                                    <?php

                                                        $datad = mysqli_query($koneksi,"select * from kelas");
                                                        while($data = mysqli_fetch_array($datad))
                                                    { ?>
                                                        <option value="<?php echo $data['id_kelas'];?>"><?php echo $data['nama_kelas'];?> <?php echo $data['jurusan'];?></option>
                                                    <?php } ?>
                                                    
                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label>Keterangan</label>
                                                <select id="kelas" name="keterangan" class="form-control">
                                                     <option disabled="" selected="">--Pilih disini--</option>
                                                     <option>Lulus</option>
                                                     <option>Gagal</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label>tanggal awal</label>
                                                <input type="date" name="tanggal_awal" class="form-control" required="">
                                            </div>
                                           
                                            <div class="form-group col-md-3">
                                                <label>Tanggal akhir</label>
                                                <input type="date" name="tanggal_akhir" class="form-control" required="">
                                            </div>


                                            
                                        </div>
                                        <input type="submit" class="btn mb-9 btn-flat btn-outline-success" class="fa-shopping-cart" name="cari" id="cari" value="cari"/>
                                    </form>
                                       
                              <?php
                                         if (isset($_POST['cari']))
                                            {
                                              if(empty($_POST['keterangan']) && !empty($_POST['pembimbing']) && empty($_POST['kelas']) && empty($_POST['lokasi']) && !empty($_POST['tanggal_awal']) && !empty($_POST['tanggal_akhir'])){
                                                 
                                                
                                                $lokasi=$_POST['lokasi'];
                                                $tanggal_awal=$_POST['tanggal_awal'];
                                                $tanggal_akhir=$_POST['tanggal_akhir'];
                                              
                                                include 'koneksi.php';
                                                $datad=mysqli_query($koneksi,"SELECT * FROM pkl join siswa on pkl.nis=siswa.nis join kelas on siswa.id_kelas=kelas.id_kelas join pembimbing on pkl.nip=pembimbing.nip join tempat on pkl.id_tempat=tempat.id_tempat where tempat.id_tempat='$lokasi' and nilai!='0' and tgl_mulai between '$tanggal_awal' AND '$tanggal_akhir' ORDER BY no DESC");
                                           
                                                    ?>
                                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIS</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Lokasi</th>
                                                <th>Pembimbing</th>
                                                <th>Nilai</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                   
                                        <tbody>
                                             <?php
                                      include "koneksi.php";
                                      $no=1;
                                       while($data = mysqli_fetch_array($datad)){
                                      ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $data['nis'];?></td>
                                                <td><?php echo $data['nama'];?></td>
                                                <td><?php echo $data['nama_kelas'];?> <?php echo $data['jurusan'];?></td>
                                                <td><?php echo $data['nama_tempat'];?></td>
                                                <td><?php echo $data['nama_p'];?></td>
                                                <td><?php echo $data['nilai'];?></td>
                                                <td><?php echo $data['keterangan'];?></td>     
                                            </tr>
                                             <?php $no++; } ?>
                                             
                                        </tbody>
                                   
                                    </table>
                                </div>
                                <br>
                                <a href="cetaknilai1.php?lokasi=<?php echo $lokasi ?>&&tanggal_awal=<?php echo $tanggal_awal ?>&&tanggal_akhir=<?php echo $tanggal_akhir ?>&&id_tempat=<?php echo $_SESSION['id_tempat'] ?>" target="_blank">
                                    <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-print"></i>&nbsp; Cetak</button>
                                </a>
                                <?php ;}

                               else if(empty($_POST['pembimbing']) && empty($_POST['kelas']) &&  !empty($_POST['pembimbing']) && !empty($_POST['tanggal_awal']) && !empty($_POST['tanggal_akhir'])){
                                                 
                                                
                                               
                                                $pembimbing=$_POST['pembimbing'];
                                                $tanggal_awal=$_POST['tanggal_awal'];
                                                $tanggal_akhir=$_POST['tanggal_akhir'];
                                              
                                                include 'koneksi.php';
                                                $datad=mysqli_query($koneksi,"SELECT * FROM pkl join siswa on pkl.nis=siswa.nis join kelas on siswa.id_kelas=kelas.id_kelas join pembimbing on pkl.nip=pembimbing.nip join tempat on pkl.id_tempat=tempat.id_tempat where nilai!='0' and pembimbing.nip='$pembimbing' and tgl_mulai between '$tanggal_awal' AND '$tanggal_akhir' ORDER BY no DESC");
                                           
                                                    ?>
                                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIS</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Lokasi</th>
                                                <th>Pembimbing</th>
                                                <th>Nilai</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                   
                                        <tbody>
                                             <?php
                                      include "koneksi.php";
                                      $no=1;
                                       while($data = mysqli_fetch_array($datad)){
                                      ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $data['nis'];?></td>
                                                <td><?php echo $data['nama'];?></td>
                                                <td><?php echo $data['nama_kelas'];?> <?php echo $data['jurusan'];?></td>
                                                <td><?php echo $data['nama_tempat'];?></td>
                                                <td><?php echo $data['nama_p'];?></td>
                                                <td><?php echo $data['nilai'];?></td>
                                                <td><?php echo $data['keterangan'];?></td>     
                                            </tr>
                                             <?php $no++; } ?>
                                             
                                        </tbody>
                                   
                                    </table>
                                </div>
                                <br>
                                <a href="cetaknilai2.php?pembimbing=<?php echo $pembimbing ?>&&tanggal_awal=<?php echo $tanggal_awal ?>&&tanggal_akhir=<?php echo $tanggal_akhir ?>&&id_tempat=<?php echo $_SESSION['id_tempat'] ?>" target="_blank">
                                    <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-print"></i>&nbsp; Cetak</button>
                                </a> 
                            <?php
                                ;}

                                 else if(empty($_POST['keterangan']) && empty($_POST['kelas']) && !empty($_POST['lokasi']) && !empty($_POST['pembimbing']) && !empty($_POST['tanggal_awal']) && !empty($_POST['tanggal_akhir'])){
                                                 
                                                
                                                 $lokasi=$_POST['lokasi'];
                                                $pembimbing=$_POST['pembimbing'];
                                                $tanggal_awal=$_POST['tanggal_awal'];
                                                $tanggal_akhir=$_POST['tanggal_akhir'];
                                              
                                                include 'koneksi.php';
                                                $datad=mysqli_query($koneksi,"SELECT * FROM pkl join siswa on pkl.nis=siswa.nis join kelas on siswa.id_kelas=kelas.id_kelas join pembimbing on pkl.nip=pembimbing.nip join tempat on pkl.id_tempat=tempat.id_tempat where nilai!='0' and tempat.id_tempat='$lokasi' and pembimbing.nip='$pembimbing' and tgl_mulai between '$tanggal_awal' AND '$tanggal_akhir' ORDER BY no DESC");
                                           
                                                    ?>
                                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIS</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Lokasi</th>
                                                <th>Pembimbing</th>
                                                <th>Nilai</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                   
                                        <tbody>
                                             <?php
                                      include "koneksi.php";
                                      $no=1;
                                       while($data = mysqli_fetch_array($datad)){
                                      ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $data['nis'];?></td>
                                                <td><?php echo $data['nama'];?></td>
                                                <td><?php echo $data['nama_kelas'];?> <?php echo $data['jurusan'];?></td>
                                                <td><?php echo $data['nama_tempat'];?></td>
                                                <td><?php echo $data['nama_p'];?></td>
                                                <td><?php echo $data['nilai'];?></td>
                                                <td><?php echo $data['keterangan'];?></td>     
                                            </tr>
                                             <?php $no++; } ?>
                                             
                                        </tbody>
                                   
                                    </table>
                                </div>
                                <br>
                                <a href="cetaknilai3.php?lokasi=<?php echo $lokasi ?>&&pembimbing=<?php echo $pembimbing ?>&&tanggal_awal=<?php echo $tanggal_awal ?>&&tanggal_akhir=<?php echo $tanggal_akhir ?>&&id_tempat=<?php echo $_SESSION['id_tempat'] ?>" target="_blank">
                                    <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-print"></i>&nbsp; Cetak</button>
                                </a> 
                            <?php
                            ;}
                              else if(empty($_POST['keterangan']) && !empty($_POST['tanggal_awal']) && !empty($_POST['tanggal_akhir']) && empty($_POST['pembimbing']) && empty($_POST['lokasi']) && empty($_POST['kelas'])  ){
                                                 
                                                
                                             
                                                $tanggal_awal=$_POST['tanggal_awal'];
                                                $tanggal_akhir=$_POST['tanggal_akhir'];
                                              
                                                include 'koneksi.php';
                                                $datad=mysqli_query($koneksi,"SELECT * FROM pkl join siswa on pkl.nis=siswa.nis join kelas on siswa.id_kelas=kelas.id_kelas join pembimbing on pkl.nip=pembimbing.nip join tempat on pkl.id_tempat=tempat.id_tempat WHERE nilai!='0' and tgl_mulai between '$tanggal_awal' AND '$tanggal_akhir' ORDER BY no DESC");
                                           
                                                    ?>
                                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                    <tr>
                                                <th>No</th>
                                                <th>NIS</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Lokasi</th>
                                                <th>Pembimbing</th>
                                                <th>Nilai</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                   
                                        <tbody>
                                             <?php
                                      include "koneksi.php";
                                      $no=1;
                                       while($data = mysqli_fetch_array($datad)){
                                      ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $data['nis'];?></td>
                                                <td><?php echo $data['nama'];?></td>
                                                <td><?php echo $data['nama_kelas'];?> <?php echo $data['jurusan'];?></td>
                                                <td><?php echo $data['nama_tempat'];?></td>
                                                <td><?php echo $data['nama_p'];?></td>
                                                <td><?php echo $data['nilai'];?></td>
                                                <td><?php echo $data['keterangan'];?></td>     
                                            </tr>
                                             <?php $no++; } ?>
                                             
                                        </tbody>
                                   
                                    </table>
                                </div>
                                <br>
                                <a href="cetaknilai4.php?tanggal_awal=<?php echo $tanggal_awal ?>&&tanggal_akhir=<?php echo $tanggal_akhir ?>&&id_tempat=<?php echo $_SESSION['id_tempat'] ?>" target="_blank">
                                    <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-print"></i>&nbsp; Cetak</button>
                                </a> 

                           
                           

                            <?php
                             ;}
                             else if(empty($_POST['keterangan']) && empty($_POST['lokasi']) && empty($_POST['pembimbing']) && !empty($_POST['kelas']) && !empty($_POST['tanggal_awal']) && !empty($_POST['tanggal_akhir'])){
                                                 
                                                
                                                $kelas=$_POST['kelas'];
                                             
                                                $tanggal_awal=$_POST['tanggal_awal'];
                                                $tanggal_akhir=$_POST['tanggal_akhir'];
                                              
                                                include 'koneksi.php';
                                                $datad=mysqli_query($koneksi,"SELECT * FROM pkl join siswa on pkl.nis=siswa.nis join kelas on siswa.id_kelas=kelas.id_kelas join pembimbing on pkl.nip=pembimbing.nip join tempat on pkl.id_tempat=tempat.id_tempat where nilai!='0' and kelas.id_kelas='$kelas' and
                                                 tgl_mulai between '$tanggal_awal' AND '$tanggal_akhir' ORDER BY no DESC");
                                                
                                                    ?>

                                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIS</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Lokasi</th>
                                                <th>Pembimbing</th>
                                                <th>Nilai</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                   
                                        <tbody>
                                             <?php
                                      include "koneksi.php";
                                      $no=1;
                                       while($data = mysqli_fetch_array($datad)){
                                      ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $data['nis'];?></td>
                                                <td><?php echo $data['nama'];?></td>
                                                <td><?php echo $data['nama_kelas'];?> <?php echo $data['jurusan'];?></td>
                                                <td><?php echo $data['nama_tempat'];?></td>
                                                <td><?php echo $data['nama_p'];?></td>
                                                <td><?php echo $data['nilai'];?></td>
                                                <td><?php echo $data['keterangan'];?></td>     
                                            </tr>
                                             <?php $no++; } ?>
                                             
                                        </tbody>
                                   
                                    </table>
                                </div>
                                <br>
                                <a href="cetaknilai5.php?kelas=<?php echo $kelas ?>&&tanggal_awal=<?php echo $tanggal_awal ?>&&tanggal_akhir=<?php echo $tanggal_akhir ?>&&id_tempat=<?php echo $_SESSION['id_tempat'] ?>" target="_blank">
                                    <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-print"></i>&nbsp; Cetak</button>
                                </a> 
                             <?php ; }

                             else if(empty($_POST['keterangan']) && !empty($_POST['kelas']) && !empty($_POST['lokasi']) && !empty($_POST['pembimbing']) && !empty($_POST['tanggal_awal']) && !empty($_POST['tanggal_akhir'])){
                                                 
                                                
                                                $lokasi=$_POST['lokasi'];
                                                $pembimbing=$_POST['pembimbing'];
                                                $kelas=$_POST['kelas'];
                                                $tanggal_awal=$_POST['tanggal_awal'];
                                                $tanggal_akhir=$_POST['tanggal_akhir'];
                                              
                                                include 'koneksi.php';
                                                $datad=mysqli_query($koneksi,"SELECT * FROM pkl join siswa on pkl.nis=siswa.nis join kelas on siswa.id_kelas=kelas.id_kelas join pembimbing on pkl.nip=pembimbing.nip join tempat on pkl.id_tempat=tempat.id_tempat where nilai!='0' and kelas.id_kelas='$kelas' and tempat.id_tempat='$lokasi' and pembimbing.nip='$pembimbing' and tgl_mulai between '$tanggal_awal' AND '$tanggal_akhir' ORDER BY no DESC");
                                           
                                                    ?>
                                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIS</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Lokasi</th>
                                                <th>Pembimbing</th>
                                                <th>Nilai</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                   
                                        <tbody>
                                             <?php
                                      include "koneksi.php";
                                      $no=1;
                                       while($data = mysqli_fetch_array($datad)){
                                      ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $data['nis'];?></td>
                                                <td><?php echo $data['nama'];?></td>
                                                <td><?php echo $data['nama_kelas'];?> <?php echo $data['jurusan'];?></td>
                                                <td><?php echo $data['nama_tempat'];?></td>
                                                <td><?php echo $data['nama_p'];?></td>
                                                <td><?php echo $data['nilai'];?></td>
                                                <td><?php echo $data['keterangan'];?></td>     
                                            </tr>
                                             <?php $no++; } ?>
                                             
                                        </tbody>
                                   
                                    </table>
                                </div>
                                <br>
                                <a href="cetaknilai6.php?kelas=<?php echo $kelas ?>&&lokasi=<?php echo $lokasi ?>&&pembimbing=<?php echo $pembimbing ?>&&tanggal_awal=<?php echo $tanggal_awal ?>&&tanggal_akhir=<?php echo $tanggal_akhir ?>&&id_tempat=<?php echo $_SESSION['id_tempat'] ?>" target="_blank">
                                    <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-print"></i>&nbsp; Cetak</button>
                                </a> 
                            <?php
                            ;}

                            else if(!empty($_POST['keterangan']) && empty($_POST['kelas']) && empty($_POST['lokasi']) && empty($_POST['pembimbing']) && !empty($_POST['tanggal_awal']) && !empty($_POST['tanggal_akhir'])){
                                                 
                                                
                                                
                                                $keterangan=$_POST['keterangan'];
                                                $tanggal_awal=$_POST['tanggal_awal'];
                                                $tanggal_akhir=$_POST['tanggal_akhir'];
                                              
                                                include 'koneksi.php';
                                                $datad=mysqli_query($koneksi,"SELECT * FROM pkl join siswa on pkl.nis=siswa.nis join kelas on siswa.id_kelas=kelas.id_kelas join pembimbing on pkl.nip=pembimbing.nip join tempat on pkl.id_tempat=tempat.id_tempat where nilai!='0' and keterangan='$keterangan' and tgl_mulai between '$tanggal_awal' AND '$tanggal_akhir' ORDER BY no DESC");
                                           
                                                    ?>
                                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIS</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Lokasi</th>
                                                <th>Pembimbing</th>
                                                <th>Nilai</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                   
                                        <tbody>
                                             <?php
                                      include "koneksi.php";
                                      $no=1;
                                       while($data = mysqli_fetch_array($datad)){
                                      ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $data['nis'];?></td>
                                                <td><?php echo $data['nama'];?></td>
                                                <td><?php echo $data['nama_kelas'];?> <?php echo $data['jurusan'];?></td>
                                                <td><?php echo $data['nama_tempat'];?></td>
                                                <td><?php echo $data['nama_p'];?></td>
                                                <td><?php echo $data['nilai'];?></td>
                                                <td><?php echo $data['keterangan'];?></td>     
                                            </tr>
                                             <?php $no++; } ?>
                                             
                                        </tbody>
                                   
                                    </table>
                                </div>
                                <br>
                                <a href="cetaknilai7.php?keterangan=<?php echo $keterangan ?>&&tanggal_awal=<?php echo $tanggal_awal ?>&&tanggal_akhir=<?php echo $tanggal_akhir ?>&&id_tempat=<?php echo $_SESSION['id_tempat'] ?>" target="_blank">
                                    <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-print"></i>&nbsp; Cetak</button>
                                </a> 
                            <?php
                            ;}

                             else if(!empty($_POST['keterangan']) && !empty($_POST['kelas']) && empty($_POST['lokasi']) && empty($_POST['pembimbing']) && !empty($_POST['tanggal_awal']) && !empty($_POST['tanggal_akhir'])){
                                                 
                                                
                                                
                                                $kelas=$_POST['kelas'];
                                                $keterangan=$_POST['keterangan'];
                                                $tanggal_awal=$_POST['tanggal_awal'];
                                                $tanggal_akhir=$_POST['tanggal_akhir'];
                                              
                                                include 'koneksi.php';
                                                $datad=mysqli_query($koneksi,"SELECT * FROM pkl join siswa on pkl.nis=siswa.nis join kelas on siswa.id_kelas=kelas.id_kelas join pembimbing on pkl.nip=pembimbing.nip join tempat on pkl.id_tempat=tempat.id_tempat where nilai!='0' and keterangan='$keterangan' and kelas.id_kelas='$kelas' and tgl_mulai between '$tanggal_awal' AND '$tanggal_akhir' ORDER BY no DESC");
                                           
                                                    ?>
                                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIS</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Lokasi</th>
                                                <th>Pembimbing</th>
                                                <th>Nilai</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                   
                                        <tbody>
                                             <?php
                                      include "koneksi.php";
                                      $no=1;
                                       while($data = mysqli_fetch_array($datad)){
                                      ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $data['nis'];?></td>
                                                <td><?php echo $data['nama'];?></td>
                                                <td><?php echo $data['nama_kelas'];?> <?php echo $data['jurusan'];?></td>
                                                <td><?php echo $data['nama_tempat'];?></td>
                                                <td><?php echo $data['nama_p'];?></td>
                                                <td><?php echo $data['nilai'];?></td>
                                                <td><?php echo $data['keterangan'];?></td>     
                                            </tr>
                                             <?php $no++; } ?>
                                             
                                        </tbody>
                                   
                                    </table>
                                </div>
                                <br>
                                <a href="cetaknilai8.php?keterangan=<?php echo $keterangan ?>&&kelas=<?php echo $kelas ?>&&tanggal_awal=<?php echo $tanggal_awal ?>&&tanggal_akhir=<?php echo $tanggal_akhir ?>&&id_tempat=<?php echo $_SESSION['id_tempat'] ?>" target="_blank">
                                    <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-print"></i>&nbsp; Cetak</button>
                                </a> 
                            <?php
                            ;}
                            else if(!empty($_POST['keterangan']) && empty($_POST['kelas']) && !empty($_POST['lokasi']) && empty($_POST['pembimbing']) && !empty($_POST['tanggal_awal']) && !empty($_POST['tanggal_akhir'])){
                                                 
                                                
                                                
                                                $lokasi=$_POST['lokasi'];
                                                $keterangan=$_POST['keterangan'];
                                                $tanggal_awal=$_POST['tanggal_awal'];
                                                $tanggal_akhir=$_POST['tanggal_akhir'];
                                              
                                                include 'koneksi.php';
                                                $datad=mysqli_query($koneksi,"SELECT * FROM pkl join siswa on pkl.nis=siswa.nis join kelas on siswa.id_kelas=kelas.id_kelas join pembimbing on pkl.nip=pembimbing.nip join tempat on pkl.id_tempat=tempat.id_tempat where nilai!='0' and keterangan='$keterangan' and tempat.id_tempat='$lokasi' and tgl_mulai between '$tanggal_awal' AND '$tanggal_akhir' ORDER BY no DESC");
                                           
                                                    ?>
                                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIS</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Lokasi</th>
                                                <th>Pembimbing</th>
                                                <th>Nilai</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                   
                                        <tbody>
                                             <?php
                                      include "koneksi.php";
                                      $no=1;
                                       while($data = mysqli_fetch_array($datad)){
                                      ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $data['nis'];?></td>
                                                <td><?php echo $data['nama'];?></td>
                                                <td><?php echo $data['nama_kelas'];?> <?php echo $data['jurusan'];?></td>
                                                <td><?php echo $data['nama_tempat'];?></td>
                                                <td><?php echo $data['nama_p'];?></td>
                                                <td><?php echo $data['nilai'];?></td>
                                                <td><?php echo $data['keterangan'];?></td>     
                                            </tr>
                                             <?php $no++; } ?>
                                             
                                        </tbody>
                                   
                                    </table>
                                </div>
                                <br>
                                <a href="cetaknilai9.php?keterangan=<?php echo $keterangan ?>&&lokasi=<?php echo $lokasi ?>&&tanggal_awal=<?php echo $tanggal_awal ?>&&tanggal_akhir=<?php echo $tanggal_akhir ?>&&id_tempat=<?php echo $_SESSION['id_tempat'] ?>" target="_blank">
                                    <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-print"></i>&nbsp; Cetak</button>
                                </a> 
                            <?php
                            ;}
                            else if(!empty($_POST['keterangan']) && !empty($_POST['kelas']) && !empty($_POST['lokasi']) && empty($_POST['pembimbing']) && !empty($_POST['tanggal_awal']) && !empty($_POST['tanggal_akhir'])){
                                                 
                                                
                                                
                                                $lokasi=$_POST['lokasi'];
                                                $kelas=$_POST['kelas'];
                                                $keterangan=$_POST['keterangan'];
                                                $tanggal_awal=$_POST['tanggal_awal'];
                                                $tanggal_akhir=$_POST['tanggal_akhir'];
                                              
                                                include 'koneksi.php';
                                                $datad=mysqli_query($koneksi,"SELECT * FROM pkl join siswa on pkl.nis=siswa.nis join kelas on siswa.id_kelas=kelas.id_kelas join pembimbing on pkl.nip=pembimbing.nip join tempat on pkl.id_tempat=tempat.id_tempat where tempat.id_tempat='$lokasi' and nilai!='0' and keterangan='$keterangan' and kelas.id_kelas='$kelas' and tgl_mulai between '$tanggal_awal' AND '$tanggal_akhir' ORDER BY no DESC");
                                           
                                                    ?>
                                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIS</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Lokasi</th>
                                                <th>Pembimbing</th>
                                                <th>Nilai</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                   
                                        <tbody>
                                             <?php
                                      include "koneksi.php";
                                      $no=1;
                                       while($data = mysqli_fetch_array($datad)){
                                      ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $data['nis'];?></td>
                                                <td><?php echo $data['nama'];?></td>
                                                <td><?php echo $data['nama_kelas'];?> <?php echo $data['jurusan'];?></td>
                                                <td><?php echo $data['nama_tempat'];?></td>
                                                <td><?php echo $data['nama_p'];?></td>
                                                <td><?php echo $data['nilai'];?></td>
                                                <td><?php echo $data['keterangan'];?></td>     
                                            </tr>
                                             <?php $no++; } ?>
                                             
                                        </tbody>
                                   
                                    </table>
                                </div>
                                <br>
                                <a href="cetaknilai10.php?lokasi=<?php echo $lokasi ?>&&keterangan=<?php echo $keterangan ?>&&kelas=<?php echo $kelas ?>&&tanggal_awal=<?php echo $tanggal_awal ?>&&tanggal_akhir=<?php echo $tanggal_akhir ?>&&id_tempat=<?php echo $_SESSION['id_tempat'] ?>" target="_blank">
                                    <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-print"></i>&nbsp; Cetak</button>
                                </a> 
                            <?php
                            ;}
                            else if(!empty($_POST['keterangan']) && !empty($_POST['kelas']) && empty($_POST['lokasi']) && !empty($_POST['pembimbing']) && !empty($_POST['tanggal_awal']) && !empty($_POST['tanggal_akhir'])){
                                                 
                                                
                                                
                                                $pembimbing=$_POST['pembimbing'];
                                                $kelas=$_POST['kelas'];
                                                $keterangan=$_POST['keterangan'];
                                                $tanggal_awal=$_POST['tanggal_awal'];
                                                $tanggal_akhir=$_POST['tanggal_akhir'];
                                              
                                                include 'koneksi.php';
                                                $datad=mysqli_query($koneksi,"SELECT * FROM pkl join siswa on pkl.nis=siswa.nis join kelas on siswa.id_kelas=kelas.id_kelas join pembimbing on pkl.nip=pembimbing.nip join tempat on pkl.id_tempat=tempat.id_tempat where pembimbing.nip='$pembimbing' and nilai!='0' and keterangan='$keterangan' and kelas.id_kelas='$kelas' and tgl_mulai between '$tanggal_awal' AND '$tanggal_akhir' ORDER BY no DESC");
                                           
                                                    ?>
                                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIS</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Lokasi</th>
                                                <th>Pembimbing</th>
                                                <th>Nilai</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                   
                                        <tbody>
                                             <?php
                                      include "koneksi.php";
                                      $no=1;
                                       while($data = mysqli_fetch_array($datad)){
                                      ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $data['nis'];?></td>
                                                <td><?php echo $data['nama'];?></td>
                                                <td><?php echo $data['nama_kelas'];?> <?php echo $data['jurusan'];?></td>
                                                <td><?php echo $data['nama_tempat'];?></td>
                                                <td><?php echo $data['nama_p'];?></td>
                                                <td><?php echo $data['nilai'];?></td>
                                                <td><?php echo $data['keterangan'];?></td>     
                                            </tr>
                                             <?php $no++; } ?>
                                             
                                        </tbody>
                                   
                                    </table>
                                </div>
                                <br>
                                <a href="cetaknilai11.php?pembimbing=<?php echo $pembimbing ?>&&keterangan=<?php echo $keterangan ?>&&kelas=<?php echo $kelas ?>&&tanggal_awal=<?php echo $tanggal_awal ?>&&tanggal_akhir=<?php echo $tanggal_akhir ?>&&id_tempat=<?php echo $_SESSION['id_tempat'] ?>" target="_blank">
                                    <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-print"></i>&nbsp; Cetak</button>
                                </a> 
                            <?php
                            ;}
                            else if(!empty($_POST['keterangan']) && empty($_POST['kelas']) && !empty($_POST['lokasi']) && !empty($_POST['pembimbing']) && !empty($_POST['tanggal_awal']) && !empty($_POST['tanggal_akhir'])){
                                                 
                                                
                                                
                                                $pembimbing=$_POST['pembimbing'];
                                                $lokasi=$_POST['lokasi'];
                                                $keterangan=$_POST['keterangan'];
                                                $tanggal_awal=$_POST['tanggal_awal'];
                                                $tanggal_akhir=$_POST['tanggal_akhir'];
                                              
                                                include 'koneksi.php';
                                                $datad=mysqli_query($koneksi,"SELECT * FROM pkl join siswa on pkl.nis=siswa.nis join kelas on siswa.id_kelas=kelas.id_kelas join pembimbing on pkl.nip=pembimbing.nip join tempat on pkl.id_tempat=tempat.id_tempat where pembimbing.nip='$pembimbing' and nilai!='0' and keterangan='$keterangan' and tempat.id_tempat='$lokasi' and tgl_mulai between '$tanggal_awal' AND '$tanggal_akhir' ORDER BY no DESC");
                                           
                                                    ?>
                                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIS</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Lokasi</th>
                                                <th>Pembimbing</th>
                                                <th>Nilai</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                   
                                        <tbody>
                                             <?php
                                      include "koneksi.php";
                                      $no=1;
                                       while($data = mysqli_fetch_array($datad)){
                                      ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $data['nis'];?></td>
                                                <td><?php echo $data['nama'];?></td>
                                                <td><?php echo $data['nama_kelas'];?> <?php echo $data['jurusan'];?></td>
                                                <td><?php echo $data['nama_tempat'];?></td>
                                                <td><?php echo $data['nama_p'];?></td>
                                                <td><?php echo $data['nilai'];?></td>
                                                <td><?php echo $data['keterangan'];?></td>     
                                            </tr>
                                             <?php $no++; } ?>
                                             
                                        </tbody>
                                   
                                    </table>
                                </div>
                                <br>
                                <a href="cetaknilai12.php?pembimbing=<?php echo $pembimbing ?>&&keterangan=<?php echo $keterangan ?>&&lokasi=<?php echo $lokasi ?>&&tanggal_awal=<?php echo $tanggal_awal ?>&&tanggal_akhir=<?php echo $tanggal_akhir ?>&&id_tempat=<?php echo $_SESSION['id_tempat'] ?>" target="_blank">
                                    <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-print"></i>&nbsp; Cetak</button>
                                </a> 
                            <?php
                            ;}
                            else if(!empty($_POST['keterangan']) && !empty($_POST['kelas']) && !empty($_POST['lokasi']) && !empty($_POST['pembimbing']) && !empty($_POST['tanggal_awal']) && !empty($_POST['tanggal_akhir'])){
                                                 
                                                
                                                
                                                $kelas=$_POST['kelas'];
                                                $pembimbing=$_POST['pembimbing'];
                                                $lokasi=$_POST['lokasi'];
                                                $keterangan=$_POST['keterangan'];
                                                $tanggal_awal=$_POST['tanggal_awal'];
                                                $tanggal_akhir=$_POST['tanggal_akhir'];
                                              
                                                include 'koneksi.php';
                                                $datad=mysqli_query($koneksi,"SELECT * FROM pkl join siswa on pkl.nis=siswa.nis join kelas on siswa.id_kelas=kelas.id_kelas join pembimbing on pkl.nip=pembimbing.nip join tempat on pkl.id_tempat=tempat.id_tempat where siswa.id_kelas='$kelas' and pembimbing.nip='$pembimbing' and nilai!='0' and keterangan='$keterangan' and tempat.id_tempat='$lokasi' and tgl_mulai between '$tanggal_awal' AND '$tanggal_akhir' ORDER BY no DESC");
                                           
                                                    ?>
                                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIS</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Lokasi</th>
                                                <th>Pembimbing</th>
                                                <th>Nilai</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                   
                                        <tbody>
                                             <?php
                                      include "koneksi.php";
                                      $no=1;
                                       while($data = mysqli_fetch_array($datad)){
                                      ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $data['nis'];?></td>
                                                <td><?php echo $data['nama'];?></td>
                                                <td><?php echo $data['nama_kelas'];?> <?php echo $data['jurusan'];?></td>
                                                <td><?php echo $data['nama_tempat'];?></td>
                                                <td><?php echo $data['nama_p'];?></td>
                                                <td><?php echo $data['nilai'];?></td>
                                                <td><?php echo $data['keterangan'];?></td>     
                                            </tr>
                                             <?php $no++; } ?>
                                             
                                        </tbody>
                                   
                                    </table>
                                </div>
                                <br>
                                <a href="cetaknilai13.php?kelas=<?php echo $kelas ?>&&pembimbing=<?php echo $pembimbing ?>&&keterangan=<?php echo $keterangan ?>&&lokasi=<?php echo $lokasi ?>&&tanggal_awal=<?php echo $tanggal_awal ?>&&tanggal_akhir=<?php echo $tanggal_akhir ?>&&id_tempat=<?php echo $_SESSION['id_tempat'] ?>" target="_blank">
                                    <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-print"></i>&nbsp; Cetak</button>
                                </a> 
                            <?php
                            ;}
                                ?>

                                <?php  }

                                ?>     

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
             <?php include('partial2/footer.php'); ?>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
     <?php include('partial2/modal.php'); ?>
     
    <!--**********************************
    
        Scripts
    ***********************************-->
    
    <?php include('partial2/js.php'); ?>

</body>

</html>