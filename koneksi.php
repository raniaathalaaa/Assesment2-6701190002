<?php
	$koneksi = mysqli_connect("localhost", "root", "", "assesment");  


	function query($query) {
		global $koneksi;
		$result = mysqli_query($koneksi, $query);
		$rows =[];
		while ( $row = mysqli_fetch_assoc($result) ) {
			$rows[] = $row;
		}

		return $rows;
	}
	function cari($keyword){
		$query = "SELECT * FROM databook
			WHERE
			Nama_Pemilik LIKE '%$keyword%' OR
			Nama_Anabul LIKE '%$keyword%' OR
			Jenis_Anabul LIKE '%$keyword%' OR
			Usia LIKE '%$keyword%' OR
			Jenis_Pesanan LIKE '%$keyword%' OR
			Alamat LIKE '%$keyword%' 
		";
		return query($query);
	}
	function user($keyword){
		$query = "SELECT * FROM regist
			WHERE
			nama_user LIKE '%$keyword%' OR
			username_user LIKE '%$keyword%' OR
			email_user LIKE '%$keyword%' OR
			photo_user LIKE '%$keyword%' 
		";
		return query($query);
	}
  ?>