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
                     <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tambah Tempat PKL</h4>

                                    <?php
                                        include "koneksi.php";
                                       $id_tempat=$_GET['id_tempat'];
                                        $datad = mysqli_query($koneksi,"select * from tempat where id_tempat='$id_tempat'");
                                        while($data = mysqli_fetch_array($datad)){
                                    ?>
                                <div class="basic-form">
                                    <form method="post" action="" enctype="multipart/form-data">

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">ID Tempat</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="id_tempat" class="form-control" value="<?php echo $id_tempat ?>" readonly="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Tempat</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama_tempat" value="<?php echo $data['nama_tempat'];?>" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Alamat</label>
                                             <div class="col-sm-10">
                                                <textarea class="form-control h-150px" rows="4" id="comment" name="alamat"><?php echo $data['alamat'];?></textarea>
                                            </div>
                                        </div>
                                       

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Link Map</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="map" value="<?php echo $data['map'];?>" required="">
                                            </div>
                                        </div>

                                          <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="password" placeholder="Password" >
                                                <input type="hidden" class="form-control" name="oldpassword" value="<?php echo $data['password_tempat'];?>" >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Foto</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="foto"  >
                                                <input type="hidden" class="form-control" name="oldfoto" value="<?php echo $data['foto'];?>" required="">
                                            </div>
                                        </div>

                                    <?php } ?>

                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                
                                                <button type="submit" name="edit_tempat" class="btn mb-1 btn-flat btn-outline-primary"></i>Simpan</button>
                                                <a href="tempat.php">
                                                <button type="button" class="btn mb-1 btn-flat btn-outline-dark"><i class="fa fa-back"></i>kembali</button>
                                                </a>                                                
                                            </div>
                                        </div>
                                    </form>
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
    if(isset($_POST['edit_tempat']))
    {
        ////deklarasi variable
      
        $nama_tempat=$_POST['nama_tempat'];
        $alamat=$_POST['alamat'];
        $map=$_POST['map'];
        
        if (!empty($_FILES['foto']['name']))
        {
           $foto=$_FILES['foto']['name'];
        }
        else
        {
            $foto=$_POST['oldfoto'];
        }

         if (!empty($_POST['password']))
          {
            $password=md5($_POST['password']);
          }
        else
         {
          $password=$_POST['oldpassword'];
         }
    

         //koding edit
        mysqli_query($koneksi,"update tempat set 
        nama_tempat='$nama_tempat',
        alamat='$alamat',
        foto='$foto',
        map='$map',
        password_tempat='$password' where id_tempat='$id_tempat'");


        move_uploaded_file($_FILES['foto']['tmp_name'], "../tempat/".$_FILES['foto']['name']);
        echo"<script>alert('data berhasil diubah');
        </script>";
        echo"<script>window.location='tempat.php'</script>";
        
    }
        ?>
    <!--**********************************
        Scripts
    ***********************************-->
    <?php include('partial2/js.php'); ?>
</body>

</html>