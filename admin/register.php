<?php
include 'config.php';
if(isset($_POST['daftar'])){
    $id_user    = $_POST['id_user'];
    $nama 		= $_POST['nama'];
    $username 	= $_POST['username'];
    $password 	= md5($_POST['password']);
    $level		= $_POST['level'];
    //echo $nama." ".$username." ".$password." ".$level;
    if(mysqli_query($connect,"INSERT INTO user (id_user, nama, username, password, level) VALUES ('$id_user','$nama', '$username', '$password', '$level')")){
        echo "<script>alert('Berhasil Register');</script>";
        header("location: index.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Tambah User</h1>
                            </div>
                            <form class="card-body card-block" action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>NIK</label>
                                <input class="form-control" type="" name="id_user" required>
                            </div>

                            <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control" type="" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" type="" name="username" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password" required> 
                            </div>
                            <div class="form-group">
                                <label>Level</label>
                                <input class="form-control"type="" name="level" required><br>      
                            </div>
                            <input type="checkbox" name="" required> Saya setuju dengan <a href="#">syarat dan ketentuan</a>.

                            <button type="submit" name="daftar" class="btn btn-success" style="margin-top: 20px;">DAFTAR</button>
                                </div>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>