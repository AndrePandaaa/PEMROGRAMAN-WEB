<?php 
	include 'database.php';
	$delete = mysqli_query($conn, "DELETE FROM tabel_gambar WHERE id_gambar = '".$_GET['id']."'");
	if($delete){
		header('location:data.php');
	}else{
		echo 'Gagal Menghapus';
	}
?>