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
$sqlmon = "SELECT id FROM mon_elband ORDER BY id DESC LIMIT 1";
$select = mysqli_query($koneksi, $sqlmon);
$data = mysqli_fetch_assoc($select);
$id = (empty($data)) ? 1 : intval($data['id']) + 1;

if(isset($tanggal))
{

  	
	//input ke monitoring
	//$sqlInsert = "INSERT INTO monitoring values($id, '$tanggal','$myDate','$myDate',$myUser,$myUser,1)";
	//mysqli_query($koneksi, $sqlInsert);

	//elband
	$sqlelb = "SELECT count(*) as jumlah FROM elband";
	$selectelb = mysqli_query($koneksi, $sqlelb);
	$dataelb = mysqli_fetch_assoc($selectelb);
	//date
	$tanggal = date('Y-m-d');
	//personil elband
	$elbandPerso = $_POST['elband_personil'];
	//teknisi elband
	$teknisiElband = $_POST['teknisi_id_elband'];
	for($b = 0; $b < $dataelb['jumlah']; $b++)
	{
		if(!empty($_POST['elband_status_'.$b]))
		{
			$elband = explode(':', $_POST['elband_status_'.$b]);
			$elband_ket = $_POST['elband_keterangan_'.$b];

			mysqli_query($koneksi, "INSERT INTO mon_elband(id,elband_id,tanggal,elband_personil,teknisi_id,elband_status,elband_keterangan) values($id, $elband[0], '$tanggal', $elbandPerso,$teknisiElband, '$elband[1]','$elband_ket')");
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