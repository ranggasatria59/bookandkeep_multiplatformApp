<?php
	session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="icon" type="image/png" href="logo.png"/>
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>PBG-Lobar</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="index.html">
            <img src="logo.png" alt="" /><span>
              
              <?php 
                if(isset($_SESSION['username'])){
                  $id_user = ($_SESSION['id_user']) ? $_SESSION['id_user'] : "";
                  $username = ($_SESSION['username']) ? $_SESSION['username'] : "";
                  echo $username;
                  echo $id_user;
            ?>
            </span>
          </a>
          
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="list-barang.php">List Barang <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pemberitahuan.php?id_user=<?php echo $id_user;?>"> Pemberitahuan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="tables/barang-dipinjam.php?id_user=<?php echo $id_user;?>"> Barang Dipinjam </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="tables/barang-dikembalikan.php?id_user=<?php echo $id_user;?>">Barang Dikembalikan</a>
                </li>
              </ul>
              <?php
					}
				?>
              <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
            <div class="quote_btn-container ml-0 ml-lg-4 d-flex justify-content-center">
              <a href="logout.php">
                Logout
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="slider_item-box">
              <div class="slider_item-container">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="slider_item-detail">
                        <div>
                          <h1>
                            Selamat Datang <br />
                            Di
                            Web Pusat Belajar Guru
                          </h1>
                          <p>
                            Web ini digunakan untuk mempermudah dalam
                            mengakses segala informasi dan peminjaman barang
                            pada naungan Pusat Belajar Guru dan Dikbud Lombok Barat
                          </p>
                          <div class="d-flex">
                            <a href="https://wa.me/6285333898410?text=Permisi%20admin%20saya%20ingin%20membuat%20akun%20untuk%20web%20sarpras%20Pusat%20belajar%20Guru" class="text-uppercase custom_orange-btn mr-3">
                             Admin
                            </a>
                            <a href="list-barang.php" class="text-uppercase custom_dark-btn">
                              Pinjam
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="slider_img-box">
                        <div>
                          <img src="images/lobar.png" alt="" class="" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="slider_item-box">
              <div class="slider_item-container">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="slider_item-detail">
                        <div>
                          <h1>
                          Selamat Datang <br />
                            Di
                            Web Pusat Belajar Guru
                          </h1>
                          <p>
                            Untuk membuat akun silahkan hubungi admin atau langsung menuju kantor pusat belajar guru membawa KTP dan surat 
                            dari Instansi yang berkaitan
                          </p>
                          <div class="d-flex">
                            <a href="https://wa.me/6285333898410?text=Permisi%20admin%20saya%20ingin%20membuat%20akun%20untuk%20web%20sarpras%20Pusat%20belajar%20Guru" class="text-uppercase custom_orange-btn mr-3">
                             Admin
                            </a>
                            <a href="list-barang.php" class="text-uppercase custom_dark-btn">
                              Pinjam
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="slider_img-box">
                        <div>
                          <img src="logo.png" alt="" class="" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <div class="custom_carousel-control">
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </section>

    <!-- end slider section -->
  </div>

  <!-- service section -->

  <section class="service_section layout_padding ">
    <div class="container">
      <h2 class="custom_heading">Layanan Kami</h2>
      <p class="custom_heading-text">
        Pada Web ini kami menyediakan beberapa layanan diantaranya adalah
      </p>
      <div class=" layout_padding2">
        <div class="card-deck">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List Barang</h5>
              <p class="card-text">
                Layanan list barang ini digunakan untuk melihat barang yang dapat dipinjam untuk menunjang 
                sarana dan prasarana dalam penyelenggaraan pelatihan dan pengembangan soft skill yang akan 
                dilaksanakan dibawah naungan Pusat Belajar Guru.
              </p>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Pemberitahuan</h5>
              <p class="card-text">
                Layanan pemberitahuan ini digunakan untuk melihat pemberitahuan dan statu barang terkait
                peminjaman barang yang telah diajukan.
              </p>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admin</h5>
              <p class="card-text">
                Layanan admin ini digunakan untuk menghubungi admin apabila ada hal yang urgent 
                dan untuk berkomunikasi kepada admin terkait ketersediaan dan kondisi barang.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-center">
        <a href="" class="custom_dark-btn">
          Read More
        </a>
      </div>
    </div>
  </section>

  <!-- end service section -->

  <!-- fruits section -->

  <section class="fruit_section">
    <div class="container">
      <h2 class="custom_heading">Struktur Pegawai</h2>
      <p class="custom_heading-text">
        Berikut Struktur Pegawai Dan Tugas Dari Setiap Pegawai
      </p>
      <div class="row layout_padding2">
        <div class="col-md-8">
          <div class="fruit_detail-box">
            <h3>
              Kepala Kantor
            </h3>
            <p class="mt-4 mb-5">
              Bertugas untuk memberikan arahan pada setiap pegawai serta menghandle
              kantor dengan sebaik-baiknya
            </p>
            <div>
              <a href="" class="custom_dark-btn">
                Contact
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex justify-content-center align-items-center">
          <div class="fruit_img-box d-flex justify-content-center align-items-center">
            <img src="images/user.png" alt="" class="" width="100px" />
          </div>
        </div>
      </div>
      <div class="row layout_padding2">
        <div class="col-md-8">
          <div class="fruit_detail-box">
            <h3>
              Bendahara
            </h3>
            <p class="mt-4 mb-5">
              Bertugas untuk mengelola keuangan kantor dari uang masuk dan keluar
              serta mencatat setiap dana keuangan yang masuk maupun keluar
            </p>
            <div>
              <a href="" class="custom_dark-btn">
                Contact
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex justify-content-center align-items-center">
          <div class="fruit_img-box d-flex justify-content-center ">
            <img src="images/user.png" alt="" class="" width="100px" />
          </div>
        </div>
      </div>
      <div class="row layout_padding2-top layout_padding-bottom">
        <div class="col-md-8">
          <div class="fruit_detail-box">
            <h3>
              Bagian Sarpras
            </h3>
            <p class="mt-4 mb-5">
              Bertugas untuk mengelola barang yang dipinjam dan ketersediaan Barang
              bertanggung jawab
            </p>
            <div>
              <a href="" class="custom_dark-btn">
              Contact
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex justify-content-center align-items-center">
          <div class="fruit_img-box d-flex justify-content-center align-items-center">
            <img src="images/user.png" alt="" class="" width="100px" />
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end fruits section -->

  <!-- tasty section -->
  <section class="tasty_section">
    <div class="container_fluid">
      <h2>
        Lombok Barat
      </h2>
    </div>
  </section>

  <section class="info_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <h5>
            Barang
          </h5>
          <ul>
            <li>
              Terminal
            </li>
            <li>
              LCD
            </li>
            <li>
              Komputer
            </li>
            <li>
              Layar LCD
            </li>
            <li>
              Speaker
            </li>
            <li>
              Printer
            </li>
            <li>
              Wifi
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <h5>
            Layanan
          </h5>
          <ul>
            <li>
              Buat Akun
            </li>
            <li>
              Pinjam Barang
            </li>
            <li>
              Pemberitahuan
            </li>
            <li>
              Admin
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <h5>
            Admin
          </h5>
          <ul>
            <li>
              Layanan
            </li>
            <li>
              Membuat Akun
            </li>
            <li>
              Mengelola Web
            </li>
            <li>
              Memberikan arahan user
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <div class="social_container">
            <h5>
              Temukan Kami di
            </h5>
            <div class="social-box">
              <a href="">
                <img src="images/fb.png" alt="">
              </a>

              <a href="">
                <img src="images/twitter.png" alt="">
              </a>
              <a href="">
                <img src="images/linkedin.png" alt="">
              </a>
              <a href="">
                <img src="images/instagram.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>