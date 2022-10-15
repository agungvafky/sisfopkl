<!DOCTYPE html>
<html lang="en">
<?php include "koneksi.php" ?>
<head>
<?php include('partial2/head.php'); ?>
<script type="text/javascript" src="../chartjs/Chart.js"></script>
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

            <div class="container-fluid mt-3">
                <div class="row">

                    <div class=row>
                    <div class="col-lg-7">
                      <marquee>
                        <?php
                         function tgl_indo($tanggal){
                                          $bulan = array (
                                            1 =>   'Januari',
                                            'Februari',
                                            'Maret',
                                            'April',
                                            'Mei',
                                            'Juni',
                                            'Juli',
                                            'Agustus',
                                            'September',
                                            'Oktober',
                                            'November',
                                            'Desember'
                                          );
                                          $pecahkan = explode('-', $tanggal);
                                          
                                          // variabel pecahkan 0 = tanggal
                                          // variabel pecahkan 1 = bulan
                                          // variabel pecahkan 2 = tahun
                                         
                                          return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
                                        }
                          $datadp = mysqli_query($koneksi,"select * from pengumuman");
                          while($datap = mysqli_fetch_array($datadp)){       
                        ?>
                       Jadwal PKL keluar pada tanggal <?php echo tgl_indo($datap['isi']);?>
                     <?php } ?>
                      </marquee>

                        <div class="card">

                                    <?php
                                        include "koneksi.php";
                                        $nis=$_SESSION['nis'];
                                        $datad = mysqli_query($koneksi,"select * from pkl join siswa on pkl.nis=siswa.nis join pembimbing on pkl.nip=pembimbing.nip join tempat on pkl.id_tempat=tempat.id_tempat join kelas on siswa.id_kelas=kelas.id_kelas where pkl.nis='$nis'");
                                        while($data = mysqli_fetch_array($datad)){
                                    ?>
                            <div class="card-body">
                                <h4 class="card-title">Selamat Datang di Halaman Siswa</h4>
                                <div class="button-icon">
                                  <table width="100%" height="250" align="center" border="0">
                                      <tr>
                                        <td align="right" width="50%"> 
                                         <b>nis</b>  
                                        </td>
                                        <td>
                                            &nbsp;<?php echo $nis; ?> 
                                        </td>
                                      </tr>
                                      <tr>
                                        <td align="right"> 
                                           <b>Nama Lengkap</b>  
                                        </td>
                                        <td>
                                           &nbsp; <?php echo $data['nama']; ?>
                                        </td>
                                        
                                        <tr>
                                        
                                          <td align="right"> 
                                         <b>Jenis Kelamin</b>  
                                        </td>
                                          <td>
                                           &nbsp; <?php echo $data['jenis_kelamin']; ?> 
                                          </td>
                                      </tr>

                                       <tr>
                                        <td align="right"> 
                                         <b>TTL</b>  
                                        </td>
                                          <td>
                                           &nbsp; <?php echo $data['tempat_lahir']; ?>, <?php echo $data['ttl']; ?>
                                          </td>
                                      </tr>

                                       <tr>
                                        <td align="right"> 
                                         <b>Kelas</b>  
                                        </td>
                                          <td>
                                           &nbsp; <?php echo $data['nama_kelas']; ?> 
                                          </td>
                                      </tr>

                                       <tr>
                                        <td align="right"> 
                                         <b>Lokasi PKL</b>  
                                        </td>
                                          <td>
                                           &nbsp; <?php echo $data['nama_tempat']; ?><a href="<?php echo $data['map'];?>" target="_blank"> <i class="fa fa-map-marker"> </i></a>
                                          </td>
                                      </tr>

                                      <tr>
                                        <td align="right"> 
                                         <b>Pembimbing</b>  
                                        </td>
                                          <td>
                                           &nbsp; <?php echo $data['nama_p']; ?><a href="lihat_pembimbing.php?nip=<?php echo $data['nip']; ?>" > <i class="fa fa-search">
                                          </td>
                                      </tr> 

                                       <tr>
                                        <td align="right"> 
                                         <b>Laporan</b>  
                                        </td>
                                          <td>
                                           &nbsp;  <?php 
                                                  $file=$data['file'];
                                                  

                                                    if($file=="kosong") {
                                                        
                                                      ?>
                                                      : data belum ada
                                                  <?php } 
                                                  else{
                                                      ?>
                                                  
                                                    : <a href="../tempat/<?php echo $data['file'];?>" target="_blank"><i class="fa fa-file"> </i></a>
                                                <?php } ?>  
                                          </td>
                                      </tr>  


                                                                          
                                    
                                  </table>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                

               
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Sekilas Tentang Sistem Informasi PKL (SisfoPKL)</h4>
                                <div class="button-icon">
                                     <ol type="A">
                                     <li>1. SisfoPKL adalah sistem informasi yang dimaksudkan untuk membantu terselenggaranya proses PKL yang lancar, bermutu, otomatis, dan komputerized</li>
                                      <li>2. SisfoPKL dimaksudkan sebagai media penyampaian informasi terkait dengan informasi PKL siswa secara efektif dan efisien</li>
                                      <li>3. SisfoPKL sebagai media penyimpanan data PKL siswa</li>
                                      <li>SisfoPKL berisikan data-data kelas, siswa, tempat PKL, Pembimbing PKL, dan data PKL</li>
                                      <li>4. Sisfo PKL dimaksudkan untuk siswa agar lebih mudah mendapatkan informasi mengenai PKL</li>      
                                         </ol>       
                  
                                </div>                 
                          
                            </div>
                        </div>
                    </div>
                </div>
                

                </div>
                 
            </div>

        
    </div>
      <div class="footer">      
        <?php include('partial2/footer.php'); ?>
        </div>
    </div>



                   
    </script>
    <?php include('partial2/js.php'); ?>
      <script src="../plugins/chart.js/Chart.bundle.min.js"></script>
    <script src="../js/plugins-init/chartjs-init.js"></script>
     <script src="../plugins/raphael/raphael.min.js"></script>

    

    <script src="../plugins/morris/morris.min.js"></script>
    <script src="../js/plugins-init/morris-init.js"></script>

</body>

</html>