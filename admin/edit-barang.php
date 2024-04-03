<?php
	session_start();
	include 'config.php';
	if(isset($_POST['edit-barang'])){
        $nama_barang  = $_POST['nama_barang'];
        $stok_barang  = $_POST['stok_barang'];
        $id_barang 	  = $_POST['id_barang'];
        $deskripsi    = $_POST['deskripsi'];
        $file_name    = str_replace(" ","_",$_FILES['gambar_barang']['name']);
        $file_size    = $_FILES['gambar_barang']['size'];
        $file_type    = $_FILES['gambar_barang']['type'];
        $tmp_name     = $_FILES['gambar_barang']['tmp_name'];
        $max_size     = 2000000;
        $extension    = substr($file_name, strpos($file_name, '.') + 1);

        if(isset($file_name) && !empty($file_name)){
           // echo $file_name." ".$file_type." ".$file_size." ".$nama_barang." ".$stok_barang." ".$extension;
            if(($extension == "jpg" || $extension == "jpeg" || $extension == "gif" || $extension == "png") && ($file_type == "image/jpeg" || $file_type == "image/png" || $file_type=="image/gif") && $extension == $file_size<=$max_size){
                $location = "../assets/img/uploads/";
                if (move_uploaded_file($tmp_name, $location.$file_name)) {
                    if(mysqli_query($connect,"UPDATE tbl_barang SET id_barang='$id_barang',nama_barang='$nama_barang', gambar_barang='$file_name', stok_barang='$stok_barang', deskripsi='$deskripsi' WHERE id_barang='$id_barang'")){
                        echo "<script>alert('Berhasil Disimpan');</script>";
                        echo "<script>window.location('index.php');</script>";
                        header('location: data-barang.php');
                    }else{
                        echo "<script>alert('Gagal Edit ke Database');</script>";
                    }
                }else{
                    echo "<script>alert('Gagal Upload ke direktori');</script>";
                }
            }else{
                echo "<script>alert('Bukan file gambar dan melebihi batas ukuran');</script>";
            }
        }
    }

	if(isset($_GET['id_barang'])){
		$id_barang = $_GET['id_barang'];
		$query = mysqli_query($connect,"SELECT * FROM tbl_barang WHERE id_barang='$id_barang'");
		$data  = mysqli_fetch_array($query);
		$nama_barang   = $data['nama_barang'];
		$gambar_barang = $data['gambar_barang'];
		$stok_barang   = $data['stok_barang'];
        $deskripsi    =  $data['deskripsi'];
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

    <title>PBG Web - Edit Sarpras</title>

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
                                <h1 class="h4 text-gray-900 mb-4">Edit Data Barang</h1>
                            </div>
                            <form class="card-body card-block" action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id_barang" value="<?php echo $id_barang;?>">
                            <div class="form-group">
                                <label for="nama" class=" form-control-label">Nama Barang</label>
                                <input type="text" id="nama" name="nama_barang" class="form-control" value="<?php echo $nama_barang;?>"> 
                            </div>
                            <div class="form-group">
                            	<img src="assets/img/uploads/<?php echo $gambar_barang;?>" style="width: 200px;"><br>
                                <label for="gambar" class="form-control-label">Upload Foto Barang</label>
                                <input type="file" id="gambar" name="gambar_barang" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="stok" class=" form-control-label">Jumlah Barang</label>
                                <input type="number" id="stok" name="stok_barang" value="<?php echo $stok_barang;?>" class="form-control"> 
                            </div>
                            <div class="form-group">
                                <label for="deskripsi" class=" form-control-label">deskripsi</label>
                                <textarea type="text" id="deskripsi" name="deskripsi" value="<?php echo $deskripsi;?>" class="form-control"></textarea>
                               
                            </div>
                            <button type="submit" class="btn btn-success" name="edit-barang">
                                <i class="fa fa-check"></i>
                                Simpan
                            </button>
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