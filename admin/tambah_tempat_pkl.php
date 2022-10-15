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
                                <div class="basic-form">
                                    <form method="post" action="" enctype="multipart/form-data">

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">ID Tempat</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="id_tempat" class="form-control" placeholder="ID Tempat" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Tempat</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama_tempat" placeholder="Nama Tempat" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Alamat</label>
                                             <div class="col-sm-10">
                                                <textarea class="form-control h-150px" rows="4" id="comment" name="alamat"></textarea>
                                            </div>
                                        </div>
                                       

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Link Map</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="map" placeholder="Link map" required="">
                                            </div>
                                        </div>

                                           <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="password" placeholder="Password" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Foto</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="foto" placeholder="Link map">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                
                                                <button type="submit" name="simpan_tempat" class="btn mb-1 btn-flat btn-outline-primary"></i>Simpan</button>
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
    if(isset($_POST['simpan_tempat']))
    {
        ////deklarasi variable
        $id_tempat=$_POST['id_tempat'];
        $nama_tempat=$_POST['nama_tempat'];
        $alamat=$_POST['alamat'];
        $map=$_POST['map'];
        $foto=$_FILES['foto']['name'];
        $password=md5($_POST['password']);
      
        //seleksi data dari data base
        $cekdata = mysqli_query($koneksi,"select * from tempat where id_tempat='$id_tempat'");
        // menghitung jumlah data yang ditemukan
        $cek = mysqli_num_rows($cekdata);
        // cek apakah username dan password di temukan pada database
        if($cek > 0){
        echo"<script>alert('data dengan ID ini sudah ada!');</script>";
        }
        else
        {
        mysqli_query($koneksi,"insert into tempat values
            ('$id_tempat',
            '$nama_tempat',
            '$foto',
            '$alamat',
            '$map',
            '$password')");
        move_uploaded_file($_FILES['foto']['tmp_name'], "../tempat/".$_FILES['foto']['name']);
        echo"<script>alert('data berhasil disimpan');
        </script>";
        echo"<script>window.location='tambah_tempat_pkl.php'</script>";
        }
    }
        ?>
    <!--**********************************
        Scripts
    ***********************************-->
    <?php include('partial2/js.php'); ?>
</body>

</html>