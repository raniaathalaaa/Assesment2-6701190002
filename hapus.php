
 <?php 
include "koneksi.php";
$hapus = mysqli_query($koneksi, "DELETE FROM nilai WHERE semester ='$_GET[semester]'");

if ($hapus) {
	header('location: read.php');
}else{
	echo "Gagal menghapus data";
}
 ?>