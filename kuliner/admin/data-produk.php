<?php
include "templates/header-user-login.php";
require("App/function.php");

$query = query("SELECT * FROM produk ORDER BY id_produk DESC");

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
                    <h1 class="h3 mb-0 text-gray-800">List Menu</h1>
                </div>
                <div class="row">
                    <div class="col d-flex justify-content-between">
                        <a href="tambah-produk.php" class="btn btn-primary shadow-sm">Tambah Menu</a>
                        <?php
                        $sql = ("SELECT * FROM produk");
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        ?>
                        <small>Total produk :
                            <?= $count ?>
                        </small>
                    </div>
                </div>
                <div class="card shadow mb-4  mt-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Jenis produk</th>
                                        <th>Harga</th>
                                        <th>Stock</th>
                                        <th>Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($query as $produk): ?>
                                        <tr>
                                            <td>
                                                <?= $produk['nama_produk']; ?>
                                            </td>
                                            <td>
                                                <?= $produk['jenis_produk']; ?>
                                            </td>
                                            <td>Rp.
                                                <?= number_format($produk['harga'], 2, ",", "."); ?>
                                            </td>
                                            <td>
                                                <?= $produk['stok']; ?>
                                            </td>
                                            <td><img src="asset/img/produk/<?= $produk['gambar']; ?>" style="width: 50px;"
                                                    alt=""></td>
                                            <td><a href="update-produk.php?id_produk=<?= $produk['id_produk']; ?>"><span
                                                        class="material-symbols-outlined ">
                                                        edit_square
                                                    </span></a>
                                                <!-- <span style="cursor: pointer;"
                                                    onclick="deletePesanan(<?= $produk['id_produk']; ?>)"
                                                    class="material-symbols-outlined text-danger">
                                                    delete
                                                </span> -->
                                                <button type="button" Style="border:none; background:transparent"
                                                    data-toggle="modal"
                                                    data-target="#deleteModal<?= $produk['id_produk']; ?>">
                                                    <span class="material-symbols-outlined text-danger"
                                                        Style="border:none;">
                                                        delete
                                                    </span>
                                                </button>
                                                <div class="modal fade" id="deleteModal<?= $produk['id_produk']; ?>"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Apakah Anda
                                                                    yakin ingin menghapusnya?</h5>
                                                                <button class="close" type="button" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Add any additional information or warning here -->
                                                                Konfirmasi Penghapusan data produk
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button"
                                                                    data-dismiss="modal">Cancel</button>
                                                                <span class="btn btn-primary"
                                                                    onclick="deletePesanan(<?= $produk['id_produk']; ?>)">Delete</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php include "templates/footer.php" ?>
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

<script>
    function deletePesanan(idProduk) {
        $.ajax({
            type: "POST",
            url: "App/hapus-produk.php",
            data: {
                idproduk: idProduk
            },
            dataType: "json",
            cache: false,
            success: function (data) {
                Swal.fire({
                    icon: "success",
                    title: "Produk Dihapus!!!",
                    text: "Produk berhasil dihapus",
                }).then((result) => {
                    location.reload();
                    location.reload();
                });
            }
        });
    }

</script>