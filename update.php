<?php 
include "koneksi.php";
$sqlEdit = mysqli_query($koneksi, "SELECT * FROM nilai WHERE semester='$_GET[semester]'");
$e=mysqli_fetch_array($sqlEdit);
?>
<!DOCTYPE html>
<html>
<head>
	<title>EDIT</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
<div>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a class="navbar-brand" href="#" >ASSESMENT 2 PABW</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
	  	</button>
	  	<div class="collapse navbar-collapse" id="collapsibleNavbar">
	  		<ul class="navbar-nav">
	      		<li class="nav-item">
	        		<a class="nav-link" href="about.html">ABOUT</a>
	      		</li>
	      		<li class="nav-item">
	      			<a class="nav-link" href="nilai.php">IPK</a>
	      		</li>   
	      		<li class="nav-item">
	        		<a class="nav-link" href="logout.php">LOGOUT</a>
	      		</li>  
	    	</ul>
	  	</div>
	</nav>
</div>
<br>
<div class="row justify-content-center h-100">
	<div class="card w-25 my-auto shadow">
		<div class="card-header text-center bg-primary text-white">
			<h2>INDEKS PRESTASI AKADEMIK</h2>
		</div>
		<div class="card-body">
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="semester" value="<?php echo $e['semester']; ?>">SEMESTER</label>
					<br>
					<select class="form-group" name="semester" style="width: 270px">
						<option value="<?php echo $e['semester']; ?>"><?php echo $e['semester']; ?></option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
					</select>
				</div>
				<div class="form-group">
					<label for="ipk">INDEKS PRESTASI AKADEMIK</label>
					<input type="text" id="ipk" class="form-control" name="ipk" value="<?php echo $e['ipk']; ?>">
				</div>
					<input type="submit" class="btn btn-primary w-100" value="SIMPAN" name="submit">
				</form>
			</div>
		</div>
	</div>
</body>
</html>

<?php
if ($_SERVER ['REQUEST_METHOD']=='POST') {
	$update = mysqli_query($koneksi, "UPDATE nilai SET ipk='$_POST[ipk]' WHERE semester='$_POST[semester]'");
	if ($update) {
		header('location:read.php');
	}
	else{
		echo "Gagal Mengupdate Data";
	}
}
 ?>
</html>
