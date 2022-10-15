  <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">

                     <li>
                        <a href="index.php" aria-expanded="false">
                              <i class="material-icons">home</i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="laporan.php?nis=<?php echo $_SESSION['nis']; ?>" aria-expanded="false">
                             <i class="material-icons">folder</i><span class="nav-text">Laporan</span>
                        </a>
                    </li>

                     <li>
                        <a href="panduan.php" aria-expanded="false">
                              <i class="material-icons">book</i><span class="nav-text">Panduan</span>
                        </a>
                    </li>



                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                             <i class="material-icons">chat</i><span class="nav-text">Pesan</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="pesan.php" aria-expanded="false">Admin</a></li>
                            <li><a href="pesan_pembimbing.php" aria-expanded="false">Pembimbing</a></li>
                           
                            
                        </ul>
                    </li>
                    

                     <li>
                        <a href="bantuan.php" aria-expanded="false">
                             <i class="material-icons">help</i><span class="nav-text">Bantuan</span>
                        </a>
                    </li> 


                 
                </ul>
            </div>
  
      
