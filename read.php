<?php 
   require 'koneksi.php';
   $adm = query("SELECT * FROM nilai");
   if(isset($_POST["cari"]) ){
   	$adm = cari($_POST["keyword"]);
   }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
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
	      			<a class="nav-link" href="nilai.php">INPUT IPK</a>
	      		</li>   
	      		<li class="nav-item">
	      			<a class="nav-link" href="read.php">VIEW IPK</a>
	      		</li>  
	      		<li class="nav-item">
	        		<a class="nav-link" href="logout.php">LOGOUT</a>
	      		</li>  
	    	</ul>
	  	</div>
	</nav>
</body>
</html>

<div class="container p-5">
	<h1>INDEKS PRESTASI AKADEMIK </h1>
	<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		<li class="nav-item">
			<a class="nav-link" href="nilai.php">Tambah Data</a>
		</li>
	</ul>

	<table class="table table-sm">
	<tr>
		<th>SEMESTER</th>
		<th>IPK</th>
		<th>AKSI</th>
	</tr>
		<?php foreach( $adm as $row ): ?>
		<tr>
			<td><?= $row["semester"]; ?></td>
			<td><?= $row["ipk"]; ?></td>

			<td>
				<a href="update.php?semester=<?php echo $row ['semester'] ?>">EDIT</a>
				<a href="hapus.php?semester=<?php echo $row ['semester'] ?>" > DELETE</a>
			</td>
		</tr>
		<?php endforeach; ?>

	</table>
	<br>
</div>