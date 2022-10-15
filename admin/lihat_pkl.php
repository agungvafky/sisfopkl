<!DOCTYPE html>
<html lang="en">

<head>
<?php include('partial2/head.php'); ?>
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

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data PKL</h4>
                                 
                                    <p align="right">
                                        
                                    
                                    </p>
                                 <a href="pkl.php">
                                        <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-arrow-left"></i>&nbsp; Kembali</button>
                                    </a>
                                    <br><br>
                                
                                <?php
                                    include "koneksi.php";
                                    $no=$_GET['no'];
                                      $datad = mysqli_query($koneksi,"select * from pkl join siswa on pkl.nis=siswa.nis join pembimbing on pkl.nip=pembimbing.nip join tempat on pkl.id_tempat=tempat.id_tempat where no='$no'");
                                        while($data = mysqli_fetch_array($datad)){
                                      
                                      
                                      ?>
                                <div class="basic-form">
                                    <div class="table-responsive">
                                        <table width="100%" border="0" cellpadding="20" cellspacing="20">
                                            <tr height="30">
                                                <td width="120" rowspan="8" align="center"><img src="../tempat/<?php echo $data['foto'];?>" height="200" width="170" class="bulat"></td>
                                                <td width="170">&nbsp NIS</td>
                                                <td>: <?php echo $data['nis']; ?></td>
                                            </tr>

                                            <tr height="30" >
                                                <td width="100" >&nbsp Nama Siswa</td>
                                                <td>: <?php echo $data['nama'];?></td>
                                            </tr>

                                            <tr height="30">
                                                <td>&nbsp Lokasi  </td>
                                                <td>: <?php echo $data['nama_tempat'];?></td>
                                            </tr>

                                            <tr height="30">
                                                <td>&nbsp Nama Pembimbing</td>
                                                <td>: <?php echo $data['nama_p'];?> </td>
                                            </tr>

                                             <tr height="30">
                                                <td>&nbsp File Laporan</td>
                                                
                                                <td>
                                                    <?php 
                                                  $file=$data['file'];
                                                  

                                                    if($file=="kosong") {
                                                        
                                                      ?>
                                                      : data belum ada
                                                  <?php } 
                                                  else{
                                                      ?>
                                                  
                                                    : <a href="../tempat/<?php echo $data['file'];?>" target="_blank"><i class="fa fa-file"> </i></a>
                                                <?php } ?>
                                                </td>
                                            </tr>

                                            <tr height="30">
                                                <td></td>
                                                
                                                <td></td>
                                                
                                            
                                            </tr>

                                           

                                      <?php } ?>      
                                        </table>
                                        </div>
                                    </div>
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