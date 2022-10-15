<!DOCTYPE html>
<html lang="en">
<?php include "koneksi.php"; ?>

<head>
<?php include('partial2/head.php'); ?>
</head>

<body>
    <?php 
    session_start();
 
    // cek apakah yang mengakses halaman ini sudah login
    if($_SESSION['nis']==""){
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
                                <h4 class="card-title">pesan</h4>
                                <div class="basic-form">
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        
                                   
                                        <tbody>
                                        <tr>
                                                
                                    <?php
                                      include "koneksi.php";
                                       $nis=$_SESSION['nis'];

                                       mysqli_query($koneksi,"update pesan set baca='0' where nis='$nis'");
                                      $datad = mysqli_query($koneksi,"select * from pesan where nis='$nis'");
                                        while($data = mysqli_fetch_array($datad)){
                                      
                                      ?>    

                                                <td width="10%"><?php 
                                                $id_admin=$data['id_admin'];
                                                if ($id_admin==1)
                                                {
                                                   echo "admin";
                                                }
                                                else
                                                {
                                                    echo "";
                                                }
                                                ?>
                                                    
                                                </td>
                                                <td align="
                                                <?php 
                                                $id_admin=$data['id_admin'];
                                                if ($id_admin==1)
                                                {
                                                   echo "left";
                                                }
                                                else
                                                {
                                                    echo "right";
                                                }
                                                ?>
                                                ">
                                                <?php echo $data['chat'];?></td>
                                                
                                            </tr>
                                             <?php  } ?>
                                             <tr>
                                                 <td></td>
                                                 <td align="right">
                                                    <form method="post" action="" enctype="multipart/form-data">

                                                    <div class="form-group row">
                                                        
                                                        <div class="col-sm-11">
                                                            <input type="text" name="chat" class="form-control" placeholder="Pesan" required="">
                                                        </div>
                                                    </div>

                                                    
                                                  
                                                <button type="submit" name="simpan_kelas" class="btn mb-1 btn-flat btn-outline-primary"></i>Kirim</button>

                                                
                                                  </form>                                              
                                            
                                                </td>
                                             </tr>
                                        </tbody>
                                   
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
    <?php
    if(isset($_POST['simpan_kelas']))
    {
        $id_admin=0;
        $waktu=date('y-m-d h:i:s');
        $chat=$_POST['chat'];
        $baca=0;
        $baca2=1;
        
        mysqli_query($koneksi,"update siswa set chat='1' where nis='$nis'");
       
        mysqli_query($koneksi,"insert into pesan values
            ('',
            '$id_admin',
            '$nis',
            '$chat',
            '$waktu',
            '$baca',
            '$baca2')");
        echo"<script>alert('pesan terkirim');
        </script>";
       
        echo"<script>window.location='pesan.php'</script>";
        
    }
        ?>
    <!--**********************************
        Scripts
    ***********************************-->
    <?php include('partial2/js.php'); ?>
</body>

</html>