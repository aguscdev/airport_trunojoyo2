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
$sqlmon = "SELECT id FROM mon_pkppk ORDER BY id DESC LIMIT 1";
$select = mysqli_query($koneksi, $sqlmon);
$data = mysqli_fetch_assoc($select);
$id = (empty($data)) ? 1 : intval($data['id']) + 1;

if(isset($tanggal))
{

  	
	//input ke monitoring
	//$sqlInsert = "INSERT INTO monitoring values($id, '$tanggal','$myDate','$myDate',$myUser,$myUser,1)";
	//mysqli_query($koneksi, $sqlInsert);

	//pkppk
	$sqlelb = "SELECT count(*) as jumlah FROM pkppk";
	$selectelb = mysqli_query($koneksi, $sqlelb);
	$dataelb = mysqli_fetch_assoc($selectelb);
	//date
	$tanggal = date('Y-m-d');
	//personil pkppk
	$pkppkPerso = $_POST['pkppk_personil'];
	//teknisi pkppk
	$teknisipkppk = $_POST['teknisi_id_pkppk'];
	for($b = 0; $b < $dataelb['jumlah']; $b++)
	{
		if(!empty($_POST['pkppk_status_'.$b]))
		{
			$pkppk = explode(':', $_POST['pkppk_status_'.$b]);
			$pkppk_ket = $_POST['pkppk_keterangan_'.$b];

			mysqli_query($koneksi, "INSERT INTO mon_pkppk(id,pkppk_id,tanggal,pkppk_personil,teknisi_id,pkppk_status,pkppk_keterangan) values($id, $pkppk[0], '$tanggal', $pkppkPerso,$teknisipkppk, '$pkppk[1]','$pkppk_ket')");
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