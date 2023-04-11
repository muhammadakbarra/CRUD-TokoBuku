<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOKO BUKU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- php -->
    <?php
    // tambahkan dbconnect
    include('dbconnect.php');

    // query
    $query = "SELECT * FROM buku";
    $result = mysqli_query($conn, $query);

    session_start();
    if (!isset($_SESSION['username'])) {
        header("location:login.php");
    }
    ?>

    <!-- nav -->
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://st3.depositphotos.com/1561359/12975/i/600/depositphotos_129758586-stock-photo-3d-green-letter-g.jpg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                C R U D
            </a>
            <a href="logout.php" class="btn btn-secondary">logout</a>
        </div>
    </nav>
    <!-- /nav -->

    <!-- Form Tambah buku -->
    <div class="containerr">
        <div class="form">
            <h3>Form Tambah Buku</h3>
            <form action="insert.php" method="post">
                <div class="mb-3">
                    <label for="judulBuku" class="judulBuku">Judul Buku</label>
                    <input type="text" name="judul_bk" class="form-control" id="judulBuku">
                </div>
                <div class="mb-3">
                    <label for="penerbitBuku" class="form-label">Penerbit Buku</label>
                    <input type="text" name="terbit_bk" class="form-control" id="penerbitBuku">
                </div>
                <div class="mb-3">
                    <label for="genreBuku" class="form-label">Genre Buku</label>
                    <input type="text" name="genre_bk" class="form-control" id="genreBuku">
                </div>
                <div class="mb-3">
                    <label for="hargaBuku" class="form-label">Harga Buku</label>
                    <input type="text" name="harga_bk" class="form-control" id="penerbitBuku">
                </div>
                <button type="submit" class="btn btn-primary">Tambah buku</button>
            </form>
        </div>
        <!-- end -->

        <!-- daftar buku -->
        <div daftar>
            <h3>Tabel Daftar Buku</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $no++; ?></th>
                            <td><?php echo $row['judul_buku']; ?></td>
                            <td><?php echo $row['penerbit_buku']; ?></td>
                            <td><?php echo $row['genre_buku']; ?></td>
                            <td><?php echo $row['harga_buku']; ?></td>
                            <td> <a href="editform.php?id=<?php echo $row['id_buku']; ?>" class="btn btn-success" role="button">Edit</a>
                                <a href="delete.php?id=<?php echo $row['id_buku'] ?>" class="btn btn-danger" role="button">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- js -->
    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-storage.js"></script>
    <script src="firebase-config.js"></script>
</body>

</html>