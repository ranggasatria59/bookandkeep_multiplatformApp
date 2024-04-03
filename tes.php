<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>PHP - Jquery - MySql - Multi Record Insert</title>
  </head>
  <body>
    <div class="container">
        <h1>PHP - Jquery - MySql - Multi Record Insert</h1>
        <hr>
        <form action="insert.php" method="POST">
            <div class="row">
                <div class="col-lg-12">
                    <button type="button" class="btn btn-primary" id="btn-tambah">TAMBAH BARANG</button>    
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table" style="width:100%;">
                        <thead>
                            <th>No.</th>
                            <th>Nama Barang</th>
                            <th>Gambar Barang</th>
                            <th>Jumlah</th>
                            <th>Deskripsi</th>
                            <th></th>
                        </thead>
                        <tbody id="tbl-barang-body">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row btnSave" style="display:none;">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary">SIMPAN BARANG</button>    
                </div>
            </div>
        </form>        
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <script>
        $(function(){
            var count = 0;
            
            if(count == 0){
                $('.btnSave').hide();
            }
            $('#btn-tambah').on('click', function(){
                count +=1;
                $('#tbl-barang-body').append(`
                    <tr>
                        <td>`+ count +`</td>
                        <td>
                            <input type="text" name="nama_barang[]" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="stok_barang[]" class="form-control">
                        </td>
                        <td>
                            <input type="file" name="gambar_barang[]" class="form-control">
                        </td>
                        <td>
                            <input type="textbox" name="deskripsi[]" class="form-control">
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger removeItem">HAPUS</button>
                        </td>
                    </tr>
                `);

                if(count > 0){
                    $('.btnSave').show();
                }

                $('.removeItem').on('click', function(){
                    $(this).closest("tr").remove();
                    count -=1;
                    if(count == 0){
                        $('.btnSave').hide();
                    }
                })
            })
        })
    </script>
  </body>
</html>