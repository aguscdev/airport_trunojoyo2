<?php
// koneksi database
session_start();
include '../config/koneksi.php';
 
// menangkap data yang di kirim dari form
$tanggal = $_POST['tanggal'];
$myDate = date('Y-m-d H:i:s');
$myUser = $_SESSION['user_id'];
// echo date('Y-m-d',$tanggal);
// echo $teknisi;

//Generate monitoring id
$sqlmon = "SELECT id FROM mon_amc ORDER BY id DESC LIMIT 1";
$select = mysqli_query($koneksi, $sqlmon);
$data = mysqli_fetch_assoc($select);
$id = (empty($data)) ? 1 : intval($data['id']) + 1;

if(isset($tanggal))
{

  	
	//input ke monitoring
	//$sqlInsert = "INSERT INTO monitoring values($id, '$tanggal','$myDate','$myDate',$myUser,$myUser,1)";
	//mysqli_query($koneksi, $sqlInsert);

	//amc
	$sqlelb = "SELECT count(*) as jumlah FROM amc";
	$selectelb = mysqli_query($koneksi, $sqlelb);
	$dataelb = mysqli_fetch_assoc($selectelb);
	//date
	$tanggal = date('Y-m-d');
	//personil amc
	$amcPerso = $_POST['amc_personil'];
	//teknisi amc
	$teknisiamc = $_POST['teknisi_id_amc'];
	for($b = 0; $b < $dataelb['jumlah']; $b++)
	{
		if(!empty($_POST['amc_status_'.$b]))
		{
			$amc = explode(':', $_POST['amc_status_'.$b]);
			$amc_ket = $_POST['amc_keterangan_'.$b];

			mysqli_query($koneksi, "INSERT INTO mon_amc(id,amc_id,tanggal,amc_personil,teknisi_id,amc_status,amc_keterangan) values($id, $amc[0], '$tanggal', $amcPerso,$teknisiamc, '$amc[1]','$amc_ket')");
		}
	}

	echo "<script>
				alert('data berhasil disimpan');
				document.location.href = 'v_add_monitoring.php';
		</script>";
	
	// echo "sukses "."<br/>";
	// echo ($tanggal);	
}
?>