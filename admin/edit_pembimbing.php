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
                                <h4 class="card-title">Edit Pembimbing</h4>
                                 <?php
                                        include "koneksi.php";
                                       $nip=$_GET['nip'];
                                        $datad = mysqli_query($koneksi,"select * from pembimbing where nip='$nip'");
                                        while($data = mysqli_fetch_array($datad)){
                                    ?>
                                <div class="basic-form">
                                    <form method="post" action="" enctype="multipart/form-data">

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">NIP</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="nip" class="form-control" value="<?php echo $nip ?>" readonly="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Pembimbing</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama_p" value="<?php echo $data['nama_p'];?>" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="tempat_lahir_p" value="<?php echo $data['tempat_lahir_p'];?>" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="tanggal_lahir_p" value="<?php echo $data['tanggal_lahir_p'];?>"required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="jenis_kelamin_p">
                                                        <option><?php echo $data['jenis_kelamin_p'];?></option>
                                                        <option>Laki-laki</option>
                                                        <option>Perempuan</option>
                                                </select>
                                            
                                            </div>
                                        </div>

                                      

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">No HP</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="no_hp" value="<?php echo $data['no_hp'];?>" required="">
                                            </div>
                                        </div>

                                          <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="password" placeholder="Password" >
                                                <input type="hidden" class="form-control" name="oldpassword" value="<?php echo $data['pasword_p'];?>" >
                                            </div>
                                        </div>

                                           
                                         <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Foto</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="foto" >
                                                <input type="hidden" class="form-control" name="oldfoto" value="<?php echo $data['foto'];?>">
                                            </div>
                                        </div>

                                    <?php } ?>

                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                
                                                <button type="submit" name="edit_pembimbing" class="btn mb-1 btn-flat btn-outline-primary"></i>Simpan</button>
                                                <a href="pembimbing.php">
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
    if(isset($_POST['edit_pembimbing']))
    {
        ////deklarasi variable
       
        $nama_p=$_POST['nama_p'];
        $id_tempat=$_POST['id_tempat'];
        $jenis_kelamin_p=$_POST['jenis_kelamin_p'];
         if (!empty($_FILES['foto']['name']))
        {
           $foto=$_FILES['foto']['name'];
        }
        else
        {
            $foto=$_POST['oldfoto'];
        }
        $tempat_lahir_p=$_POST['tempat_lahir_p'];
        $tanggal_lahir_p=$_POST['tanggal_lahir_p'];
        $no_hp=$_POST['no_hp'];
         if (!empty($_POST['password']))
          {
            $password=md5($_POST['password']);
          }
        else
         {
          $password=$_POST['oldpassword'];
         }
        
      

       //koding edit
        mysqli_query($koneksi,"update pembimbing set 
        nama_p='$nama_p',
        jenis_kelamin_p='$jenis_kelamin_p',
        foto='$foto',
        tempat_lahir_p='$tempat_lahir_p',
        tanggal_lahir_p='$tanggal_lahir_p',
        pasword_p='$password',
        no_hp='$no_hp' where nip='$nip'");


        move_uploaded_file($_FILES['foto']['tmp_name'], "../tempat/".$_FILES['foto']['name']);
        echo"<script>alert('data berhasil diubah');
        </script>";
        echo"<script>window.location='pembimbing.php'</script>";
        
    }
        ?>
    <!--**********************************
        Scripts
    ***********************************-->
    <?php include('partial2/js.php'); ?>
</body>

</html>