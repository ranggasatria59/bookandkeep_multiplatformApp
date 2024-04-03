<?php
	include 'config.php';
	if(isset($_GET['mode']) && !empty($_GET['mode'])){
		$id = $_GET['id'];
		$query_search_req_kembali 	 = mysqli_query($connect,"SELECT * FROM tbl_req_kembali 
		INNER JOIN tbl_barang ON tbl_req_kembali.id_barang = tbl_barang.id_barang 
        INNER JOIN user ON tbl_req_kembali.id_user = user.id_user WHERE id='$id'");
		$data_req_kembali 		  = mysqli_fetch_array($query_search_req_kembali);
		$nama_barang              = $data_req_kembali['nama_barang'];
		$id_request	              = $data_req_kembali['id'];
		$id_user                  = $data_req_kembali['id_user'];
		$id_barang                = $data_req_kembali['id_barang'];
		$peminjam		  		  = $data_req_kembali['peminjam'];
		$telpon			  		  = $data_req_kembali['telpon'];
		$jml_barang		   		  = $data_req_kembali['jml_barang'];
		$tgl_pinjam	  	  		  = $data_req_kembali['tgl_pinjam'];
		$tgl_kembali	  		  = $data_req_kembali['tgl_kembali'];

		if($_GET['mode'] == "terima"){
			$query_search_barang = mysqli_query($connect,"SELECT * FROM tbl_barang WHERE id_barang = '$id_barang'");
			$data_search_barang  = mysqli_fetch_array($query_search_barang);
			$stok_barang 		 = $data_search_barang['stok_barang'] + $jml_barang;
			if($data_search_barang){
				$update_stok = mysqli_query($connect,"UPDATE tbl_barang SET stok_barang = '$stok_barang' WHERE id_barang = '$id_barang'");
				if($update_stok){
					if(mysqli_query($connect,"INSERT INTO tbl_transaksi (id_barang, id_user, peminjam, telpon, jml_barang, tgl_pinjam, tgl_kembali) VALUES ('$id_barang', '$id_user', '$peminjam', '$telpon', '$jml_barang', '$tgl_pinjam', '$tgl_kembali')")){
						if(mysqli_query($connect,"DELETE FROM tbl_req_kembali WHERE id='$id_request'")){
							$konten = "Permintaan Pengembalian Barang Anda Telah di Terima. ".$jml_barang." buah ".$nama_barang.". Username: ".$peminjam;
								
							if(mysqli_query($connect,"INSERT INTO pemberitahuan (id_user, id_barang, username, konten, status) VALUES ('$id_user', '$id_barang', '$peminjam', '$konten', 'terima')")){
								echo "<script>alert('Berhasil Menerima Permintaan');</script>";
								echo "<script>window.history.back();</script>";
								header('location: permintaan-kembali.php');
							}else{
								echo "Gagal Menambah Pemberitahuan";
							}						
						}else{
							echo "Gagal Hapus tbl_req_kembali";
						}
					}else{
						echo "Gagal insert ke tbl_transaksi";
					}
				}else{
					echo "Gagal Update Stok Barang";
				}
			}else{
				echo "Gagal Mencari barang";
			}

		}
	}
	
?>