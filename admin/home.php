<!DOCTYPE html>
<html lang="en">
<?php include "koneksi.php" ?>
<head>
<?php include('partial2/head.php'); ?>
<script type="text/javascript" src="../chartjs/Chart.js"></script>
</head>

<body>
    <?php 
    session_start();
 
    // cek apakah yang mengakses halaman ini sudah login
    if($_SESSION['id_admin']==""){
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

            <div class="container-fluid mt-3">
                <div class="row">
                     <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Siswa</h3>
                                <div class="d-inline-block">
                                    <?php
                                     
                                    $datad = mysqli_query($koneksi,"select count(nis) as jum from siswa ");
                                    while($data = mysqli_fetch_array($datad)){
                                    ?>
                                    <h2 class="text-white"><?php echo $data['jum'] ;?></h2>
                                    <?php } ?>
                                    <p class="text-white mb-0"><?php echo date('Y-d-m'); ?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-group"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Pembimbing</h3>
                                <div class="d-inline-block">
                                    <?php
                                     
                                    $datad = mysqli_query($koneksi,"select count(nip) as jum from pembimbing ");
                                    while($data = mysqli_fetch_array($datad)){
                                    ?>
                                    <h2 class="text-white"><?php echo $data['jum'] ;?></h2>
                                    <?php } ?>
                                    <p class="text-white mb-0"><?php echo date('Y-d-m'); ?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-group"></i></span>
                            </div>
                        </div>
                    </div>

                     <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-9">
                            <div class="card-body">
                                <h3 class="card-title text-white">Tempat</h3>
                                <div class="d-inline-block">
                                    <?php
                                    $datad = mysqli_query($koneksi,"select count(id_tempat) as jum from tempat");
                                    while($data = mysqli_fetch_array($datad)){
                                    ?>
                                    <h2 class="text-white"><?php echo $data['jum'] ;?></h2>
                                    <?php } ?>
                                    <p class="text-white mb-0"><?php echo date('Y-d-m'); ?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-building-o"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-7">
                            <div class="card-body">
                                <h3 class="card-title text-white">PKL</h3>
                                <div class="d-inline-block">
                                    <?php
                                    $datad = mysqli_query($koneksi,"select count(no) as jum from pkl");
                                    while($data = mysqli_fetch_array($datad)){
                                    ?>
                                    <h2 class="text-white"><?php echo $data['jum'] ;?></h2>
                                    <?php } ?>
                                    <p class="text-white mb-0"><?php echo date('Y-d-m'); ?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-folder-o"></i></span>
                            </div>
                        </div>
                    </div>



                    <div class=row>
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tombol Pintas Aplikasi</h4>
                                <div class="button-icon">
                                  <table width="100%" align="center">
                                      <tr>
                                        <td>
                                        <a href="kelas.php"> 
                                            <button type="button" class="btn mb-1 btn-info">Kelas<span class="btn-icon-right"><i class="fa fa-university"></i></span>
                                            </button>
                                        </a>
                                        </td>
                                          <td>
                                            <a href="siswa.php">
                                            <button type="button" class="btn mb-1 btn-info">Siswa<span class="btn-icon-right"><i class="fa fa-group"></i></span>
                                            </button>
                                            </a>  
                                          </td>
                                          <td>
                                            <a href="tempat.php">
                                            <button type="button" class="btn mb-1 btn-info">Tempat<span class="btn-icon-right"><i class="fa fa-building"></i></span>
                                            </button> 
                                            </a>
                                          </td>
                                      </tr>
                                     <tr>
                                        <td>
                                            <a href="pkl.php"> 
                                                <button type="button" class="btn mb-1 btn-info">PKL<span class="btn-icon-right"><i class="fa fa-group"></i></span>
                                                </button>
                                            </a>
                                        </td>
                                          <td>
                                            <a href="panduan.php">
                                                <button type="button" class="btn mb-1 btn-info">Panduan<span class="btn-icon-right"><i class="fa fa-book"></i></span>
                                                </button>  
                                            </a>
                                          </td>
                                          <td>
                                            <a href="pengaturan_pengguna.php">
                                                <button type="button" class="btn mb-1 btn-info">Pengguna<span class="btn-icon-right"><i class="fa fa-reorder"></i></span>
                                                </button> 
                                            </a>
                                          </td>
                                      </tr>
                                      <tr>
                                        <td> 
                                           
                                        </td>
                                          <td>
                                             
                                          </td>
                                          <td>
                                            
                                          </td>
                                      </tr>
                                  </table>
                                </div>
                            </div>
                        </div>
                    </div>
                

               
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Sekilas Tentang Sistem Informasi PKL (SisfoPKL)</h4>
                                <div class="button-icon">
                                     <ol type="A">
                                     <li>1. SisfoPKL adalah sistem informasi yang dimaksudkan untuk membantu terselenggaranya proses PKL yang lancar, bermutu, otomatis, dan komputerized</li>
                                      <li>2. SisfoPKL dimaksudkan sebagai media penyampaian informasi terkait dengan informasi PKL siswa secara efektif dan efisien</li>
                                      <li>3. SisfoPKL sebagai media penyimpanan data PKL siswa</li>
                                      <li>SisfoPKL berisikan data-data kelas, siswa, tempat PKL, Pembimbing PKL, dan data PKL</li>
                                      <li>4. Sisfo PKL dimaksudkan untuk siswa agar lebih mudah mendapatkan informasi mengenai PKL</li>      
                                         </ol>         
                                                            
                                </div>                 
                          
                            </div>
                        </div>
                    </div>
                </div>
                

                </div>
                 
            </div>

        
    </div>
      <div class="footer">      
        <?php include('partial2/footer.php'); ?>
        </div>
    </div>



                   
    </script>
    <?php include('partial2/js.php'); ?>
      <script src="../plugins/chart.js/Chart.bundle.min.js"></script>
    <script src="../js/plugins-init/chartjs-init.js"></script>
     <script src="../plugins/raphael/raphael.min.js"></script>

    

    <script src="../plugins/morris/morris.min.js"></script>
    <script src="../js/plugins-init/morris-init.js"></script>

</body>

</html>