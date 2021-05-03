<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
	<div class="container vh-100">
		<div class="row justify-content-center h-100">
			<div class="card w-25 my-auto shadow">
				<div class="card-header text-center bg-primary text-white">
					<h2>LOGIN</h2>
				</div>
				<div class="card-body">
					<form action="" method="POST">
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" id="email" class="form-control" name="email" />
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" id="password" class="form-control" name="password" />
						</div>
						<input type="submit" class="btn btn-primary w-100" value="LOGIN" name="log">
						<a class="btn btn-primary w-100" data-toggle="collapse" href="regist.php" role="button" aria-expanded="false" aria-controls="collapseExample" style="margin-top: 10px">REGIST</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<?php 
include 'Koneksi.php';
	if (isset($_POST['log'])) {
		$email = $_POST['email'];
		$password = ($_POST['password']);

		$sql = "SELECT * FROM regist WHERE email=LOWER('$email') AND password='$password';";
		$result = $koneksi->query($sql);
		$row = $result->fetch_assoc();
		if (!empty($row)) {
			$_SESSION['email']=$email;
			echo "<script> location= 'about.html'; </script>";
		} else{
			echo "<script> alert('email atau Password salah/Kosong') </script>";
		}
?>

<?php } 