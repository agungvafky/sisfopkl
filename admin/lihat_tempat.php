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
                                <h4 class="card-title">Data Tempat</h4>
                                 
                                    <p align="right">
                                        
                                    
                                    </p>
                                 <a href="tempat.php">
                                        <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-arrow-left"></i>&nbsp; Kembali</button>
                                    </a>
                                    <br><br>
                                
                                <?php
                                    include "koneksi.php";
                                    $id_tempat=$_GET['id_tempat'];
                                      $datad = mysqli_query($koneksi,"select * from tempat where id_tempat='$id_tempat'");
                                        while($data = mysqli_fetch_array($datad)){
                                      
                                      
                                      ?>
                                <div class="basic-form">
                                    <div class="table-responsive">
                                        <table width="100%" border="0" cellpadding="20" cellspacing="20">
                                            <tr height="30">
                                                <td width="120" rowspan="8" align="center"><img src="../tempat/<?php echo $data['foto'];?>" height="200" width="170" class="bulat"></td>
                                                <td width="120">&nbsp; Id Tempat</td>
                                                <td>: <?php echo $id_tempat ?></td>
                                            </tr>

                                            <tr height="30" >
                                                <td width="100" >&nbsp Nama Tempat</td>
                                                <td>: <?php echo $data['nama_tempat'];?></td>
                                            </tr>

                                            <tr height="30">
                                                <td>&nbsp MAP</td>
                                                <td>: cek lokasi<a href="<?php echo $data['map'];?>" target="_blank"> <i class="fa fa-map-marker"> </i></a></td>
                                            </tr>
                                            
                                            <tr height="30">
                                                <td>&nbsp Alamat  </td>
                                                <td>: <?php echo $data['alamat'];?></td>
                                            </tr>

                                             <tr height="30">
                                                <td> </td>
                                                <td></td>
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