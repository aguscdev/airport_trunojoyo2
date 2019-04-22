<!DOCTYPE html>
<html lang="en">
<head>
  <title>BANDAR UDARA TRUNOJOYO</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">BANDAR UDARA TRUNOJOYO</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../admin/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
    <?php
        include '../config/koneksi.php';
        $sqlID = mysqli_query($koneksi, "SELECT id FROM mon_avseg order by id DESC LIMIT 1") ;
        $dataID = mysqli_fetch_assoc($sqlID);
        $id = (empty($dataID)) ? 0 : $dataID['id'];
    ?>
    <h3>MONITORING KESIAPAN PERALATAN OPERASIONAL PENERBANGAN </h3>
    <div class="panel panel-default">
      <div class="panel-heading">AVSEG Bandar Udara Trunojoyo</div>
      <div class="panel-body">
        <h5>
          <?php
              $data = mysqli_query($koneksi, "SELECT DISTINCT t.teknisi_name FROM mon_avseg as me inner join teknisi as t on 
                t.teknisi_id = me.teknisi_id 
                where me.id = $id");
              $d = mysqli_fetch_assoc($data);
            ?>
            Teknisi : <a href="#"><?php echo $d['teknisi_name'] ;?></a>
          </h5>
          <h5>
            <?php
              $data = mysqli_query($koneksi, "SELECT DISTINCT avseg_personil FROM mon_avseg where id = $id");
              $d = mysqli_fetch_assoc($data);
            ?>
            Personil standby : <a href="#"><?php echo $d['avseg_personil'] ;?></a>
          </h5>
        <table id="dtUser" class="table table-bordered">
          <tbody>
            <?php 
            $sql = "select e.avseg_name,me.avseg_status,me.avseg_keterangan from mon_avseg as me inner join avseg as e ON e.avseg_id = me.avseg_id where me.id = $id";
            $data = mysqli_query($koneksi,$sql);
            while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
              <td width="50%"><?php echo $d['avseg_name']; ?></td>
              <td width="20%">
                <?php if($d['avseg_status'] == 'serviceable'){ ?>
                  <button class="btn btn-success"><?php echo $d['avseg_status']; ?></button>
                <?php }else{ ?>
                  <button class="btn btn-danger"><?php echo $d['avseg_status']; ?></button>
                <?php }; ?>
              </td>
              <td width="30%"><center><?php echo $d['avseg_keterangan']; ?></center></td>
            </tr>
            <?php 
            }
            ?>

          </tbody>
        </table>
      </div>
    </div>
    <a href="../index.php" class="small-box-footer"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
  </body>
</html>
