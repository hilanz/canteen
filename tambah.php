<?php
    session_start();
    require "private/conn.php";

    if(!isset($_SESSION['admin'])){
        header("Location: login.php");
        exit();
    }

    // handle edit form submit
    if(isset($_POST['add'])){
        $nama_makanan = $_POST['nama_makanan'];
        $jenis_makanan = $_POST['jenis_makanan'];
        $harga = $_POST['harga'];

        $query = "INSERT INTO tb_makanan (nama_makanan,jenis_makanan,harga) VALUES ('$nama_makanan','$jenis_makanan','$harga')";
        $result = mysqli_query($conn, $query);
        header("Location: index.php");
    } 

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="css/mdb.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container-xs">
    <div class="form-login">
    <form action="" method="POST">
  <!-- Name input -->
  <div class="form-outline mb-4">
    <textarea type="text" id="form4Example1" class="form-control" name="nama_makanan" rows="4""></textarea>
    <label class="form-label" for="form4Example1">Name Makanan</label>
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="text" id="form4Example2" class="form-control" name="jenis_makanan" "/>
    <label class="form-label" for="form4Example2">Jenis Makanan</label>
  </div>

  <!-- Message input -->
  <div class="form-outline mb-4">
    <input class="form-control" id="form4Example3" name="harga" ">
    <label class="form-label" for="form4Example3" >Harga</label>
  </div>

  <!-- Checkbox -->
  <div class="form-check d-flex justify-content-center mb-4">
    <input class="form-check-input me-2" type="checkbox" id="form4Example4" checked required/>
    <label class="form-check-label" for="form4Example4">
      Setujui untuk menganti!
    </label>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4" name="add">Send</button>
</form>
    </div>
</div>
<script src="js/mdb.min.js"></script>
</body>
</html>