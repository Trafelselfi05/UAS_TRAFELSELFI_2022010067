<?php
require ("App/function.php");

if (isset($_POST['addAdmin'])) {
    if (tambahAdmin($_POST) > 0) {
        echo "
        <script>
            alert ('Data Berhasil Ditambahkan')
            document.location.href = 'register-view.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert ('Data Gagal Ditambahkan')
            document.location.href = 'register-view.php';
        </script>
        ";
    }
}

?>
<?php include "templates/header-user-login.php" ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<link href="asset/css/sb-admin-2.min.css" rel="stylesheet">
<?php include("templates/header.php"); ?>
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php include "templates/sidebar.php" ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php include "templates/navbar.php" ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">New Admin</h1>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama</label>
                                <input type="" name="nama_lengkap" class="form-control" id="nama_lengkap" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="" name="username" class="form-control" id="username" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input class="form-control" name="password" type="" id="password">
                            </div>
                            <div class="mb-5">
                                <button name="addAdmin" type="submit" class="btn btn-primary">Add Admin</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include "templates/footer.php" ?>
    </div>
</div>
<?php include("templates/logout-modal.php") ?>
<!-- Bootstrap core JavaScript-->
<script src="asset/vendor/jquery/jquery.min.js"></script>
<script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="asset/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="asset/js/demo/chart-area-demo.js"></script>
<script src="asset/js/demo/chart-pie-demo.js"></script>