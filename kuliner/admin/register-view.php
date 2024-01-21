<?php
include "templates/header-user-login.php";
require("App/function.php");

$query = query("SELECT * FROM users ORDER BY role ASC");

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
                    <h1 class="h3 mb-0 text-gray-800">List Users</h1>
                </div>
                <div class="row">
                    <div class="col d-flex justify-content-between">
                        <a href="tambah-admin.php" class="btn btn-primary shadow-sm">Tambah Co-Admin</a>
                        <?php
                        $sql = ("SELECT * FROM users");
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        ?>
                        <small>Total users :
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
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Password</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($query as $produk): ?>
                                        <tr>
                                            <td>
                                                <?= $produk['id_user']; ?>
                                            </td>
                                            <td>
                                                <?= $produk['username']; ?>
                                            </td>
                                            <td>
                                                <?= $produk['nama_lengkap']; ?>
                                            </td>
                                            <td>
                                                <?= $produk['password']; ?>
                                            </td>
                                            <td>
                                                <?= $produk['role']; ?>
                                            </td>
                                            <td>
                                                <?php if ($produk['role'] == "admin"): ?>
                                                    <h5>MOD</h5>
                                                <?php else: ?>
                                                    <!-- <a href="App/hapus-user.php?id_user=<?= $produk['id_user']; ?>">
                                                        <span class="material-symbols-outlined text-danger">
                                                            delete
                                                        </span>
                                                    </a> -->
                                                    <button type="button" Style="border:none; background:transparent"
                                                        data-toggle="modal"
                                                        data-target="#deleteModal<?= $produk['id_user']; ?>">
                                                        <span class="material-symbols-outlined text-danger"
                                                            Style="border:none;">
                                                            delete
                                                        </span>
                                                    </button>
                                                    <div class="modal fade" id="deleteModal<?= $produk['id_user']; ?>"
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
                                                                    Konfirmasi Penghapusan data user
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary" type="button"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <span class="btn btn-primary"
                                                                        onclick="deletePesanan(<?= $produk['id_user']; ?>)">Delete</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
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
            url: "App/hapus-user.php",
            data: {
                idproduk: idProduk
            },
            dataType: "json",
            cache: false,
            success: function (data) {
                Swal.fire({
                    icon: "success",
                    title: "User Dihapus!!!",
                    text: "User berhasil dihapus",
                }).then((result) => {
                    location.reload();
                    location.reload();
                });
            }
        });
    }
</script>