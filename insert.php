
<?php

    $server   = "localhost";
    $username = "root";
    $password = "";
    $database = "db_pinjam_barang";

    $mysqli = new mysqli($server, $username, $password, $database);

    // cek koneksi
    if ($mysqli->connect_error) {
        die('Koneksi Database Gagal : '.$mysqli->connect_error);
    }

    $namabarang = $_POST['nama_barang'];
    $file_name    = str_replace(" ","_",$_FILES['gambar_barang']['name']);
        $file_size    = $_FILES['gambar_barang']['size'];
        $file_type    = $_FILES['gambar_barang']['type'];
        $tmp_name     = $_FILES['gambar_barang']['tmp_name'];
        $max_size     = 2000000;
        $extension    = substr($file_name, strpos($file_name, '.') + 1);
    $jumlah     = $_POST['stok_barang'];
    $satuan     = $_POST['deskripsi'];

    if(isset($file_name) && !empty($file_name)){
        // echo $file_name." ".$file_type." ".$file_size." ".$nama_barang." ".$stok_barang." ".$extension;
         if(($extension == "jpg" || $extension == "jpeg" || $extension == "gif" || $extension == "png") && ($file_type == "image/jpeg" || $file_type == "image/png" || $file_type=="image/gif") && $extension == $file_size<=$max_size){
             $location = "../assets/img/uploads/";
             if (move_uploaded_file($tmp_name, $location.$file_name)) {
                 if(mysql_query("INSERT INTO tbl_barang (nama_barang, gambar_barang, stok_barang, deskripsi) VALUES ('$nama_barang', '$file_name', '$stok_barang', '$deskripsi')")){
                     echo "<script>alert('Berhasil Ditambahkan');</script>";
                     echo "<script>window.location('index.php');</script>";
                 }else{
                     echo "<script>alert('Gagal Ditambahkan ke Database');</script>";
                 }
             }else{
                 echo "<script>alert('Gagal Upload ke direktori');</script>";
             }
         }else{
             echo "<script>alert('Bukan file gambar dan melebihi batas ukuran');</script>";
         }
     }

    for($i = 0; $i < sizeof($namabarang); $i++){
        if(($extension == "jpg" || $extension == "jpeg" || $extension == "gif" || $extension == "png") && ($file_type == "image/jpeg" || $file_type == "image/png" || $file_type=="image/gif") && $extension == $file_size<=$max_size){
            $location = "../assets/img/uploads/";
            if (move_uploaded_file($tmp_name, $location.$file_name)) {
                $insert = mysqli_query($mysqli,"INSERT INTO tbl_barang (`nama_barang`, `stok_barang`, `deskripsi`)
                                                VALUES ('$namabarang[$i]', '$file_name[$i]', '$jumlah[$i]', '$satuan[$i]')");
            }
        }

    }

    if($insert){
        echo "Insert Data Berhasil";
    }
?>
