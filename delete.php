<?php
$id = $_GET['id'];
include('dbconnect.php');

// query hapus
$query = "DELETE FROM buku WHERE id_buku = '$id'";

if (mysqli_query($conn, $query)) {
    header("location:index.php");
} else {
    echo "Eror, data gagal di hapus " . mysqli_eror($conn);
}
mysqli_close($conn);
