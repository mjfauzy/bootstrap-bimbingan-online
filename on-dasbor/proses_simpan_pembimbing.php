<?php

include '../koneksi.php';

$jumlah_data = count($_GET['nim']);
$kode_dospem = $_GET['kode_dospem'];
$nim = $_GET['nim'];
$nip = $_GET['nip'];

$simpan = false;
$update = false;

for($i=0;$i<$jumlah_data;$i++) {
	$cari = mysqli_query($connect, "SELECT * FROM dospem WHERE kode_dospem='$kode_dospem[$i]'");

	if($cari) {
		// simpan atau update data
		if($cari->num_rows > 0) {
			$sql = mysqli_query($connect, "UPDATE dospem SET nim='$nim[$i]',nip='$nip[$i]' WHERE kode_dospem='$kode_dospem[$i]';");
			$update = true;
		} else {
			$update = false;
			$sql = mysqli_query($connect, "INSERT INTO dospem (kode_dospem,nim,nip) VALUES ('$kode_dospem[$i]','$nim[$i]','$nip[$i]');");
			$simpan = true;
		}
	}
}

if($simpan) {
	echo "<script>alert('Berhasil Simpan Data Pembimbing')</script>";
	echo "<meta http-equiv='refresh' content='0; url=data-pembimbing.php'>";
} elseif($update) {
	echo "<script>alert('Berhasil Update Data Pembimbing')</script>";
	echo "<meta http-equiv='refresh' content='0; url=data-pembimbing.php'>";
} else {
	echo "<script>alert('Gagal Simpan Data Pembimbing')</script>";
	echo "<meta http-equiv='refresh' content='0; url=data-pembimbing.php'>";
}

$connect->close();

?>