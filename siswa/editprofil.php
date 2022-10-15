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
                                <h4 class="card-title">Edit Data Siswa</h4>
                                <div class="basic-form">

                                     <?php
                                        include "koneksi.php";
                                       $nis=$_GET['nis'];
                                        $datad = mysqli_query($koneksi,"select * from siswa where nis='$nis'");
                                        while($data = mysqli_fetch_array($datad)){
                                    ?>
                                    <form method="post" action="" enctype="multipart/form-data">

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">NIS</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="nis" class="form-control" placeholder="NIS" value="<?php echo $nis ?>" readonly="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Siswa</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama_siswa" value="<?php echo $data['nama'];?>" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $data['tempat_lahir'];?>" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="ttl" value="<?php echo $data['ttl'];?>" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="jenis_kelamin">
                                                        <option><?php echo $data['jenis_kelamin'];?></option>
                                                        <option>Laki-laki</option>
                                                        <option>Perempuan</option>
                                                </select>
                                            
                                            </div>
                                        </div>

                                        


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="password" placeholder="Password" >
                                                <input type="hidden" class="form-control" name="oldpassword" value="<?php echo $data['password'];?>" >
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
                                                
                                                <button type="submit" name="simpan_siswa" class="btn mb-1 btn-flat btn-outline-primary"></i>Simpan</button>
                                                <a href="siswa.php">
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
    if(isset($_POST['simpan_siswa']))
    {
        ////deklarasi variable
        $nis=$_POST['nis'];
        $nama_siswa=$_POST['nama_siswa'];
        $id_kelas=$_POST['id_kelas'];
        $jenis_kelamin=$_POST['jenis_kelamin'];
        if (!empty($_POST['password']))
          {
            $password=md5($_POST['password']);
          }
        else
         {
          $password=$_POST['oldpassword'];
         }
        
        $ttl=$_POST['ttl'];
        $tempat_lahir=$_POST['tempat_lahir'];
    
        if (!empty($_FILES['foto']['name']))
        {
           $foto=$_FILES['foto']['name'];
        }
        else
        {
            $foto=$_POST['oldfoto'];
        }
    

         //koding edit
        mysqli_query($koneksi,"update siswa set 
        nama='$nama_siswa',
        jenis_kelamin='$jenis_kelamin',
        foto='$foto',
        password='$password',
        ttl='$ttl',
        tempat_lahir='$tempat_lahir' where nis='$nis'");


        move_uploaded_file($_FILES['foto']['tmp_name'], "../tempat/".$_FILES['foto']['name']);
        echo"<script>alert('data berhasil diubah');
        </script>";
        echo"<script>window.location='index.php'</script>";
        
    }
        ?>
    <!--**********************************
        Scripts
    ***********************************-->
    <?php include('partial2/js.php'); ?>
</body>

</html>