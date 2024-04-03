<?php
require_once('connection-android.php');
$id = $_POST['id'];
$nama_barang  = $_POST['nama_barang'];
$stok_barang  = $_POST['stok_barang'];
if(!$id || !$nama_barang || !$stok_barang){
  echo json_encode(array('message'=>'required field is empty.'));
}else{
$query = mysqli_query($CON, "UPDATE tbl_barang SET nama_barang='$nama_barang', stok_barang='$stok_barang' WHERE id='$id'");
if($query){
    echo json_encode(array('message'=>'barang data successfully updated.'));
  }else{
    echo json_encode(array('message'=>'barang data failed to update.'));
  }
}
?>