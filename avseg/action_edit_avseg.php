<?php
// koneksi database
session_start();
include '../config/koneksi.php';


// menangkap data yang di kirim dari form
$avseg_id = $_POST['avseg_id'];
$avseg_name = $_POST['avseg_name'];
$myDate = date("Y-m-d H:i:s");
$myUserID = $_SESSION["user_id"];


// menginput data ke database
$sql = "UPDATE avseg SET avseg_name='$avseg_name',updated_at='$myDate',updated_by=$myUserID WHERE avseg_id = $avseg_id";
if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil diupdate');
				document.location.href = 'v_avseg.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil diupdate');
				document.location.href = 'v_avseg.php';
		</script>";
}

mysqli_close($koneksi);

?>