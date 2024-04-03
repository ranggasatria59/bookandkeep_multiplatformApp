<?php
	include 'config.php';
	if(isset($_GET['mode']) && !empty($_GET['mode'])){
		$id = $_GET['id'];
		$search_request 	 = mysqli_query($connect,"SELECT * FROM tbl_request
		INNER JOIN tbl_barang ON tbl_request.id_barang = tbl_barang.id_barang 
        INNER JOIN user ON tbl_request.id_user = user.id_user WHERE id='$id'");
		$data_request		 = mysqli_fetch_array($search_request);
		$id_request  	 	 = $data_request['id'];
		$peminjam_request 	 = $data_request['peminjam'];
		$id_barang_request   = $data_request['id_barang'];
		$id_user_request     = $data_request['id_user'];
		$nama_barang         = $data_request['nama_barang'];
		$telpon_request		 = $data_request['telpon'];
		$jml_barang_request  = $data_request['jml_barang'];
		$tgl_pinjam_request  = $data_request['tgl_pinjam'];
		$tgl_kembali_request = $data_request['tgl_kembali'];
		
		if($_GET['mode'] == "terima"){
			$query_search_barang = mysqli_query($connect,"SELECT * FROM tbl_barang WHERE id_barang = '$id_barang_request'");
			$data_search_barang  = mysqli_fetch_array($query_search_barang);
			$stok_barang 		 = $data_search_barang['stok_barang'] - $jml_barang_request;
			if($data_search_barang){
				$update_stok = mysqli_query($connect,"UPDATE tbl_barang SET stok_barang = '$stok_barang' WHERE id_barang = '$id_barang_request'");
				if($update_stok){
					if(mysqli_query($connect,"INSERT INTO tbl_pinjam (id_barang, id_user, peminjam, telpon, jml_barang, tgl_pinjam, tgl_kembali) VALUES ('$id_barang_request', '$id_user_request', '$peminjam_request', '$telpon_request', '$jml_barang_request', '$tgl_pinjam_request', '$tgl_kembali_request')")){
						if(mysqli_query($connect,"DELETE FROM tbl_request WHERE id = '$id_request'")){
							$konten = "Permintaan Peminjaman Barang Anda Telah di Terima. ".$jml_barang_request." buah dengan nama barang: ".$nama_barang.". Username: ".$peminjam_request.". Silahkan ke bagian Sarpras untuk mengampil barang";
							if(mysqli_query($connect,"INSERT INTO pemberitahuan (id_user, id_barang, username, konten, status) VALUES ('$id_user_request', '$id_barang_request', '$peminjam_request', '$konten', 'terima')")){
								echo "<script>alert('Berhasil Menerima Permintaan');</script>";
								echo "<script>window.history.back();</script>";
							}else{
								echo "Gagal Menambah Pemberitahuan";
							}						
						}else{
							echo "Gagal Menghapus dari tbl_request";
						}
					}else{
						echo "Gagal menambah ke tbl_pinjam";
					}
				}else{
					echo "Tidak bisa update data barang";
				}
			}else{
				echo "tidak bisa mencari barang";
			}

		}else if($_GET['mode'] == "tolak"){
			if(mysqli_query($connect,"DELETE FROM tbl_request WHERE id = '$id_request'")){
				$konten = "Maaf! Permintaan Peminjaman Barang Anda di Tolak. ".$jml_barang_request." buah dengan nama barang: ".$nama_barang.". Username: ".$peminjam_request;
				if(mysqli_query($connect,"INSERT INTO pemberitahuan (id_user, id_barang, username, konten, status) VALUES ('$id_user_request', '$id_barang_request', '$peminjam_request', '$konten', 'tolak')")){
					echo "<script>alert('Berhasil Menolak Permintaan');</script>";
					echo "<script>window.history.back();</script>";
				}else{
					echo "Gagal Menambah Pemberitahuan";
				}			
			}else{
				echo "Gagal Menghapus dari tbl_request";
			}
			
		}
	}
?>