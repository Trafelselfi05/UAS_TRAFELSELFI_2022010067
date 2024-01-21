<?php
session_start();
require("App/function.php");
$user = $_SESSION['login'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$user'");
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

$tanggal = $_GET['tanggal'];
$result = query("SELECT * FROM detail_pemesan 
               INNER JOIN produk ON detail_pemesan.id_produk = produk.id_produk
               INNER JOIN users ON detail_pemesan.username = users.username
               INNER JOIN pemesan ON detail_pemesan.id_pemesan = pemesan.id_pemesan 
               WHERE tanggal_pemesan = '$tanggal'");

foreach ($result as $row) {
    $temp = $row['total_harga'];
    $tanggal_pesanan = $row['tanggal_pemesan'];
    if (isset($totalHarga)) {
        if ($totalHarga != $temp) {
            $totalHarga += $row['total_harga'];
        }
    } else {
        $totalHarga = $row['total_harga'];
    }
}



foreach ($rows as $role) {
    $role = $role['role'];
}

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
}
if (isset($_SESSION['login'])) {
    if ($role == 'user') {
        header("Location: ../index.php");
    }
}
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
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Details Data Laporan</h1>
                </div>
                <div class="container">
                    <div class="row d-flex align-items-center justify-content-center">
                        <div class="col-md-6">
                            <h1>Sabila <span class="fw-bold text-primary">Bakery</span></h1>
                            <table>
                                <tr>
                                    <td>Admin</td>
                                    <td> : </td>
                                    <td>Selfi</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>Buara</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table>
                                <tr>
                                    <td>Tanggal Laporan </td>
                                    <td>: </td>
                                    <td>
                                        <?= $tanggal_pesanan ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row mt-5 justify-content-center">
                        <div class="col">
                            <p class="text-center">
                                ----------------------------------------------------------------------------------------------------
                            </p>
                            <table class="table table-bordered" id="example">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Subharga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($result as $produk): ?>
                                        <tr>
                                            <td>
                                                <?= $produk['nama_produk']; ?>
                                            </td>
                                            <td>Rp.
                                                <?= number_format($produk['harga'], 2, ",", ".") ?>
                                            </td>
                                            <td>
                                                <?= $produk['jumlah_produk']; ?>
                                            </td>
                                            <td>Rp.
                                                <?= number_format($produk['jumlah_produk'] * $produk['harga'], 2, ",", ".") ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">Total Penjualan</th>
                                        <th colspan="2">Rp.
                                            <?= number_format($totalHarga, 2, ",", ".") ?>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                            <p class="text-center">
                                ----------------------------------------------------------------------------------------------------
                            </p>
                            <div class="row justify-content-center">
                                <div class="col text-center mb-5" style="line-height: 1.3px;">
                                    <p>------------------------------------------</p>
                                    <p>Terima kasih atas Kunjungan anda</p>
                                    <p>jangan lupa datang kembali</p>
                                    <p class="fw-bold text-danger">Note : Barang yang sudah di beli </p>
                                    <p class="fw-bold text-danger">tidak dapat ditukarkan kembali</p>
                                    <p>------------------------------------------</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


</div>
<!-- End of Content Wrapper -->
<?php include "templates/footer.php" ?>

<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

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