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
    if($_SESSION['nip']==""){
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
                                       $nip=$_GET['nip'];
                                       $nis=$_GET['nis'];
                                        mysqli_query($koneksi,"update pesanpem set baca2='0' where nis='$nis' and nip='$nip' ");
                                      $datad = mysqli_query($koneksi,"select * from pesanpem where nis='$nis' and nip='$nip' ");
                                        while($data = mysqli_fetch_array($datad)){
                                      
                                      ?>    

                                                <td width="50%"><?php 
                                                $pes=$data['pes'];
                                                if ($pes==1)
                                                {
                                                   echo "pembimbing";
                                                }
                                                else
                                                {
                                                    echo "";
                                                }
                                                ?>
                                                    
                                                </td>
                                                <td  align="
                                                <?php 
                                                $pes=$data['pes'];
                                                if ($pes==1)
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
                                                 <td align="left" colspan="2">
                                                    <form method="post" action="" enctype="multipart/form-data">

                                                    <div class="form-group row">
                                                        
                                                        <div class="col-sm-10">
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

                                    <a href="pesan.php">
                                                <button type="button" class="btn mb-1 btn-flat btn-outline-dark"><i class="fa fa-back"></i>kembali</button>
                                                </a>

                                     

                                        
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
        $pes=1;
        $waktu=date('y-m-d h:i:s');
        $chat=$_POST['chat'];
        $baca=1;
        $baca2=0;
        
               //seleksi data dari data base
       
        mysqli_query($koneksi,"insert into pesanpem values
            ('',
            '$nip',
            '$nis',
            '$chat',
            '$waktu',
            '$baca',
            '$baca2',
            '$pes')");
        echo"<script>alert('pesan terkirim');
        </script>";
       
        echo"<script>window.location='lihat_pesan.php?nis=$nis&&nip=$nip'</script>";
        
    }
        ?>
    <!--**********************************
        Scripts
    ***********************************-->
    <?php include('partial2/js.php'); ?>
</body>

</html>