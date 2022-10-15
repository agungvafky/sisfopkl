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
                                <h4 class="card-title">Data Siswa</h4>
                                 
                                    <p align="right">
                                        
                                    
                                    </p>
                                 <a href="siswa.php">
                                        <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-arrow-left"></i>&nbsp; Kembali</button>
                                    </a>
                                    <br><br>
                                
                                <?php
                                    include "koneksi.php";
                                    $nis=$_GET['nis'];
                                      $datad = mysqli_query($koneksi,"select * from siswa where nis='$nis'");
                                        while($data = mysqli_fetch_array($datad)){
                                      
                                     
                                      ?>
                                <div class="basic-form">
                                    <div class="table-responsive">
                                        <table width="100%" border="0" cellpadding="20" cellspacing="20">
                                            <tr height="30">
                                                <td width="120" rowspan="8" align="center"><img src="../tempat/<?php echo $data['foto'];?>" height="200" width="170" class="bulat"></td>
                                                <td width="120">&nbsp; NIS</td>
                                                <td>: <?php echo $nis ?></td>
                                            </tr>

                                            <tr height="30">
                                                <td>&nbsp Nama</td>
                                                <td>: <?php echo $data['nama'];?></td>
                                            </tr>


                                            <tr height="30">
                                                <td>&nbsp Jenis Kelamin </td>
                                                <td>: <?php echo $data['jenis_kelamin'];?></td>
                                            </tr>


                                            <tr height="30">
                                                <td>&nbsp TTL </td>
                                                <td>: <?php echo $data['tempat_lahir'];?>, <?php echo $data['ttl'];?></td>
                                            </tr>

                                            <tr height="30">
                                                <td>&nbsp Kelas </td>
                                                <td>: <?php 
                                                $id_kelas=$data['id_kelas'];
                                                $datan = mysqli_query($koneksi,"select * from kelas where $id_kelas='$id_kelas'");
                                                $datag = mysqli_fetch_array($datan);                                            
                                                echo $datag['nama_kelas'];                                               
                                                ?></td>
                                            </tr>

                                             <tr height="30">
                                                <td></td>
                                                <td></td>
                                            </tr>

                                            <tr height="30">
                                                <td> </td>
                                                <td></td>
                                            </tr>

                                            
                                        </table>
                                    <?php } ?>
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