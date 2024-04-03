<?php
require_once('connection-android.php');
$id = $_POST['id'];
if(!$id){
  echo json_encode(array('message'=>'required field is empty'));
}else{
$query = mysqli_query($CON, "DELETE FROM tbl_barang WHERE id='$id'");
if($query){
    echo json_encode(array('message'=>'barang data successfully deleted.'));
  }else{
    echo json_encode(array('message'=>'barang data failed to delete.'));
  }
}
?>