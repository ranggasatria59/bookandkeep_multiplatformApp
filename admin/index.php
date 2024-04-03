<?php
        session_start();
        include 'config.php';
        if(!isset($_SESSION['username'])){
            header("location: ../login.php");
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PBG Web</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    
                </div>
                <div class="sidebar-brand-text mx-3">Selamat Datang Admin <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Peminjaman</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Daftar Menu:</h6>
                        <a class="collapse-item" href="permintaan.php">Permintaan Peminjaman</a>
                        <a class="collapse-item" href="barang-dipinjam.php">Barang Di pinjam</a>
                        <a class="collapse-item" href="permintaan-kembali.php">Konfirmasi Barang Kembali</a>
                        <a class="collapse-item" href="barang-kembali.php">Barang Kembali</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Barang</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Daftar Menu:</h6>
                        <a class="collapse-item" href="data-barang.php">Data Barang</a>
                        <a class="collapse-item" href="tambah-data-barang.php">Tambah Barang</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu User
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>User</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="data-user.php">Data User</a>
                        <a class="collapse-item" href="register.php">Tambah User</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Nav Item - Tables -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Welcome, <?php echo $_SESSION['username'];?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="export-all.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-black bg-flat-color-1">
                                <div class="card-body pb-0">
                                    <h4 class="mb-0">
                                        <span class="count">
                                            <?php
                                                $query_user = mysqli_query($connect,"SELECT COUNT(*) AS total_user FROM user");
                                                $total_user = mysqli_fetch_array($query_user);
                                                echo $total_user['total_user'];
                                            ?>  
                                        </span>
                                    </h4>
                                    <p class="text-dark">User Terdaftar</p>
                                    <a href="data-user.php" class="btn btn-success btn-sm">Lihat</a>
                                    <div class="chart-wrapper px-0" style="height:70px;" height="70">
                                        <canvas id="widgetChart1"></canvas>
                                    </div>
            
                                </div>
            
                            </div>
                        </div>
                        <!--/.col-->
            
                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-black bg-flat-color-2">
                                <div class="card-body pb-0">
                                    <h4 class="mb-0">
                                        <span class="count">
                                            <?php
                                                $query_barang = mysqli_query($connect,"SELECT SUM(stok_barang) AS stok FROM tbl_barang");
                                                $total_barang = mysqli_fetch_array($query_barang);
                                                echo $total_barang['stok'];
                                            ?>
                                        </span>
                                    </h4>
                                    <p class="text-dark">Barang Tersedia</p>
                                    <a href="data-barang.php" class="btn btn-success btn-sm">Lihat</a>
                                    <div class="chart-wrapper px-0" style="height:70px;" height="70">
                                        <canvas id="widgetChart2"></canvas>
                                    </div>
            
                                </div>
                            </div>
                        </div>
                        <!--/.col-->
            
                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-black bg-flat-color-3">
                                <div class="card-body pb-0">
                                    <h4 class="mb-0">
                                        <span class="count">
                                            <?php
                                                $query_request = mysqli_query($connect,"SELECT COUNT(*) AS total_req_pinjam FROM tbl_request");
                                                $total_request = mysqli_fetch_array($query_request);
                                                echo $total_request['total_req_pinjam'];
                                            ?>  
                                        </span>
                                    </h4>
                                    <p class="text-dark">Request Peminjaman</p>
                                    <a href="permintaan.php" class="btn btn-success btn-sm">Lihat</a>
            
                                </div>
            
                                    <div class="chart-wrapper px-0" style="height:70px;" height="70">
                                        <canvas id="widgetChart3"></canvas>
                                    </div>
                            </div>
                        </div>

                        
                        <!--/.col-->
            
                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-black bg-flat-color-4">
                                <div class="card-body pb-0">
                                    <h4 class="mb-0">
                                        <span class="count">
                                            <?php
                                                $query_barang_pinjam = mysqli_query($connect,"SELECT SUM(jml_barang) AS jml_barang FROM tbl_pinjam");
                                                $total_barang_pinjam = mysqli_fetch_array($query_barang_pinjam);
                                                echo $total_barang_pinjam['jml_barang'];
                                            ?>
                                        </span>
                                    </h4>
                                    <p class="text-dark">Barang Dipinjam</p>
                                    <a href="barang-dipinjam.php" class="btn btn-success btn-sm">Lihat</a>
            
                                    <div class="chart-wrapper px-3" style="height:70px;" height="70">
                                        <canvas id="widgetChart4"></canvas>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.col-->
            
            
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Tugas Akhir 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>