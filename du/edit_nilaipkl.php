<!DOCTYPE html>
<html lang="en">
<?php include "koneksi.php"; ?>

<head>
    <!-- Load librari/plugin jquery nya -->
    <script src="js/jquery.min.js" type="text/javascript"></script>
    
    <!-- Load File javascript config.js -->
    <script src="js/config.js" type="text/javascript"></script>
<?php include('partial2/head.php'); ?>

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
                     <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Nilai PKL</h4>
                                <div class="basic-form">
                                    <?php
                                        include "koneksi.php";
                                        $no=$_GET['no'];
                                        $datad = mysqli_query($koneksi,"select * from pkl where no='$no'");
                                        while($data = mysqli_fetch_array($datad)){
                                    ?>
                                    <form method="post" action="" enctype="multipart/form-data">

                                        <input type="hidden" name="no" value="<?php echo $no; ?>">

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nilai PKL</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nilai" value="<?php echo $data['nilai'];?>" required="">
                                            </div>
                                        </div>

                                        
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                
                                                <button type="submit" name="edit_pkl" class="btn mb-1 btn-flat btn-outline-primary"></i>Simpan</button>
                                                <a href="nilaipkl.php">
                                                <button type="button" class="btn mb-1 btn-flat btn-outline-dark"><i class="fa fa-back"></i>kembali</button>
                                                </a>                                                
                                            </div>
                                        </div>
                                    </form>
                                <?php }?>
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
    <?php
    if(isset($_POST['edit_pkl']))
    {
        ////deklarasi variable
       
        $nilai=$_POST['nilai'];
        if($nilai>70){
            $keterangan='Lulus';
        }
        else{
            $keterangan='Gagal';
        }
        
     
       mysqli_query($koneksi,"update pkl set 
        nilai='$nilai',
        keterangan='$keterangan' where no='$no'");

       
        echo"<script> alert('data berhasil di ubah.');</script>";
        echo"<script> window.location='siswa.php';</script>";
       
        
    }
        ?>
    <!--**********************************
        Scripts
    ***********************************-->
    <?php include('partial2/js.php'); ?>
</body>

</html>