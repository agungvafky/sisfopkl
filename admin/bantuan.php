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
        header("location:../index.php?pesan=gagal");
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
                    <div class="xcol-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Bantuan</h4>
                                1. dashboar<br>
                                pada halaman ini berisikan chart jumlah dari, siswa, pembimbing, tempat PKL, dan PKL. Pada halaman ini juga berisika tombol navigasi dari semua menu pada sistem ini.<br><br>

                                2. Kelas<br>
                                Halaman ini berisikan data kelas.  pada halaman ini anda dapat menghapus data kelas dengan cara klik tombol hapus pada kolom aksi. Melakukan edit data dengan cara klik tombol edit, cek data kelas dengan menekan tombol cek, dan tombol tambah kelas untuk menambah kelas.<br><br>

                                3. Siswa<br>
                                Halaman ini berisikan data siswa. pada halaman ini anda dapat menghapus data siswa dengan cara klik tombol hapus pada kolom aksi. Melakukan edit data dengan cara klik tombol edit, cek data siswa dengan menekan tombol cek, dan tombol tambah siswa untuk menambah siswa.<br><br>

                                4. Tempat<br>
                                 Halaman ini berisikan data tempat pkl. pada halaman ini anda dapat menghapus data tempat PKL dengan cara klik tombol hapus pada kolom aksi. Melakukan edit data dengan cara klik tombol edit, cek data tempat dengan menekan tombol cek dan tombol tambah tempat PKL untuk menambah tempat PKL.<br><br>

                                5. Pembimbing
                                Halaman ini berisikan data pembimbing pkl. pada halaman ini anda dapat menghapus data pembimbing pkl dengan cara klik tombol hapus pada kolom aksi. Melakukan edit data dengan cara klik tombol edit, cek data pembimbing pkl dengan menekan tombol cek dan tombol tambah pembimbing pkl untuk menambah tempat PKL.<br><br>

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