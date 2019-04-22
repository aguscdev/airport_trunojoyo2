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
$sqlmon = "SELECT id FROM mon_avseg ORDER BY id DESC LIMIT 1";
$select = mysqli_query($koneksi, $sqlmon);
$data = mysqli_fetch_assoc($select);
$id = (empty($data)) ? 1 : intval($data['id']) + 1;

if(isset($tanggal))
{

  	
	//input ke monitoring
	//$sqlInsert = "INSERT INTO monitoring values($id, '$tanggal','$myDate','$myDate',$myUser,$myUser,1)";
	//mysqli_query($koneksi, $sqlInsert);

	//avseg
	$sqlelb = "SELECT count(*) as jumlah FROM avseg";
	$selectelb = mysqli_query($koneksi, $sqlelb);
	$dataelb = mysqli_fetch_assoc($selectelb);
	//date
	$tanggal = date('Y-m-d');
	//personil avseg
	$avsegPerso = $_POST['avseg_personil'];
	//teknisi avseg
	$teknisiavseg = $_POST['teknisi_id_avseg'];
	for($b = 0; $b < $dataelb['jumlah']; $b++)
	{
		if(!empty($_POST['avseg_status_'.$b]))
		{
			$avseg = explode(':', $_POST['avseg_status_'.$b]);
			$avseg_ket = $_POST['avseg_keterangan_'.$b];

			mysqli_query($koneksi, "INSERT INTO mon_avseg(id,avseg_id,tanggal,avseg_personil,teknisi_id,avseg_status,avseg_keterangan) values($id, $avseg[0], '$tanggal', $avsegPerso,$teknisiavseg, '$avseg[1]','$avseg_ket')");
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