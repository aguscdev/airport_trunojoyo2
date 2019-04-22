<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Trunojoyo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">BANDAR UDARA TRUNOJOYO</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="admin/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
      </div>
    </nav>
  
    <div class="container">

      <h3>MONITORING KESIAPAN PERALATAN OPERASIONAL PENERBANGAN</h3>
    
      <div class="panel panel-default">
        <div class="panel-heading">AVSEG</div>
        <div class="panel-body">
          <?php
            include 'config/koneksi.php';
            $sqlid = mysqli_query($koneksi, "SELECT id FROM mon_avseg order by id DESC LIMIT 1") ;
            $dataid = mysqli_fetch_assoc($sqlid);
            $genID = (empty($dataid)) ? 0 : $dataid['id'];
          ?>        
          <h5>
          <?php
              $data = mysqli_query($koneksi, "SELECT DISTINCT t.teknisi_name FROM mon_avseg as me inner join teknisi as t on 
                t.teknisi_id = me.teknisi_id 
                where me.id = $genID");
              $d = mysqli_fetch_assoc($data);
            ?>
            Teknisi : <a href="#"><?php echo $d['teknisi_name'] ;?></a>
          </h5>
          <h5>
            <?php
              $data = mysqli_query($koneksi, "SELECT DISTINCT avseg_personil FROM mon_avseg where id = $genID");
              $d = mysqli_fetch_assoc($data);
            ?>
            Personil standby : <a href="#"><?php echo $d['avseg_personil'] ;?></a>
          </h5>
          <!-- ./col -->
          <div class="col-md-6 col-xs-7">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h4>
                  <?php
                  $data = mysqli_query($koneksi, "select count(avseg_id) as el_mon from mon_avseg where avseg_status = 'unserviceable' and id = $genID") ;
                  $d = mysqli_fetch_assoc($data);
                  echo $d['el_mon'] ;
                  ?>
                  UNSERVICEABLE
                </h4>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
          <div class="col-md-6 col-xs-7">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h4>
                  <?php
                  $data = mysqli_query($koneksi, "select count(avseg_id) as el_mon from mon_avseg 
                    where avseg_status = 'serviceable' and id = $genID") ;
                  $d = mysqli_fetch_assoc($data);
                  echo $d['el_mon'] ;
                  ?>
                  SERVICEABLE
                </h4>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <a href="dashboard/v_dashboard_avseg.php" class="small-box-footer">
              Info lebih lanjut <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">Peralatan Elektronika Bandar Udara Trunojoyo</div>
        <div class="panel-body">
          <?php
            include 'config/koneksi.php';
            $sqlid = mysqli_query($koneksi, "SELECT id FROM mon_elband order by id DESC LIMIT 1") ;
            $dataid = mysqli_fetch_assoc($sqlid);
            $genID = (empty($dataid)) ? 0 : $dataid['id'];
          ?>        
          <h5>
          <?php
              $data = mysqli_query($koneksi, "SELECT DISTINCT t.teknisi_name FROM mon_elband as me inner join teknisi as t on 
                t.teknisi_id = me.teknisi_id 
                where me.id = $genID");
              $d = mysqli_fetch_assoc($data);
            ?>
            Teknisi : <a href="#"><?php echo $d['teknisi_name'] ;?></a>
          </h5>
          <h5>
            <?php
              $data = mysqli_query($koneksi, "SELECT DISTINCT elband_personil FROM mon_elband where id = $genID");
              $d = mysqli_fetch_assoc($data);
            ?>
            Personil standby : <a href="#"><?php echo $d['elband_personil'] ;?></a>
          </h5>
          <!-- ./col -->
          <div class="col-md-6 col-xs-7">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h4>
                  <?php
                  $data = mysqli_query($koneksi, "select count(elband_id) as el_mon from mon_elband where elband_status = 'unserviceable' and id = $genID") ;
                  $d = mysqli_fetch_assoc($data);
                  echo $d['el_mon'] ;
                  ?>
                  UNSERVICEABLE
                </h4>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
          <div class="col-md-6 col-xs-7">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h4>
                  <?php
                  $data = mysqli_query($koneksi, "select count(elband_id) as el_mon from mon_elband 
                    where elband_status = 'serviceable' and id = $genID") ;
                  $d = mysqli_fetch_assoc($data);
                  echo $d['el_mon'] ;
                  ?>
                  SERVICEABLE
                </h4>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <a href="dashboard/v_dashboard_elband.php" class="small-box-footer">
              Info lebih lanjut <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">Peralatan Listrik Bandar Udara Trunojoyo</div>
        <div class="panel-body">
          <?php
            include 'config/koneksi.php';
            $sqlid = mysqli_query($koneksi, "SELECT id FROM mon_listrik order by id DESC LIMIT 1") ;
            $dataid = mysqli_fetch_assoc($sqlid);
            $genID = (empty($dataid)) ? 0 : $dataid['id'];
          ?>        
          <h5>
          <?php
              $data = mysqli_query($koneksi, "SELECT DISTINCT t.teknisi_name FROM mon_listrik as me inner join teknisi as t on 
                t.teknisi_id = me.teknisi_id 
                where me.id = $genID");
              $d = mysqli_fetch_assoc($data);
            ?>
            Teknisi : <a href="#"><?php echo $d['teknisi_name'] ;?></a>
          </h5>
          <h5>
            <?php
              $data = mysqli_query($koneksi, "SELECT DISTINCT listrik_personil FROM mon_listrik where id = $genID");
              $d = mysqli_fetch_assoc($data);
            ?>
            Personil standby : <a href="#"><?php echo $d['listrik_personil'] ;?></a>
          </h5>
          <!-- ./col -->
          <div class="col-md-6 col-xs-7">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h4>
                  <?php
                  $data = mysqli_query($koneksi, "select count(listrik_id) as el_mon from mon_listrik where listrik_status = 'unserviceable' and id = $genID") ;
                  $d = mysqli_fetch_assoc($data);
                  echo $d['el_mon'] ;
                  ?>
                  UNSERVICEABLE
                </h4>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
          <div class="col-md-6 col-xs-7">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h4>
                  <?php
                  $data = mysqli_query($koneksi, "select count(listrik_id) as el_mon from mon_listrik 
                    where listrik_status = 'serviceable' and id = $genID") ;
                  $d = mysqli_fetch_assoc($data);
                  echo $d['el_mon'] ;
                  ?>
                  SERVICEABLE
                </h4>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <a href="dashboard/v_dashboard_listrik.php" class="small-box-footer">
              Info lebih lanjut <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">Sisi Udara Bangunan dan Landasan Bandar Udara Trunojoyo</div>
        <div class="panel-body">
          <?php
            include 'config/koneksi.php';
            $sqlid = mysqli_query($koneksi, "SELECT id FROM mon_bangland order by id DESC LIMIT 1") ;
            $dataid = mysqli_fetch_assoc($sqlid);
            $genID = (empty($dataid)) ? 0 : $dataid['id'];
          ?>        
          <h5>
          <?php
              $data = mysqli_query($koneksi, "SELECT DISTINCT t.teknisi_name FROM mon_bangland as me inner join teknisi as t on 
                t.teknisi_id = me.teknisi_id 
                where me.id = $genID");
              $d = mysqli_fetch_assoc($data);
            ?>
            Teknisi : <a href="#"><?php echo $d['teknisi_name'] ;?></a>
          </h5>
          <h5>
            <?php
              $data = mysqli_query($koneksi, "SELECT DISTINCT bangland_personil FROM mon_bangland where id = $genID");
              $d = mysqli_fetch_assoc($data);
            ?>
            Personil standby : <a href="#"><?php echo $d['bangland_personil'] ;?></a>
          </h5>
          <!-- ./col -->
          <div class="col-md-6 col-xs-7">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h4>
                  <?php
                  $data = mysqli_query($koneksi, "select count(bangland_id) as el_mon from mon_bangland where bangland_status = 'unserviceable' and id = $genID") ;
                  $d = mysqli_fetch_assoc($data);
                  echo $d['el_mon'] ;
                  ?>
                  UNSERVICEABLE
                </h4>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
          <div class="col-md-6 col-xs-7">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h4>
                  <?php
                  $data = mysqli_query($koneksi, "select count(bangland_id) as el_mon from mon_bangland 
                    where bangland_status = 'serviceable' and id = $genID") ;
                  $d = mysqli_fetch_assoc($data);
                  echo $d['el_mon'] ;
                  ?>
                  SERVICEABLE
                </h4>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <a href="dashboard/v_dashboard_bangland.php" class="small-box-footer">
              Info lebih lanjut <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">Fasilitas Kendaraan PKP-PK Bandar Udara Trunojoyo</div>
        <div class="panel-body">
          <?php
            include 'config/koneksi.php';
            $sqlid = mysqli_query($koneksi, "SELECT id FROM mon_pkppk order by id DESC LIMIT 1") ;
            $dataid = mysqli_fetch_assoc($sqlid);
            $genID = (empty($dataid)) ? 0 : $dataid['id'];
          ?>        
          <h5>
          <?php
              $data = mysqli_query($koneksi, "SELECT DISTINCT t.teknisi_name FROM mon_pkppk as me inner join teknisi as t on 
                t.teknisi_id = me.teknisi_id 
                where me.id = $genID");
              $d = mysqli_fetch_assoc($data);
            ?>
            Teknisi : <a href="#"><?php echo $d['teknisi_name'] ;?></a>
          </h5>
          <h5>
            <?php
              $data = mysqli_query($koneksi, "SELECT DISTINCT pkppk_personil FROM mon_pkppk where id = $genID");
              $d = mysqli_fetch_assoc($data);
            ?>
            Personil standby : <a href="#"><?php echo $d['pkppk_personil'] ;?></a>
          </h5>
          <!-- ./col -->
          <div class="col-md-6 col-xs-7">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h4>
                  <?php
                  $data = mysqli_query($koneksi, "select count(pkppk_id) as el_mon from mon_pkppk where pkppk_status = 'unserviceable' and id = $genID") ;
                  $d = mysqli_fetch_assoc($data);
                  echo $d['el_mon'] ;
                  ?>
                  UNSERVICEABLE
                </h4>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
          <div class="col-md-6 col-xs-7">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h4>
                  <?php
                  $data = mysqli_query($koneksi, "select count(pkppk_id) as el_mon from mon_pkppk 
                    where pkppk_status = 'serviceable' and id = $genID") ;
                  $d = mysqli_fetch_assoc($data);
                  echo $d['el_mon'] ;
                  ?>
                  SERVICEABLE
                </h4>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <a href="dashboard/v_dashboard_pkppk.php" class="small-box-footer">
              Info lebih lanjut <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">AMC Bandar Udara Trunojoyo</div>
          <div class="panel-body">
          <?php
            include 'config/koneksi.php';
            $sqlid = mysqli_query($koneksi, "SELECT id FROM mon_amc order by id DESC LIMIT 1") ;
            $dataid = mysqli_fetch_assoc($sqlid);
            $genID = (empty($dataid)) ? 0 : $dataid['id'];
          ?>        
          <h5>
          <?php
              $data = mysqli_query($koneksi, "SELECT DISTINCT t.teknisi_name FROM mon_amc as me inner join teknisi as t on 
                t.teknisi_id = me.teknisi_id 
                where me.id = $genID");
              $d = mysqli_fetch_assoc($data);
            ?>
            Teknisi : <a href="#"><?php echo $d['teknisi_name'] ;?></a>
          </h5>
          <h5>
            <?php
              $data = mysqli_query($koneksi, "SELECT DISTINCT amc_personil FROM mon_amc where id = $genID");
              $d = mysqli_fetch_assoc($data);
            ?>
            Personil standby : <a href="#"><?php echo $d['amc_personil'] ;?></a>
          </h5>
          <!-- ./col -->
          <div class="col-md-6 col-xs-7">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h4>
                  <?php
                  $data = mysqli_query($koneksi, "select count(amc_id) as el_mon from mon_amc where amc_status = 'unserviceable' and id = $genID") ;
                  $d = mysqli_fetch_assoc($data);
                  echo $d['el_mon'] ;
                  ?>
                  UNSERVICEABLE
                </h4>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
          <div class="col-md-6 col-xs-7">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h4>
                  <?php
                  $data = mysqli_query($koneksi, "select count(amc_id) as el_mon from mon_amc 
                    where amc_status = 'serviceable' and id = $genID") ;
                  $d = mysqli_fetch_assoc($data);
                  echo $d['el_mon'] ;
                  ?>
                  SERVICEABLE
                </h4>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <a href="dashboard/v_dashboard_amc.php" class="small-box-footer">
              Info lebih lanjut <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

                  <!-- </tbody>
                  </table> -->
      </div>
    </div>

  </body>
</html>
