<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "db_kantin";

    $conn = mysqli_connect($host,$username,$password,$database);

    if (mysqli_connect_errno()) {
        echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
        exit();
    }

    

?>