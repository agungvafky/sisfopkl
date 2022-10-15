<!DOCTYPE html>
<html lang="en">

<head>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Penilaian PKL</h4>
                                
                                    <p align="right">

                                         <a href="laporannilaipkl.php" >
                                            <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-file"> </i>Laporan</button>
                                        </a>
                                        
                                    
                                    </p>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIS</th>
                                                <th>Nama Siswa</th>
                                                <th>Nilai</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                   
                                        <tbody>
                                    <?php
                                        $id_tempat=$_SESSION['id_tempat'];
                                      include "koneksi.php";
                                      $no=1;
                                      $datad = mysqli_query($koneksi,"select * from pkl join siswa on pkl.nis=siswa.nis join pembimbing on pkl.nip=pembimbing.nip join tempat on pkl.id_tempat=tempat.id_tempat where pkl.id_tempat='$id_tempat'");
                                        while($data = mysqli_fetch_array($datad)){
                                      
                                      ?>
                                            <tr>
                                                <td width="10%"><?php echo $no;?></td>
                                                
                                                <td><?php echo $data['nis'];?></td>
                                                <td><?php echo $data['nama'];?></td>
                                                <td width="120"><?php echo $data['nilai'];?></td>
                                                <td width="120"><?php echo $data['keterangan'];?></td>
                                                                                               
                                                <td width="200">                               

                                                    <a href="lihat_pkl.php?no=<?php echo $data['no']; ?>">  
                                                        <button type="button" class="btn mb-1 btn-flat btn-outline-primary"><i class="fa fa-search"></i></button>
                                                    </a>   
                                                    <a href="edit_nilaipkl.php?no=<?php echo $data['no']; ?>">  
                                                        <button type="button" class="btn mb-1 btn-flat btn-outline-success"><i class="fa fa-edit"></i></button>
                                                    </a>                                                     
                                                    
                                                </td>
                                            </tr>
                                             <?php $no++; } ?>
                                        </tbody>
                                    
                                    </table>
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