<!doctype html>
<html class="no-js" lang="en">
    <?php include 'page/page_head.php'; ?>
    <body>
        <div id="wrapper">
            <?php include 'page/page_topbar.php'; ?>
            <?php include 'page/page_header.php'; ?>
            <div id="masthead">
                <div class="container">
                    <div class="masthead-pad">
                        <div class="masthead-text">
                            <h2>Daftar Berita Terbaru</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div id="content">
                <div class="container-fluid">
                    <div class="row">
                        <div id="content">
                            <div class="container">
                                <div class="row">
                                    <div class="span3 bs-docs-sidebar">
                                        <ul class="nav nav-list bs-docs-sidenav">

                                          <li><h3 class="sidebar_kiri">Berita Terbaru</h3></li>
                                          <li><hr></li>
                                          <?php
                                            $query = mysqli_query($koneksi,"SELECT * FROM informasi WHERE status='1' AND kategori='Berita Terbaru' ORDER BY id DESC LIMIT 5");
                                              while ($dataartikel = mysqli_fetch_array($query)) {

                                              $id = base64_encode($dataartikel['id']);
                                          ?>
                                          <li><a href="informasi_read.php?id=<?php echo $id; ?>"><i class="icon-chevron-right"></i> <?php echo $dataartikel['judul']; ?></a></li>
                                          <?php
                                              }

                                          ?>
                                        </ul>
                                        <br>
                                        <br>
                                        <ul class="nav nav-list bs-docs-sidenav">
                                          <li><h3 class="sidebar_kiri">Agenda</h3></li>
                                          <li><hr></li>
                                          <?php
                                            $query = mysqli_query($koneksi,"SELECT * FROM informasi WHERE status='1' AND kategori='Agenda' ORDER BY id DESC LIMIT 5");
                                              while ($dataartikel = mysqli_fetch_array($query)) {
                                                $id = base64_encode($dataartikel['id']);
                                          ?>
                                          <li><a href="informasi_read.php?id=<?php echo $id; ?>"><i class="icon-chevron-right"></i> <?php echo $dataartikel['judul']; ?></a></li>
                                          <?php
                                              }

                                          ?>
                                        </ul>
                                        <br>
                                        <br>
                                        <ul class="nav nav-list bs-docs-sidenav">
                                          <li><h3 class="sidebar_kiri">Pengumuman</h3></li>
                                          <li><hr></li>
                                          <?php
                                            $query = mysqli_query($koneksi,"SELECT * FROM informasi WHERE status='1' AND kategori='Pengumuman' ORDER BY id DESC LIMIT 5");
                                              while ($dataartikel = mysqli_fetch_array($query)) {
                                                $id = base64_encode($dataartikel['id']);
                                          ?>
                                          <li><a href="informasi_read.php?id=<?php echo $id; ?>"><i class="icon-chevron-right"></i> <?php echo $dataartikel['judul']; ?></a></li>
                                          <?php
                                              }

                                          ?>
                                        </ul>
                                    </div>
                                    <div class="span9"> 

                                        <?php
                                           include 'page/page_config.php';

                                            if ((isset($_POST['submit'])) and ($_POST['cari']<>"")){
                                            $cari        = $_POST['cari'];
                                            $berdasarkan = $_POST['berdasarkan'];
                                           
                                           $dataPerPage = 5;

                                            if(isset($_GET['page'])){
                                              $noPage = $_GET['page'];
                                            }else 
                                              $noPage = 1;
                                              $offset = ($noPage - 1) * $dataPerPage;
                                              $query  = "SELECT * FROM informasi WHERE kategori='Berita Terbaru' AND status='1' AND $berdasarkan LIKE '%$cari%' ORDER BY id DESC LIMIT $offset, $dataPerPage";
                                              $result = mysqli_query($query) or die('Error');
                                        ?>

                                        <!-- ===============================bagian isi berita========================================= -->

                                        <?php
                                          while($data = mysqli_fetch_array($result))
                                          {

                                            $id      = base64_encode($data['id']);
                                        ?>  

                                        <div class="well">
                                          <ul class="media-list">
                                              <li class="media">
                                                  <a class="pull-left" href="#">
                                                  <img class="img-thumbnail" width="64" height="64" src="project_gis/<?php echo $data['gambar']; ?>" alt="<?php echo $data['judul']; ?>">
                                                  </a>
                                                  <div class="media-body">
                                                      <h5 class="media-heading">
                                                          <a href="informasi_read.php?&id=<?php echo $id; ?>"><?php echo $data['judul']; ?></a><br>
                                                          <span class="comment-date"><small><?php echo $data['date']; ?></small></span>
                                                      </h5>
                                                      <div style=" border-bottom: dashed #000 1px; margin-bottom:9px;"></div>
                                                      <p>
                                                          <?php 
                                                              $isi=$data['isi'];
                                                                 echo substr($isi,0,200);
                                                          ?>
                                                      </p>
                                                  </div>
                                              </li>
                                          </ul>
                                        </div>

                                        <?php
                                           }
                                           }
                                        ?>


                                        <!-- =================================bagian isi berita==================================== -->
                                        <center>
                                          <?php
                                            $query  = "SELECT COUNT(*) AS jumData FROM informasi";
                                            $hasil  = mysqli_query($query);
                                            $data   = mysqli_fetch_array($hasil);

                                            $jumData = $data['jumData'];
                                            $jumPage = ceil($jumData/$dataPerPage);

                                              echo "<div class='pagination'>";
                                              echo "<ul>";
                                              if ($noPage > 1) echo  "<li><a href='".$_SERVER['PHP_SELF']."?page=".base64_encode('informasi_detail.php')."&page=".$page."'><< Prev</a></li>";
                                                for($page = 1; $page <= $jumPage; $page++)
                                                {
                                                  if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage))
                                                    {
                                                      if (($showPage == 1) && ($page != 2))  echo "<li class='disabled'><a href='#'>...</a></li>";
                                                      if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "<li class='disabled'><a href='#'>...</a></li>";
                                                      if ($page == $noPage) echo "<li class='active'><a href='#'>".$page."</a></li>";
                                                      else echo "<li><a href='".$_SERVER['PHP_SELF']."?page=".base64_encode('informasi_detail.php')."&page=".$page."'>".$page."</a></li>";
                                                      $showPage = $page;
                                                    }
                                                }

                                                if ($noPage < $jumPage) echo "<li><a href='".$_SERVER['PHP_SELF']."?page=".base64_encode('informasi_detail.php')."&page=".$page."'>Next >></a></li>";

                                                echo "</ul>"; echo "</div>";  ?>
                                        </center>

                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'page/page_foo.php'; ?>
        <?php include 'page/page_footer.php'; ?>
    </body>
</html>