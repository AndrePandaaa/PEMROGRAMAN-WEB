<?php 
	include 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Data</title>
</head>
<link rel="stylesheet" href="data.css">
<body>
	<h1>RECESS</h1>
	<h5>THE BEST & LATEST WALLPAPER PROVIDER WEBSITE</h5>
	<div class="all">
      <div class="menu">
        <ul class="menu">
          <li class="menu"><a class="menu" href="data.php">HOME</a></li>
          <li class="menu"><a class="menu" href="index.php">SUBMIT</a></li>
          <li class="menu"><a class="menu" href="about.html">ABOUT</a></li>
        </ul>
      </div>
    </div>
	<table>
		<?php 
		$query = mysqli_query($conn, "SELECT * FROM tabel_gambar");
		while($row = mysqli_fetch_array($query)){
		?>
		<tr>
			<td><img src="galeri/<?php echo $row['file'] ?>" width="400px" height="400px"></td>
			<td><?php echo $row['nama'] ?></td>
			<td>
				<a href="edit.php?id=<?php echo $row['id_gambar'] ?>"><button id="edit-button">EDIT</button></a>	|
				<a href="hapus.php?id=<?php echo $row['id_gambar'] ?>"><button id="edit-button">DELETE</button></a>
			</td>
		</tr>
	<?php } ?>
	</table>
</body>
</html>	