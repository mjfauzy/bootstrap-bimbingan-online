<?php

include "../koneksi.php";

$user = $_GET['user'];

if($user == "dosen") {
	$nidn = $_GET['nidn'];
	$q_dosen = mysqli_query($connect,"SELECT * FROM tb_dosen WHERE nidn='$nidn'");
	if($q_dosen) {
		if($q_dosen->num_rows > 0) {
			$r_dosen = $q_dosen->fetch_object();
			$nama = $r_dosen->nama;
			$email = $r_dosen->email;
			$username = $nidn;
			$password = md5($nidn);
			$hak_akses = "Dosen";
			$q_user = mysqli_query($connect,"SELECT * FROM tb_user WHERE username='$username'");
			if($q_user) {
				if($q_user->num_rows > 0) {
					$r_user = $q_user->fetch_object();
					$id_user = $r_user->id_user;
					if($q_update = mysqli_query($connect,"UPDATE tb_user SET nama='$nama',password='$password',email='$email',hak_akses='$hak_akses' WHERE id_user='$id_user'")) {
						echo "<script>alert('Berhasil Update Data User');</script>";
						echo "<meta http-equiv='refresh' content='0; url=data-user.php'>";
					} else {
						echo "<script>alert('Gagal Update Data User');</script>";
						echo "<meta http-equiv='refresh' content='0; url=data-user.php'>";
					}
					$q_user->close();
				} else {
					if($q_simpan = mysqli_query($connect,"INSERT INTO tb_user VALUES ('','$nama','$username','$password','$email','$hak_akses')")) {
						echo "<script>alert('Berhasil Simpan Data User');</script>";
						echo "<meta http-equiv='refresh' content='0; url=data-user.php'>";
					} else {
						echo "<script>alert('Gagal Simpan Data User');</script>";
						echo "<meta http-equiv='refresh' content='0; url=data-user.php'>";
					}
				}
			}
		}
	}
} elseif($user == "mahasiswa") {
	$nim = $_GET['nim'];
	$q_mahasiswa = mysqli_query($connect,"SELECT * FROM tb_mahasiswa WHERE nim='$nim'");
	if($q_mahasiswa) {
		if($q_mahasiswa->num_rows > 0) {
			$r_mahasiswa = $q_mahasiswa->fetch_object();
			$nama = $r_mahasiswa->nama;
			$email = $r_mahasiswa->email;
			$username = $nim;
			$password = md5($nim);
			$hak_akses = "Mahasiswa";
			$q_user = mysqli_query($connect,"SELECT * FROM tb_user WHERE username='$username'");
			if($q_user) {
				if($q_user->num_rows > 0) {
					$r_user = $q_user->fetch_object();
					$id_user = $r_user->id_user;
					if($q_update = mysqli_query($connect,"UPDATE tb_user SET nama='$nama',password='$password',email='$email',hak_akses='$hak_akses' WHERE id_user='$id_user'")) {
						echo "<script>alert('Berhasil Update Data User');</script>";
						echo "<meta http-equiv='refresh' content='0; url=data-user.php'>";
					} else {
						echo "<script>alert('Gagal Update Data User');</script>";
						echo "<meta http-equiv='refresh' content='0; url=data-user.php'>";
					}
					$q_user->close();
				} else {
					if($q_simpan = mysqli_query($connect,"INSERT INTO tb_user VALUES ('','$nama','$username','$password','$email','$hak_akses')")) {
						echo "<script>alert('Berhasil Simpan Data User');</script>";
						echo "<meta http-equiv='refresh' content='0; url=data-user.php'>";
					} else {
						echo "<script>alert('Gagal Simpan Data User');</script>";
						echo "<meta http-equiv='refresh' content='0; url=data-user.php'>";
					}
				}
			}
		}
	}
} else {
	echo "<script>alert('User Tidak Dikenali');</script>";
	echo "<meta http-equiv='refresh' content='0; url=data-user.php'>";
}

$connect->close();
exit();

?>