<?php
// koneksi database
session_start();
include '../config/koneksi.php';
 
// menangkap data yang di kirim dari form
$avseg_name = $_POST['avseg_name'];
$myDate = date("Y-m-d H:i:s");
$myUserID = $_SESSION["user_id"];
$isactive = 1;

//generated avseg id
$sqlID = "SELECT avseg_id FROM avseg ORDER BY avseg_id DESC LIMIT 1";
$select = mysqli_query($koneksi, $sqlID);
$data = mysqli_fetch_assoc($select);
$myID = $data['avseg_id'] + 1;
 
// menginput data ke database
$sql = "INSERT INTO avseg values($myID,'$avseg_name','$myDate','$myDate',$myUserID,$myUserID,$isactive)";
if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil disimpan');
				document.location.href = 'v_avseg.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil disimpan');
				document.location.href = 'v_avseg.php';
		</script>";
}

mysqli_close($koneksi);
?>