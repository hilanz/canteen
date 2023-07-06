<?php
    session_start();
    require "private/conn.php";


    // cek keberhasilan login form
    if(isset($_POST['login'])){
        // tangkap hasil login form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // echo $username . " " . $password;
       $query = "SELECT * FROM tb_admin WHERE username = '$username' AND password = '$password'";
       $result = mysqli_query($conn, $query);

       echo mysqli_num_rows($result);

       if (mysqli_num_rows($result) == 1) {
         $_SESSION['admin'] = $username;
         header("Location: index.php");
         exit();
       }
       else {
         echo "<script>alert('Username and password don't match');</script>";
       }
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/mdb.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<div class="container-xs">
<div class="login-form px-5">
<form action="login.php" method="POST">
    <div class="text-center mb-4">
        <h5>Login Dulu Bre</h5>
    </div>
  <!-- Name input -->
  <div class="form-outline mb-4">
    <input type="text" id="form5Example1" class="form-control" name="username" required/>
    <label class="form-label" for="form5Example1">Username</label>
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="password" id="form5Example2" class="form-control" name="password" required/>
    <label class="form-label" for="form5Example2">Password</label>
  </div>
  

  <!-- Checkbox -->
  <div class="form-check d-flex justify-content-center mb-4">
    <input class="form-check-input me-2" type="checkbox" value="" id="form5Example3" checked required/>
    <label class="form-check-label" for="form5Example3">
      I have read and agree to the terms
    </label>
  </div>
  

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4" name="login">Login</button>
</form>

  <!-- Register -->
  <div class="text-center">
    <p>Belum punya akun? <a href="registrasi.php">Register</a></p>
    <!-- <p>or sign up with:</p>
    <button type="button" class="btn btn-secondary btn-floating mx-1">
      <i class="fab fa-facebook-f"></i>
    </button>

    <button type="button" class="btn btn-secondary btn-floating mx-1">
      <i class="fab fa-google"></i>
    </button>

    <button type="button" class="btn btn-secondary btn-floating mx-1">
      <i class="fab fa-twitter"></i>
    </button>

    <button type="button" class="btn btn-secondary btn-floating mx-1">
      <i class="fab fa-github"></i>
    </button> -->
  </div>
</div>
</div>

<script src="js/mdb.min.js"></script>
</body>
</html>