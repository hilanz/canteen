<?php
    session_start();
    require "private/conn.php";

    if(!isset($_SESSION['admin'])){
        header("Location: login.php");
        exit();
    }

    $query = "SELECT * FROM tb_makanan";
    $result = mysqli_query($conn, $query);

    $admin = $_SESSION['admin'];

    $no = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kantin Dark Web</title>
    <link rel="stylesheet" href="css/mdb.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container">

    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarButtonsExample"
      aria-controls="navbarButtonsExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Dashboard</a>
        </li>
      </ul>
      <!-- Left links -->

      <div class="d-flex align-items-center">
      <div class="container-fluid">
    <form class="d-flex input-group w-auto">
      <input
        type="search"
        class="form-control rounded"
        placeholder="Cari kesini banh..."
        aria-label="Search"
        aria-describedby="search-addon"
      />
      <span class="input-group-text border-0" id="search-addon">
        <i class="fas fa-search"></i>
      </span>
    </form>
  </div>
        <button type="button" class="btn btn-danger me-3"><a href="logout.php" class="text-white">Logout</a></button>
        <a
          class="btn btn-dark px-3"
          href="https://github.com/hilanz/canteen"
          role="button"
          ><i class="fab fa-github"></i
        ></a>
      </div>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->






<table class="table align-middle mb-0 bg-white container">
  <div class="d-flex gap-3 container mt-5">
  <button type="button" class="btn btn-success"><a href="tambah.php" class="text-white">Tambah</a></button>

  </div>
  <thead class="bg-light text-center">
    <tr>
      <th>No</th>
      <th>Name</th>
      <th>Jenis Makanan</th>
      <th>Harga</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody class="text-center">
    <?php while($row = mysqli_fetch_assoc($result)) {?>
        <tr>
        <td>
            <h6><?=$no++?></h6>
        </td>
      <td>
        <div class="d-flex align-items-center justify-content-center">
          <div class="ms-3">
            <h6 class="fw-normal mb-1"><?=$row['nama_makanan']?></h6>
          </div>
        </div>
      </td>
      <td>
        <span class="badge <?= $row['jenis_makanan'] === 'Makanan' ? 'badge-danger' : 'badge-primary' ?> rounded-pill d-inline"><?=$row['jenis_makanan']?></span>
      </td>
      <td>
        <h6><?=$row['harga']?></h6>
      </td>
      <td>
        <button type="button d-flex gap-2" class="btn btn-link btn-sm btn-rounded">
            <i class="fa-solid fa-pen-to-square"></i>
          <a href="edit.php?id=<?=$row['id']?>">Edit</a>
        </button>
        <button type="button" class="btn btn-link btn-sm btn-rounded text-danger">
        <i class="fa-solid fa-trash-can"></i>
          <a href="delete.php?id=<?=$row['id']?>" class="text-danger" onclick="return confirmasi()">Delete</a>
        </button>
      </td>
    </tr>
    <?php }?>
  </tbody>
</table>

<script>
    function confirmasi(){
        return confirm("Apakah anda yakin ingin menghapus data ini?");
        header("Location: index.php");
    }
</script>
<script src="js/mdb.min.js"></script>
</body>
</html>