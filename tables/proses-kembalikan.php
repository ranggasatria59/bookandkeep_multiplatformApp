<?php
	include 'config.php';
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$query_search_pinjam = mysqli_query($connect,"SELECT * FROM tbl_pinjam WHERE id='$id'");
		$data_pinjam  		 = mysqli_fetch_array($query_search_pinjam);
		$id_barang  		 = $data_pinjam['id_barang'];
		$id_user  		     = $data_pinjam['id_user'];
		$peminjam			 = $data_pinjam['peminjam'];
		$telpon 			 = $data_pinjam['telpon'];
		$jml_barang			 = $data_pinjam['jml_barang'];
		$tgl_pinjam			 = $data_pinjam['tgl_pinjam'];
		$tgl_kembali		 = $data_pinjam['tgl_kembali'];

		$query_search_barang = mysqli_query($connect,"SELECT * FROM tbl_barang WHERE id_barang = '$id_barang'");
		$data_search_barang  = mysqli_fetch_array($query_search_barang);
		if($query_search_barang){		
			$query_request_kembali = mysqli_query($connect,"INSERT INTO tbl_req_kembali (id_barang, id_user, peminjam, telpon, jml_barang, tgl_pinjam, tgl_kembali) VALUES ('$id_barang', '$id_user', '$peminjam', '$telpon', '$jml_barang', '$tgl_pinjam', '$tgl_kembali')");
			if($query_request_kembali){
				$query_delete_pinjam = mysqli_query($connect,"DELETE FROM tbl_pinjam WHERE id='$id'");
				if($query_delete_pinjam){
					echo "<script>alert('Berhasil Request Pengembalian Barang');</script>";
					header("location: barang-dipinjam.php?username=$peminjam");
				}else{
					echo "Gagal Delete tbl_pinjam";
				}
			}else{
				echo "Gagal Insert data ke tbl_req_kembali";
			}	
		}else{
			echo "Gagal Mencari Barang";
		}
	}
?>