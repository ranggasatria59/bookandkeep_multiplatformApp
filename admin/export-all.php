<?php
include 'config.php';
?>
<html>
<head>
  <title>Data Pengembalian</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>Laporan</h2>
			<h4>Barang Kembali</h4>
				<div class="data-tables datatable-dark">
					
					
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Nama Peminjam</th>
                        <th>Jabatan</th>
                        <th>Jml Barang</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                            include 'config.php';
                            $query = mysqli_query($connect,"SELECT * FROM tbl_transaksi ORDER BY  id DESC ");
                            if($query){
                                $no = 1;
                                while ($data=mysqli_fetch_array($query)) {
                                    $id          = $data['id'];
                                    $nama_barang = $data['nama_barang'];
                                    $peminjam    = $data['peminjam'];
                                    $level       = $data['level'];
                                    $jml_barang  = $data['jml_barang'];
                                    $tgl_pinjam  = $data['tgl_pinjam'];
                                    $tgl_kembali = $data['tgl_kembali'];
                            ?>
                                <tr>
                                    <td><?php echo $no;?></td>
                                    <td><?php echo $nama_barang;?></td>
                                    <td><?php echo $peminjam;?></td>
                                    <td><?php echo $level?></td>
                                    <td><?php echo $jml_barang;?></td>
                                    <td><?php echo $tgl_pinjam;?></td>
                                    <td><?php echo $tgl_kembali;?></td>
                                </tr>
                        <?php   
                                    $no++;
                                }
                            }else{
                        ?>      
                                <tr>
                                    <td colspan="7">Data Kosong</td>
                                </tr>                        
                        <?php
                            }
                        ?>
                      
                    </tbody>
                </table>
					
				</div>
			    <h4>Data Barang</h4>
				<div class="data-tables datatable-dark">
                <table id="bootstrap-data-table1" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>ID Barang</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        include 'config.php';
                        $query = mysqli_query($connect,"SELECT * FROM tbl_barang ORDER BY id ASC");
                        $no =1;
                        while ($data=mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $data['nama_barang'];?></td>
                           
                            <td style="text-align: center;"><?php echo $data['stok_barang'];?></td>
                        </tr>
                    <?php    
                                $no++;
                            }      
                    ?>
                      
                     
                        </div>
                        </table>
                </div>
</div>
	
<script>
$(document).ready(function() {
    $('#bootstrap-data-table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );


$(document).ready(function() {
    $('#bootstrap-data-table1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>



<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>