<?php
require "App/function.php";
include "templates/header-user-login.php";

$query = query("SELECT * FROM pemesan ORDER BY tanggal_pemesan");
$dataHarian = [];

$index = 0;
foreach ($query as $row) {
    if (isset($dataHarian[$index]['tanggal'])) {
        if ($dataHarian[$index]['tanggal'] == $row['tanggal_pemesan']) {
            $dataHarian[$index]['total'] += $row['total_harga'];
        } else {
            $index = $index +1;
            $dataHarian[$index]['tanggal'] = $row['tanggal_pemesan'];
            $dataHarian[$index]['total'] = $row['total_harga'];           
        }
    } else {
        $dataHarian[$index]['tanggal'] = $row['tanggal_pemesan'];
        $dataHarian[$index]['total'] = $row['total_harga'];
    }
}

// var_dump($dataHarian);
?>
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
                    <h1 class="h3 mb-0 text-gray-800">List Data Laporan Harian</h1>
                </div>
                <div class="card shadow mb-4  mt-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Tanggal Pesanan</th>
                                        <th>Total Harga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dataHarian as $produk): ?>
                                        <tr>
                                            <td>
                                                <?= $produk['tanggal']; ?>
                                            </td>
                                            <td>Rp.
                                                <?= number_format($produk['total'], 2, ",", ".") ?>
                                            </td>
                                            <td>
                                                <a href="details-data-laporan.php?tanggal=<?= $produk['tanggal']; ?>">
                                                    <span class="material-symbols-outlined">
                                                        visibility
                                                    </span>
                                                </a>
                                                <a href="print-laporan.php?tanggal=<?= $produk['tanggal']; ?>" target=”_blank”>
                                                    <span class="material-symbols-outlined">
                                                        print
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "templates/footer.php" ?>
        </div>
    </div>
</div>

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