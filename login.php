<?php
include('dbconnect.php');
error_reporting(0);

session_start();
if (isset($_SESSION['username'])) {
    header("location:index.php");
}
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = ($_POST['password']); // gunakan md5() untuk mengenkripsi password
    $sql = "SELECT * FROM admin WHERE username = '$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("location:index.php");
    } else {
        $_SESSION['error'] = "Username atau password Anda salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login CES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class=" d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
        <div class="alert" role="alert">
            <?php echo $_SESSION['error'] ?>
        </div>
        <form method="POST" class="pi">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>