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
$sqlmon = "SELECT id FROM mon_listrik ORDER BY id DESC LIMIT 1";
$select = mysqli_query($koneksi, $sqlmon);
$data = mysqli_fetch_assoc($select);
$id = (empty($data)) ? 1 : intval($data['id']) + 1;

if(isset($tanggal))
{

  	
	//input ke monitoring
	//$sqlInsert = "INSERT INTO monitoring values($id, '$tanggal','$myDate','$myDate',$myUser,$myUser,1)";
	//mysqli_query($koneksi, $sqlInsert);

	//listrik
	$sqlelb = "SELECT count(*) as jumlah FROM listrik";
	$selectelb = mysqli_query($koneksi, $sqlelb);
	$dataelb = mysqli_fetch_assoc($selectelb);
	//date
	$tanggal = date('Y-m-d');
	//personil listrik
	$listrikPerso = $_POST['listrik_personil'];
	//teknisi listrik
	$teknisilistrik = $_POST['teknisi_id_listrik'];
	for($b = 0; $b < $dataelb['jumlah']; $b++)
	{
		if(!empty($_POST['listrik_status_'.$b]))
		{
			$listrik = explode(':', $_POST['listrik_status_'.$b]);
			$listrik_ket = $_POST['listrik_keterangan_'.$b];

			mysqli_query($koneksi, "INSERT INTO mon_listrik(id,listrik_id,tanggal,listrik_personil,teknisi_id,listrik_status,listrik_keterangan) values($id, $listrik[0], '$tanggal', $listrikPerso,$teknisilistrik, '$listrik[1]','$listrik_ket')");
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