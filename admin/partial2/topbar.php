<div class="nav-header">
            <div class="brand-logo">
                <a href="home.php">
                    <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img src="../images/logol2.png" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            topbar start
        ***********************************-->
        <div class="header">
<div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                
                <div class="header-right">
                    <ul class="clearfix">

                         <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-email-outline"></i>
                                <?php
                                      include "koneksi.php";
                                    
                                      $datad1 = mysqli_query($koneksi,"select count(nis) as jumlah from pesan where baca2='1' ");
                                        while($data1 = mysqli_fetch_array($datad1)){
                                      $jumlah=$data1['jumlah'];
                                      }
                                      ?> 
                                <span class="badge badge-pill gradient-1"><?php echo $jumlah; ?></span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class=""><?php echo $jumlah; ?> pesan Baru</span>  
                                    <a href="javascript:void()" class="d-inline-block">
                                        <span class="badge badge-pill gradient-1"><?php echo $jumlah; ?> </span>
                                    </a>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                    <?php
                                       include "koneksi.php";

                                      $datad2 = mysqli_query($koneksi,"select * from pesan join siswa on pesan.nis=siswa.nis where baca2='1' ");
                                        while($data2 = mysqli_fetch_array($datad2)){
                                      
                                      ?>    

                                        <li class="notification-unread">
                                            <a href="lihat_pesan.php?nis=<?php echo $data2['nis'];?>">
                                                <img class="float-left mr-3 avatar-img" src="../tempat/<?php echo $data2['foto'];?>" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading"><?php echo $data2['nama'];?></div>
                                                   
                                                    <div class="notification-text"><?php echo $data2['chat'];?></div>
                                                </div>
                                            </a>
                                        </li>
                                    <?php } ?>
                                       
                                    </ul>
                                    
                                </div>
                            </div>
                        </li>
                        
                         <li class="icons dropdown d-none d-md-flex">
                      <?php echo  $_SESSION['nama']; ?>
                        </li>

                        
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span></span>
                               <img class="img-profile rounded-circle" src="../tempat/<?php echo  $_SESSION['foto']; ?>">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="editprofil.php?id_admin=<?php echo $_SESSION['id_admin']; ?>"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        
                                        <li><a href="logout.php"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>