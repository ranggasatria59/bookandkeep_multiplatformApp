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

  <title>PBG Web - List Sarpras</title>

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
  <div class="hero_area sub_pages">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="index-user.php">
            <img src="logo.png" alt="" /><span>
            <?php 
            $id_user = $_SESSION['id_user'];
                if(isset($_SESSION['username'])){
                  $username = ($_SESSION['username']) ? $_SESSION['username'] : "";
                  echo $username;
            ?>
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="quote_btn-container ml-0 ml-lg-4 d-flex justify-content-center">
            
            </div>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="tables/data-request.php?id_user=<?php echo $id_user;?>">Permintaan Peminjaman <span class="sr-only">(current)</span></a>
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
              </form>
            </div>
            
          </div>
          
        </nav>
      </div>
    </header>
    <!-- end header section -->

  </div>


  <!-- fruits section -->

  <section class="fruit_section layout_padding-top">
    <div class="container">
      <?php
              include 'config.php';

              $query = mysqli_query($connect,"SELECT * FROM tbl_barang ORDER BY id_barang ASC");
              while ($data = mysqli_fetch_array($query)) {
      ?>
      
      <div class="row layout_padding2">
        <div class="col-md-8">
          <div class="fruit_detail-box">
            <h3>
              <?php echo $data['nama_barang'];?>
            </h3>
            <p class="mt-4 mb-5">
            <?php echo $data['deskripsi'];?>
            </p>
            <div>
              <a href="proses-pinjam.php?username=
									<?php
										if(isset($_SESSION['username'])){
											echo $_SESSION['username'];
										}else{
											echo "";
										}
									?>
									&id_barang=<?php echo $data['id_barang'];?>" class="custom_dark-btn">
                Pinjam
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex justify-content-center align-items-center">
          <div class="fruit_img-box d-flex justify-content-center align-items-center">
          <img src="assets/img/uploads/<?php echo $data['gambar_barang'];?>" alt="" class="" width="250px" />
          </div>
        </div>
      </div>
      <?php	
						}
					?>
      
    </div>
  </section>

  <!-- end fruits section -->


  <section class="info_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <h5>
            Fruits
          </h5>
          <ul>
            <li>
              randomised
            </li>
            <li>
              words which
            </li>
            <li>
              don't look even
            </li>
            <li>
              slightly
            </li>
            <li>
              believable. If you
            </li>
            <li>
              are going to use
            </li>
            <li>
              a passage of
            </li>
            <li>
              Lorem Ipsum,
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <h5>
            Services
          </h5>
          <ul>
            <li>
              randomised
            </li>
            <li>
              words which
            </li>
            <li>
              don't look even
            </li>
            <li>
              slightly
            </li>
            <li>
              believable. If you
            </li>
            <li>
              are going to use
            </li>
            <li>
              a passage of
            </li>
            <li>
              Lorem Ipsum,
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <h5>
            List
          </h5>
          <ul>
            <li>
              randomised
            </li>
            <li>
              words which
            </li>
            <li>
              don't look even
            </li>
            <li>
              slightly
            </li>
            <li>
              believable. If you
            </li>
            <li>
              are going to use
            </li>
            <li>
              a passage of
            </li>
            <li>
              Lorem Ipsum,
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <div class="social_container">
            <h5>
              Follow Us
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
          <div class="subscribe_container">
            <h5>
              Subscribe Now
            </h5>
            <div class="form_container">
              <form action="">
                <input type="email">
                <button type="submit">
                  Subscribe
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      Copyright &copy; 2019 All Rights Reserved By
      <a href="https://html.design/">Free Html Templates</a>
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

  <script>
    // This example adds a marker to indicate the position of Bondi Beach in Sydney,
    // Australia.
    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 11,
        center: {
          lat: 40.645037,
          lng: -73.880224
        },
      });

      var image = 'images/maps-and-flags.png';
      var beachMarker = new google.maps.Marker({
        position: {
          lat: 40.645037,
          lng: -73.880224
        },
        map: map,
        icon: image
      });
    }
  </script>
  <!-- google map js -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap">
  </script>
  <!-- end google map js -->
</body>

</html>