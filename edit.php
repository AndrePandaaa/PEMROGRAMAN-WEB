<?php 
  include 'database.php';

  $data = mysqli_query($conn,"SELECT * FROM tabel_gambar WHERE id_gambar = '".$_GET['id']."'");
  $r = mysqli_fetch_array($data);

  $nama = $r['nama'];
  $file = $r['file'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Halaman Edit Data</title>
  </head>
<link rel="stylesheet" href="edit.css">
  <body>
    <h3>EDIT YOUR IMAGE HERE</h3>
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
          <td>NAME</td>
          <td>:</td>
          <td><input type="text" name="nama" value="<?php echo $nama?>"/></td>
        </tr>
        <tr>
          <td>FILE</td>
          <td>:</td>
          <td>
            <input type="hidden" name="img" value="<?php echo $file ?>">
            <input type="file" name="gambar"/></td>
        </tr>
      </table>
          <a href="data.php"><button id="update-button" type="submit" name="kirim">UPDATE</button></a>
    </form>
    <?php
    if(isset($_POST['kirim'])){
      $nama = $_POST['nama'];
      $nama_file = $_FILES['gambar']['name'];
      $source = $_FILES['gambar']['tmp_name'];
      $folder = './galeri/';

      if($nama_file != ''){
        move_uploaded_file($source, $folder.$nama_file);
        $update = mysqli_query($conn, "UPDATE tabel_gambar SET
          nama = '".$nama."',
          file = '".$nama_file."'
          WHERE id_gambar = '".$_GET['id']."'
          ");
        if($update){
          echo 'Uploaded Successfully';
        }else{
          echo 'Upload Failed';
        }
      }else{
        $update = mysqli_query($conn, "UPDATE tabel_gambar SET
          nama = '".$nama."'
          WHERE id_gambar = '".$_GET['id']."' 
          ");
        if($update){
          echo 'Update Successfully';
          header('location:data.php');
        }else{
          echo 'Update Failed';
        }
      }
    }
    ?> 
  </body>
</html>
