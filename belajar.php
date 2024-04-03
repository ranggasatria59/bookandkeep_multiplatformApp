<?php
	$conne = mysqli_connect("localhost","root","","belajar") or die("Gagal Koneksi");
	
    $query = mysqli_query($conne,"SELECT divisi.nama_divisi, MAX(karyawan.gaji_karyawan) AS total_pendapatan FROM divisi divisi
    INNER JOIN karyawan ON divisi.id_divisi = karyawan.id_karyawan GROUP BY nama_divisi");
    $no = 1;
    $data=mysqli_fetch_array($query);
        $nama_divisi   = $data['nama_divisi'];
        $total_pendapatan = $data['total_pendapatan'];
?>
<td><?php echo $nama_divisi;?></td>
<td><?php echo $total_pendapatan;?></td>  
<?php
$no++;
?>