<?php
require_once('connection-android.php');
$nama_barang  = $_POST['nama_barang'];
$stok_barang  = $_POST['stok_barang'];

if(!$nama_barang){
  echo json_encode(array('message'=>'required field is empty.'));
}else{
$query = mysqli_query($CON, "INSERT INTO tbl_barang (nama_barang, stok_barang) VALUES ('$nama_barang','$stok_barang')");
if($query){
    echo json_encode(array('message'=>'barang data successfully added.'));
  }else{
    echo json_encode(array('message'=>'barang data failed to add.'));
  }
}
?>