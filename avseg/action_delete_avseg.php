<?php

// koneksi database
session_start();
include '../config/koneksi.php';

$avseg_id = $_GET['avseg_id'];
$myDate = date("Y-m-d H:i:s");
$myUserID = $_SESSION["user_id"];


// menginput data ke database
$sql = "UPDATE avseg SET is_active = 0,updated_at='$myDate',updated_by=$myUserID WHERE avseg_id = $avseg_id";
if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil dihapus');
				document.location.href = 'v_avseg.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil dihapus');
				document.location.href = 'v_avseg.php';
		</script>";
}

mysqli_close($koneksi);

?>