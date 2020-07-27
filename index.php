<?php 
  include 'database.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Halaman Input Data</title>
  </head>
  <link rel="stylesheet" href="index.css">
  <body>
    <h3>SUBMIT YOUR IMAGE HERE</h3>
    <form action="" method="post" enctype="multipart/form-data">
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
        <tr>
          <td>Name</td>
          <td>:</td>
          <td><input type="text" name="nama"/></td>
        </tr>
        <tr>
          <td>File</td>
          <td>:</td>
          <td><input type="file" name="gambar"/></td>
        </tr>
      </table>
        <tr>
          <button id="send-button" type="submit" name="kirim">SEND</button>
        </tr>
    </form>

    <?php
    if(isset($_POST['kirim'])){
      $nama = $_POST['nama'];
      $nama_file = $_FILES['gambar']['name'];
      $source = $_FILES['gambar']['tmp_name'];
      $folder = './galeri/';

      move_uploaded_file($source, $folder.$nama_file);
      $insert = mysqli_query($conn, "INSERT INTO tabel_gambar VALUES (
        NULL,
        '$nama',
        '$nama_file')");

      if($insert){
        echo 'Uploaded Successfully';
      }else{
        echo 'Upload Failed';
      }
    }
    ?> 
  </body>
</html>
