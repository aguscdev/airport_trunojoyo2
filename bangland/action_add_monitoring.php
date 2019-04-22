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
$sqlmon = "SELECT id FROM mon_bangland ORDER BY id DESC LIMIT 1";
$select = mysqli_query($koneksi, $sqlmon);
$data = mysqli_fetch_assoc($select);
$id = (empty($data)) ? 1 : intval($data['id']) + 1;

if(isset($tanggal))
{

  	
	//input ke monitoring
	//$sqlInsert = "INSERT INTO monitoring values($id, '$tanggal','$myDate','$myDate',$myUser,$myUser,1)";
	//mysqli_query($koneksi, $sqlInsert);

	//bangland
	$sqlelb = "SELECT count(*) as jumlah FROM bangland";
	$selectelb = mysqli_query($koneksi, $sqlelb);
	$dataelb = mysqli_fetch_assoc($selectelb);
	//date
	$tanggal = date('Y-m-d');
	//personil bangland
	$banglandPerso = $_POST['bangland_personil'];
	//teknisi bangland
	$teknisibangland = $_POST['teknisi_id_bangland'];
	for($b = 0; $b < $dataelb['jumlah']; $b++)
	{
		if(!empty($_POST['bangland_status_'.$b]))
		{
			$bangland = explode(':', $_POST['bangland_status_'.$b]);
			$bangland_ket = $_POST['bangland_keterangan_'.$b];

			mysqli_query($koneksi, "INSERT INTO mon_bangland(id,bangland_id,tanggal,bangland_personil,teknisi_id,bangland_status,bangland_keterangan) values($id, $bangland[0], '$tanggal', $banglandPerso,$teknisibangland, '$bangland[1]','$bangland_ket')");
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