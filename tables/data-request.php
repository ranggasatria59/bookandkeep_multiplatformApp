<?php
	session_start();
		
?>
<!doctype html>
<html lang="en">
  <head>
  	<link rel="icon" type="image/png" href="../logo.png"/>
  	<title>PBG Web - Permintaan Pinjam</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-4">
					<h2 class="heading-section">Data Permintaan Peminjaman</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-primary">
						    <tr>
								<th>No</th>
								<th>Nama Barang</th>
								<th>telpon</th>
								<th>Jumlah Barang</th>
								<th>Tgl Pinjam</th>
								<th>Tgl Kembali</th>
						    </tr>
						  </thead>
						  <tbody>
						<?php
							include 'config.php';
							$id_user = $_SESSION['id_user'];
							$query = mysqli_query($connect,"SELECT * FROM tbl_request
							INNER JOIN tbl_barang ON tbl_request.id_barang = tbl_barang.id_barang 
                            INNER JOIN user ON tbl_request.id_user = user.id_user
							 WHERE tbl_request.id_user='$id_user' ORDER BY id DESC");
							if(mysqli_num_rows($query) == 0){
								echo "<tr><td colspan='6'>belum ada data!</td></tr>";
							}else{
								$no = 1;
								while ($data = mysqli_fetch_array($query)) {
							?>
									<tr>
											<td><?php echo $no;?></td>
											<td><?php echo $data['nama_barang'];?></td>
											<td><?php echo $data['telpon'];?></td>
											<td><?php echo $data['jml_barang'];?></td>
											<td><?php echo $data['tgl_pinjam'];?></td>
											<td><?php echo $data['tgl_kembali'];?></td>
										
									</tr>
							<?php
									$no++;
								}
							}
						?>
						
					</tbody>
						</table>
					</div>
					<a href="../index-user.php" class="btn btn-kmbli" style="margin-top: 30px; ">
													
													Halaman Utama
						</a>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

