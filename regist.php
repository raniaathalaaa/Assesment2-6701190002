<!DOCTYPE html>
<html>
<head>
	<title>Registrasi</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
	<div class="container vh-100">
		<div class="row justify-content-center h-100">
			<div class="card w-25 my-auto shadow">
				<div class="card-header text-center bg-primary text-white">
					<h2>REGIST</h2>
				</div>
				<div class="card-body">
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label for="nim">NIM</label>
							<input type="text" id="nim" class="form-control" name="nim" />
						</div>
						<div class="form-group">
							<label for="nama">NAMA</label>
							<input type="text" id="nama" class="form-control" name="nama" />
						</div>
						<div class="form-group">
							<label for="kelas">KELAS</label>
							<input type="text" id="kelas" class="form-control" name="kelas" />
						</div>
						<div class="form-group">
							<label for="email">EMAIL</label>
							<input type="email" id="email" class="form-control" name="email" />
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" id="password" class="form-control" name="password" />
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" id="conpassword" class="form-control" name="conpassword" />
						</div>
						<div class="form-group">
							<label for="file">Photo</label>
							<input type="file" id="conpassword" class="form-control" name="foto" />
						</div>
						<input type="submit" class="btn btn-primary w-100" value="SUBMIT" name="submit">
						<a class="btn btn-primary w-100" data-toggle="collapse" href="login.php" role="button" aria-expanded="false" aria-controls="collapseExample" style="margin-top: 10px">LOGIN</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

<?php
include 'koneksi.php';
session_start();
if(isset($_POST["submit"])){
	if($_POST["nim"] !== "" && ["nama"] !== "" && ["kelas"] !== "" && $_POST["email"] !== "" && $_POST["password"] !== "" && $_POST["conpassword"] !== ""){

		if(isset(explode("@",$_POST["email"])[1])){
			if(strtolower(explode("@",$_POST["email"])[1]) !== "gmail.com"){
				echo "<script> alert('Harus menggunakan email Gmail *gmail.com') </script>";
				die(0);
			}
		} else{
			echo "<script> alert('Harus menggunakan email Gmail *gmail.com') </script>";
			die(0);
		}

		if($_POST["password"] !== $_POST["conpassword"]){
			echo "<script> alert('Password yang anda masukkan tidak cocok') </script>";
			die(0);
		}
		$nim = $koneksi->real_escape_string($_POST["nim"]);
		$nama = $koneksi->real_escape_string($_POST["nama"]);
		$kelas = $koneksi->real_escape_string($_POST["kelas"]);
		$email = $koneksi->real_escape_string($_POST["email"]);
		$password = $koneksi->real_escape_string(($_POST["password"]));


		$target_dir		= "image/"; 
		$file_name		= basename($_FILES["foto"]["name"]);
		$target_file	= $target_dir . $file_name;
		$imageFileType	= strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		if (move_uploaded_file($_FILES["foto"]["tmp_name"],$target_file)) {

		$koneksi->query("INSERT INTO regist SET nim='$nim', nama='$nama', kelas='$kelas', email='$email', password='$password', photo_user='$target_file';");
		}
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		echo "<script> alert('Berhasl Regist') </script>";
	}

}
?>
</html>