<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update data </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $id = $_GET['id'];

    include('dbconnect.php');

    $query = "SELECT * FROM buku WHERE id_buku = '$id'";
    $result = mysqli_query($conn, $query);
    ?>
    <div class="update">
        <div class="form">
            <h3>Update Data Buku</h3>
            <form action="edit.php" method="GET">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {

                ?>
                    <input type="hidden" name="id_bk" value="<?php echo $row['id_buku']; ?>">
                    <div class="mb-3">
                        <label for="judulBuku" class="judulBuku">Judul Buku</label>
                        <input type="text" class="form-control" id="judulBUku" name="judul_bk" value="<?php echo $row['judul_buku']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="penerbitBuku" class="form-label">Penerbit Buku</label>
                        <input type="text" name="terbit_bk" class="form-control" id="penerbitBuku" value="<?php echo $row['penerbit_buku']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="genreBuku" class="form-label">Genre Buku</label>
                        <input type="text" name="genre_bk" value="<?php echo $row['genre_buku']; ?>" class="form-control" id="genreBuku">
                    </div>
                    <div class="mb-3">
                        <label for="hargaBuku" class="form-label">Harga Buku</label>
                        <input type="text" name="harga_bk" value="<?php echo $row['harga_buku'] ?>" class="form-control" id="penerbitBuku">
                    </div>
                    <button type="submit" class="btn btn-primary">Update buku</button>
            </form>
        <?php
                }
                mysqli_close($conn);
        ?>
        </div>
</body>

</html>