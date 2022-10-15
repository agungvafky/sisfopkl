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
                                <h4 class="card-title">Tambah Siswa</h4>
                                
                                <div class="basic-form">
                                    <form method="post" action="" enctype="multipart/form-data">

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">NIS</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="nis" class="form-control" placeholder="NIS" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Siswa</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama_siswa" placeholder="Nama Siswa" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="ttl" placeholder="Nama Siswa" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="jenis_kelamin">
                                                        <option disabled="" selected="">--Pilih disini--</option>
                                                        <option>Laki-laki</option>
                                                        <option>Perempuan</option>
                                                </select>
                                            
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kelas</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="id_kelas">
                                                        <option disabled="" selected="">--Pilih disini--</option>
                                                        <?php
                                                        $datad = mysqli_query($koneksi,"select * from kelas");
                                                        while($data = mysqli_fetch_array($datad))
                                                         { ?>
                                                        <option value="<?php echo $data['id_kelas'];?>"><?php echo $data['nama_kelas'];?></option>
                                                        <?php } ?>
                                                </select>
                                            
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
                                                <input type="file" class="form-control" name="foto" >
                                            </div>
                                        </div>

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
        $foto=$_FILES['foto']['name'];
        $password=md5($_POST['password']);
        $ttl=$_POST['ttl'];
        $tempat_lahir=$_POST['tempat_lahir'];
        
     
      
      

        //seleksi data dari data base
        $cekdata = mysqli_query($koneksi,"select * from siswa where nis='$nis'");
        // menghitung jumlah data yang ditemukan
        $cek = mysqli_num_rows($cekdata);
        // cek apakah username dan password di temukan pada database
        if($cek > 0){
        echo"<script>alert('data dengan nis ini sudah ada!');</script>";
        }
        else
        {
        mysqli_query($koneksi,"insert into siswa values
            ('$nis',
            '$nama_siswa',
            '$id_kelas',
            '$jenis_kelamin',
            '$foto',
            '$password',
            '$ttl',
            '$tempat_lahir',
            '',
            '')");
        move_uploaded_file($_FILES['foto']['tmp_name'], "../tempat/".$_FILES['foto']['name']);
        echo"<script>alert('data berhasil disimpan');
        </script>";
        echo"<script>window.location='tambah_siswa.php'</script>";
        }
    }
        ?>
    <!--**********************************
        Scripts
    ***********************************-->
    <?php include('partial2/js.php'); ?>
</body>

</html>